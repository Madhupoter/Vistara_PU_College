<!-- nav-top-section -->
<div class="nav-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="./" class="logo">
                    <img src="assets/images/Logo.webp" alt="">
                </a>
            </div>

            <div class="col-lg-8 d-flex align-items-end justify-content-end">
                <div>
                    <!-- Social Icons Row -->
                    <div class="contact-wrapper">
                        <!-- Contact Info -->
                        <div class="contact-info">
                            <!-- <div class="contact-item">
                                <i class="fa-solid fa-envelope contact-icon"></i>
                                <div class="contact-text">
                                    <div class="contact-title"></div>
                                    <div class="contact-subtitle"><b>vistataglobal@email.com</b></div>
                                </div>
                            </div> -->


                            <div class="contact-item" style="display: flex; flex-direction: column;">
                                <div class="d-flex  gap-2 mb-2 social-icons">
                                    <a href="https://www.instagram.com" target="_blank"><i
                                            class="fab fa-instagram"></i></a>
                                    <a href="https://www.facebook.com" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a>
                                </div>
                                <div class="contact-text">
                                    <div class="contact-subtitle">
                                        <h5 class="mb-0">Helpdesk : +91 96639 66355</h5>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="contact-button">
                            <div>
                                <a href="assets/images/pdf/VistaraBrochure.pdf" class="btn-download-brochure"
                                    target="_blank">Download Brochure <i class="fa-solid fa-download"></i></a>
                            </div>
                            <a href="#" class="btn-primary-custom text-center" data-bs-toggle="modal"
                                data-bs-target="#admissionModal">Admission Open 2025-26 <br><span
                                    class="apply-now-btn">APPLY Now</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- nav-top-section-end -->

<div class="header" id="header">

    <nav class="navbar navbar-expand-md bsb-navbar bsb-navbar-hover bsb-navbar-caret">
        <div class="container p-0">
             <a class="navbar-brand logo" href="./" > <img src="assets/images/Logo.webp" alt=""> </a>
            <a class="navbar-brand navbarLogo2" href="./" id="navbarLogo"> <img src="assets/images/Icon.webp" alt=""> </a>
           
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                        <img src="#" alt="" class="img-fluid w-50 ">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>


                <div class="offcanvas-body" id="menuWrapper">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link  " href="./">Home</a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <?php if($page=='whoWeAre'){echo 'active';}?> " href="#!"
                                id="accountDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">About
                                Us</a>
                            <ul class="dropdown-menu border-0 shadow  bsb-zoomIn  twist "
                                aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="About_Vistara_PU_College">Introduction</a></li>
                                <li><a class="dropdown-item" href="About_Vistara_PU_College#vision-mission">Vision &
                                        Mission</a></li>
                                <li><a class="dropdown-item" href="About_Vistara_PU_College#group-management">Group &
                                        Management</a></li>
                                <li><a class="dropdown-item"
                                        href="About_Vistara_PU_College#principal-message">Principal’s Message</a></li>
                                <li><a class="dropdown-item" href="About_Vistara_PU_College#Anti-ragging">Anti-Ragging
                                        Policy</a></li>
                                <li><a class="dropdown-item" href="#">Affiliations</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <?php if($page=='Academics'){echo 'active';}?> "
                                href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Academics</a>
                            <ul class="dropdown-menu border-0 shadow  bsb-zoomIn  twist "
                                aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="PCMB_Of_Vistara_PU_College">PCMB</a></li>
                                <li><a class="dropdown-item" href="PCMC_Of_Vistara_PU_College">PCMC</a></li>
                                <li><a class="dropdown-item" href="CEBA_Of_Vistara_PU_College">CEBA</a></li>
                                <li><a class="dropdown-item" href="NEET_JEE_KCET_Of_Vistara_PU_College">NEET / JEE &
                                        KCET</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <?php if($page=='Facilities'){echo 'active';}?> "
                                href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Facilities</a>
                            <ul class="dropdown-menu border-0 shadow  bsb-zoomIn  twist "
                                aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item"
                                        href="Facilities_at_Vistara_PU_College#college_campus">Campus</a></li>
                                <li><a class="dropdown-item" href="Facilities_at_Vistara_PU_College#AV_Room">AV Room</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="Facilities_at_Vistara_PU_College#college_labs">Labs</a></li>
                                <li><a class="dropdown-item"
                                        href="Facilities_at_Vistara_PU_College#college_library">Library</a></li>
                                <li><a class="dropdown-item"
                                        href="Facilities_at_Vistara_PU_College#college_transport">Transport</a></li>
                                <li><a class="dropdown-item" href="Facilities_at_Vistara_PU_College#hostel">Hostel</a>
                                </li>
                                <li><a class="dropdown-item" href="Facilities_at_Vistara_PU_College#sports">Sports</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <?php if($page=='Admissions'){echo 'active';}?> "
                                href="#!" id="accountDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">Admissions</a>
                            <ul class="dropdown-menu border-0 shadow  bsb-zoomIn  twist "
                                aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="Admissions_at_Vistara_PU_College">Admission
                                        2025–2026</a></li>
                                <li><a class="dropdown-item"
                                        href="Admissions_at_Vistara_PU_College#admission-procedure">Admission
                                        Process</a></li>
                                <li><a class="dropdown-item"
                                        href="Admissions_at_Vistara_PU_College#download-form">Download Application</a>
                                </li>
                            </ul>
                        </li>

                        <!-- <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle <?php if($page=='whoWeAre'){echo 'active';}?> " href="#!"
                                id="accountDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">College
                                Life
                            </a>
                            <ul class="dropdown-menu border-0 shadow  bsb-zoomIn  twist "
                                aria-labelledby="accountDropdown">
                                <li><a class="dropdown-item" href="Co-Curricular_Activities_at_Vistara_PU_College">Co-Curricular Activities</a></li>
                                <li><a class="dropdown-item" href="Extra-Curricular_Activities_at_Vistara_PU_College">Extra-Curricular Activities</a>
                                </li>

                            </ul>
                        </li> -->


                        <li class="nav-item ">
                            <a class="nav-link <?php if($page=='Careers'){echo 'active';}?>"
                                href="Careers_at_Vistara_PU_College">Careers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pe-3 <?php if($page=='Contact'){echo 'active';}?>"
                                href="Contact_of_Vistara_PU_College">Contact Us</a>
                        </li>
                        <li class="Admission-btn text-center">
                            <a href="#" class="" data-bs-toggle="modal" data-bs-target="#admissionModal">Admission Open
                                2025-26 <br><span
                                    style="  text-underline-offset: 4px; text-decoration: underline;">APPLY
                                    NOW</span></a>
                        </li>

                    </ul>
                    <div class=" mobile-only mt-4">
                    <!-- Buttons -->
                    <div class="mobile-buttons d-flex flex-column">
                        <a href="your-brochure-link.pdf" class="btn btn-outline-primary w-100">
                            <i class="fas fa-download"></i> Download Brochure
                        </a>
                        <a href="your-application-link" class="btn btn-success w-100">
                            <i class="fas fa-pen"></i> APPLY Now
                        </a>
                    </div>

                    <!-- Icon Row -->
                    <div class="icon-row">
                        <a href="https://wa.me/9663966355" target="_blank" aria-label="WhatsApp"
                            class="icon-box whatsapp">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                        <a href="tel:9663966355" aria-label="Phone" class="icon-box phone">
                            <i class="fa-solid fa-headset"></i>
                        </a>
                        <a href="mailto:contact@vistaraglobalpucollege.com" aria-label="Email" class="icon-box email">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="Facebook"
                            class="icon-box facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                        <a href="#" target="_blank" aria-label="Instagram"
                            class="icon-box instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </nav>

</div>

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<!-- Modal -->
<div class="modal fade" id="admissionModal" tabindex="-1" aria-labelledby="admissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="admissionModalLabel">Admission Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <!-- <div class="form-title text-center mb-3">Admission Enquiry Form</div> -->

                <!-- Bootstrap 5.3.3 CSS CDN -->


                <form action="Admisions.php" method="POST" enctype="multipart/form-data"
                    class="p-4 bg-light rounded shadow-sm">


                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="tel" name="mobile" class="form-control" id="mobile" pattern="[0-9]{10}"
                            placeholder="10-digit mobile number" required>
                    </div>

                    <div class="mb-3">
                        <label for="course" class="form-label">Select Course</label>
                        <select class="form-select" name="course" id="course" required>
                            <option value="" selected disabled>Choose a course</option>
                            <option value="PCMB">PCMB</option>
                            <option value="PCMC">PCMC</option>
                            <option value="CEBA">CEBA</option>
                            <option value="NEET / JEE">NEET / JEE</option>
                            <option value="KCET">KCET</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" rows="3" required></textarea>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="terms" required>
                        <label class="form-check-label" for="terms">
                            By submitting this form, I confirm that the information provided is accurate</a>.
                        </label>
                    </div>


                    <!-- Cloudflare Turnstile -->
                    <div class="mb-3">
                        <div class="cf-turnstile" data-sitekey="AddYourkey"></div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary w-100 ">Submit Application</button>
                    </div>
                </form>



            </div>
        </div>
    </div>

</div>
