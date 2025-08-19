<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Configuration
$smtp_host = 'mail.enternine.com';
$smtp_port = 587;
$smtp_username = 'madhu@enternine.com';
$smtp_password = 'Madhu@8704';
$admin_email = 'madhu@enternine.com';
$turnstile_secret = '0x4AAAAAABbRHiTTZ6Ur9sTdlx8bwtgScn4';

// Logging helper
function logMessage($message) {
    error_log("[FORM] " . $message);
}

// ✅ Turnstile CAPTCHA verification using fsockopen (works without curl or allow_url_fopen)
function verifyTurnstileCaptcha($secret, $response, $remote_ip) {
    $host = "challenges.cloudflare.com";
    $path = "/turnstile/v0/siteverify";
    $post_data = http_build_query([
        'secret'   => $secret,
        'response' => $response,
        'remoteip' => $remote_ip
    ]);

    $request = "POST $path HTTP/1.1\r\n";
    $request .= "Host: $host\r\n";
    $request .= "Content-Type: application/x-www-form-urlencoded\r\n";
    $request .= "Content-Length: " . strlen($post_data) . "\r\n";
    $request .= "Connection: close\r\n\r\n";
    $request .= $post_data;

    $fp = fsockopen("ssl://$host", 443, $errno, $errstr, 10);
    if (!$fp) {
        logMessage("fsockopen error: $errstr ($errno)");
        return false;
    }

    fwrite($fp, $request);
    $response = '';
    while (!feof($fp)) {
        $response .= fgets($fp, 1024);
    }
    fclose($fp);

    $body = substr($response, strpos($response, "\r\n\r\n") + 4);
    $data = json_decode($body, true);

    return $data && isset($data['success']) && $data['success'] === true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $captcha_verified = false;

    if (isset($_POST['cf-turnstile-response'])) {
        $captcha_verified = verifyTurnstileCaptcha($turnstile_secret, $_POST['cf-turnstile-response'], $_SERVER['REMOTE_ADDR']);
        if ($captcha_verified) {
            logMessage("Turnstile CAPTCHA verified.");
        } else {
            logMessage("Turnstile CAPTCHA failed.");
        }
    } else {
        logMessage("Turnstile CAPTCHA response not set.");
    }

    if (!$captcha_verified) {
        header("Location: Admisions.php?error=captcha");
        exit();
    }

    // Sanitize inputs
    $name     = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mobile   = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $course   = filter_input(INPUT_POST, 'course', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address  = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $errors = [];
    if (!$name) $errors[] = "Name is required";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (!$phone) $errors[] = "Phone number is required";
    if (!$course) $errors[] = "Course selection is required";
    if (!$gender) $errors[] = "Gender is required";
    if (!$resume || $resume['error'] !== UPLOAD_ERR_OK) $errors[] = "Resume is required";

    // Check if the resume file is a valid type (e.g., PDF)
    $valid_resume_types = [
    'application/pdf',                                                      // PDF
    'application/msword',                                                   // DOC
    'application/vnd.openxmlformats-officedocument.wordprocessingml.document', // DOCX
    'text/plain',                                                           // TXT
    'image/png',                                                            // PNG
    'image/jpeg',                                                           // JPG/JPEG
    'image/webp',                                                           // WEBP
    'image/vnd.adobe.photoshop'                                             // PSD
];

if (!in_array($resume['type'], $valid_resume_types)) {
    $errors[] = "Invalid resume format. Only PDF, Word (DOC/DOCX), TXT, PNG, JPG, WEBP, and PSD files are allowed.";
}

    if ($errors) {
        header("Location: Admisions.php?error=" . urlencode(implode(", ", $errors)));
        exit();
    }

    // Process Resume Upload
    $resume_path = 'uploads/' . basename($resume['name']);
    if (!move_uploaded_file($resume['tmp_name'], $resume_path)) {
        $errors[] = "Error uploading resume.";
        header("Location: Admisions.php?error=" . urlencode(implode(", ", $errors)));
        exit();
    }

    // Email content
    $admin_message = "<html><body><h2>New Application Received</h2><table>
        <tr><th>Name:</th><td>{$name}</td></tr>
        <tr><th>Email:</th><td>{$email}</td></tr>
        <tr><th>Phone:</th><td>{$phone}</td></tr>
        <tr><th>Address:</th><td>{$address}</td></tr>
        <tr><th>Pincode:</th><td>{$pincode}</td></tr>
        <tr><th>State:</th><td>{$state}</td></tr>
        <tr><th>Course:</th><td>{$course}</td></tr>
        <tr><th>Gender:</th><td>{$gender}</td></tr>
        <tr><th>Resume:</th><td><a href='https://enternine.in/Beta/Vistara_pU/{$resume_path}' download>Download Resume</a></td></tr>
    </table></body></html>";

    $autoreply_message = "<html><body>
        <h2>Application Received</h2>
        <p>Dear {$name},<br>
        Thank you for applying to the <strong>{$course}</strong> program at Sri Raghavendra College. Our team will review your application and get in touch shortly.</p>
        <p>Regards,<br>Admissions Team</p>
        </body></html>";

    try {
        $mailSetup = function ($mail) use ($smtp_host, $smtp_port, $smtp_username, $smtp_password) {
            $mail->isSMTP();
            $mail->Host = $smtp_host;
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $smtp_port;
            $mail->CharSet = 'UTF-8';
        };

        // Send admin email
        $admin_mail = new PHPMailer(true);
        $mailSetup($admin_mail);
        $admin_mail->setFrom($smtp_username, 'New Application');
        $admin_mail->addAddress($admin_email);
        $admin_mail->addReplyTo($email, $name);
        $admin_mail->isHTML(true);
        $admin_mail->Subject = "New Application from {$name} for {$course}";
        $admin_mail->Body = $admin_message;
        $admin_mail->AltBody = strip_tags($admin_message);
        $admin_mail->send();

        // Send auto-reply to applicant
        $reply_mail = new PHPMailer(true);
        $mailSetup($reply_mail);
        $reply_mail->setFrom($smtp_username, 'Vistara Global PU College');
        $reply_mail->addAddress($email, $name);
        $reply_mail->isHTML(true);
        $reply_mail->Subject = "Your Application for {$course} has been received";
        $reply_mail->Body = $autoreply_message;
        $reply_mail->AltBody = strip_tags($autoreply_message);
        $reply_mail->send();

        echo <<<HTML
        <div id="successModal" class="modal-overlay">
          <div class="modal-content">
            <div class="checkmark-circle">
              <div class="checkmark"></div>
            </div>
            <h2>Thank you for Enquiry!</h2>
            <p>Your enquiry has been received. We will get back to you soon.</p>
            <a href="./" class="back-button">Back to Home</a>
          </div>
        </div>
        
        <style>
          .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            animation: fadeIn 0.4s ease;
          }
        
          .modal-content {
            background: white;
            border-radius: 16px;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: slideUp 0.4s ease;
            max-width: 400px;
            width: 90%;
          }
        
          .checkmark-circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: inline-block;
            border: 4px solid #4BB543;
            position: relative;
            margin-bottom: 20px;
            animation: popIn 0.5s ease-out forwards;
          }
        
          .checkmark {
            transform: rotate(45deg);
            height: 50px;
            width: 25px;
            border-bottom: 5px solid #4BB543;
            border-right: 5px solid #4BB543;
            position: absolute;
            top: 22px;
            left: 34px;
            animation: draw 0.6s ease-out 0.2s forwards;
            opacity: 0;
          }
        
          h2 {
            color: #333;
            margin: 0 0 10px;
          }
        
          p {
            color: #555;
            margin-bottom: 20px;
          }
        
          .back-button {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            background: #4BB543;
            color: white;
            border-radius: 8px;
            transition: background 0.3s;
          }
        
          .back-button:hover {
            background: #3da43c;
          }
        
          @keyframes popIn {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
          }
        
          @keyframes draw {
            to { opacity: 1; }
          }
        
          @keyframes slideUp {
            from { transform: translateY(40px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
          }
        
          @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
          }
        </style>
        HTML;
        exit();
    } catch (Exception $e) {
        logMessage("PHPMailer Error: " . $e->getMessage());
        header("Location: Admisions.php?error=" . urlencode("Mail error: " . $e->getMessage()));
        exit();
    }
}
?>
