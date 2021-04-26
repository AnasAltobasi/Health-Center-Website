<?php include "Contact-Back.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Contact Us</title>
    <!-- CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Main CSS File -->
    <link href="assets/css/Contact.css" rel="stylesheet" />
</head>

<body>
     <!--  Header -->
     <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.php"><span>HEALTH TOOLS</span></a></h1>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="index.php"><i class="fas fa-home"></i>&nbsp; Home</a></li>
                    <li class="active"><a href="Contact.php"><i class="fas fa-address-card"></i>&nbsp; Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- Contact Us -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Contact Us</h2>
                </div>

                <div class="row justify-content-center mb-5">
                    <div class="col-lg-4 col-md-12">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>Amman Street 1235, Amman-Jordan,123456</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="info-box">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@example.com<br>healith_tools@example.com</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="info-box">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+962789324569<br>+962796320158</p>
                        </div>
                    </div>
                </div>
                <?php
                if ($check == false) {
                    echo "<div class='ErrorMessage'><center>$error</center></div>";
                } elseif ($Error_flag_name == true || $Error_flag_email == true || $Error_flag_message == true || $Error_flag_subject == true) {
                    echo "<div class='ErrorMessage'><center>Try Again You Have A Problem</center></div>";
                } elseif (isset($_POST["Submit"])) {
                    echo "<div class='SuccessMessage'><center>Your Message Sent Successfully<br>We will contact you very soon. Be ready</center></div>";
                }
                ?>
                <form action="#" method="post" class="php-email-form mt-5 ">
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="Name" class="form-control" id="name" placeholder="Your Name" />
                            <?php if ($Error_flag_name == true) {
                                if ($Error_array['Name'] !== null) echo "<div class='ErrorMessage'>" . $Error_array['Name'] . "</div>";
                            } ?>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="email" class="form-control" name="Email" id="email" placeholder="Your Email" />
                            <?php if ($Error_flag_email == true) {
                                if ($Error_array['Email'] !== null) echo "<div class='ErrorMessage'>" . $Error_array['Email'] . "</div>";
                            } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Subject" id="subject" placeholder="Subject" />
                        <?php if ($Error_flag_subject == true) {
                            if ($Error_array['Subject'] !== null) echo "<div class='ErrorMessage'>" . $Error_array['Subject'] . "</div>";
                        } ?>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="Message" rows="5" data-rule="required" placeholder="Message"></textarea>
                        <?php if ($Error_flag_message == true) {
                            if ($Error_array['Message'] !== null) echo "<div class='ErrorMessage'>" . $Error_array['Message'] . "</div>";
                        } ?>
                    </div>
                    <div class="text-center"><button type="submit" name="Submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- End Contact Us  -->
    </main>
    
    <!-- Start Footer -->
<footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="fas fa-home"></i><a href="index.php">&nbsp; Home</a></li>
                            <li><i class="fas fa-address-card"></i> <a href="Contact.php"> &nbsp; Contact</a></li>
                            <li><i class="fas fa-users-cog"></i> <a href="./Admin/AdminLogin.php"> &nbsp; Admin Login</a></li>
                            <li><i class="fas fa-users-cog"></i> <a href="./Admin/Main_AdminLogin.php"> &nbsp;Main  Admin Login</a></li>                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>How can you benefit?</h4>
                        <p>Through the exhibition there are many medical devices, tools and supplies, with a detailed
                            explanation and price, where you can shop and book directly and smoothly.</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="container py-4">
            <div class="copyright ">
                &copy; Copyright <strong><span>HEALTH TOOLS</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <!-- Main JS  Files-->
    <script src="assets/js/main.js"></script>
</body>
</html>