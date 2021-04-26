<?php

include "Connection_DataBase.php";
session_start();

$query = "SELECT * FROM h_tools";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM h_tools";
$result2 = mysqli_query($conn, $query2);




if (isset($_POST['add_to_cart'])) {
    if (isset($_SESSION['cart'])&&isset($_SESSION['ItemsName'])) {

        $item_array_id = array_column($_SESSION['cart'], "Tool_ID");

        $item_array_name = array_column($_SESSION['ItemsName'], "Tool_Name");

        if (in_array($_POST['Tool_ID'], $item_array_id)) {
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        } 
        else {

            $count = count($_SESSION['cart']);
            $item_array = array(
                'Tool_ID' => $_POST['Tool_ID']
            );

            $_SESSION['cart'][$count] = $item_array;

            // *******************************************************************
            $count_items = count($_SESSION['ItemsName']);
            $item_name_array = array(
                'Tool_Name' => $_POST['Tool_Name']
            );
            $_SESSION['ItemsName'][$count_items] = $item_name_array;

        }
    } else {

        $item_array = array(
            'Tool_ID' => $_POST['Tool_ID']
        );
        $item_name_array = array(
            'Tool_Name' => $_POST['Tool_Name']
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;

        $_SESSION['ItemsName'][0] = $item_name_array;
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>HEALTH TOOLS</title>
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
    <link href="assets/css/style.css" rel="stylesheet" />
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
                    <li class="active"> <a href="index.php"><i class="fas fa-home"></i>&nbsp; Home</a></li>
                    <li><a href="#about"><i class="fas fa-info-circle"></i>&nbsp; About</a></li>
                    <li><a href="#Tools"><i class="fas fa-toolbox"></i>&nbsp; Tools</a></li>
                    <li><a href="Contact.php"><i class="fas fa-address-card"></i>&nbsp; Contact</a></li>
                </ul>
            </nav>
        </div>
        <a href="Shop_Cart.php"><i class="shopCart fas fa-shopping-cart"></i>
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<span class='cart-count'>" . $count . "</span>";
            } else {
                $count = 0;
                echo "<span class='cart-count'>" . $count . "</span>";
            }
            ?>
        </a>
    </header>
    <!-- End Header -->

    <main id="main">
        <section id="Header-Img">
            <div class="Header-Img-container" data-aos="fade-up">
                <h1>Your New Digital Health Tools</h1>
                <a href="#about" class="btn-get-started scrollto">Get Started</a>
            </div>
        </section>

        <!-- Start About -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div style="background-image: url(assets/img/about.jpg)" data-aos="fade-right" class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start">
                    </div>
                    <div class="col-xl-7 pt-4 pt-lg-0 d-flex align-items-stretch">
                        <div class="content d-flex flex-column justify-content-center" data-aos="fade-left">
                            <h3>ABOUT US</h3>
                            <p>
                                We’re a healthcare technology company that provides leading intelligence on the
                                healthcare provider market. Why do we do it? Because understanding provider landscapes,
                                identifying opportunities, and reaching the right points of contact can be difficult to
                                do in a constantly changing market. But it doesn’t have to be. We develop e-shopping concepts.
                            </p>
                            <div class="row">
                                <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <i class="far fa-hospital"></i>
                                    <h4>What We Do </h4>
                                    <p>We help our clients navigate the increasingly complex healthcare market by providing them with unparalleled market analytics and sales intelligence generated from
                                        Our vision.
                                    </p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="200">
                                    <i class="fas fa-procedures"></i>
                                    <h4>Who are we</h4>
                                    <p>Health Tools, an online store specialized in selling medical and general supplies and tools on the Internet.
                                    </p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="300">
                                    <i class="fas fa-stethoscope"></i>
                                    <h4>Health tools</h4>
                                    <p>online shopping for all your home medical needs in a simple way, as the purchasing process began to flourish.</p>
                                </div>
                                <div class="col-md-6 icon-box" data-aos="zoom-in" data-aos-delay="400">
                                    <i class="fas fa-clinic-medical"></i>
                                    <h4>Your new portal</h4>
                                    <p> as our customer will find in our store the diversity of products and ease in the chain, we have made every effort to make shopping fun and fast.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About  -->

        <!-- Start Tools -->
        <section id="Tools" class="Healith-Tools section-bg">
            <div class="container">
                <div class="section-title" data-aos="fade-down">
                    <span>Healith-Tools</span>
                    <h2>Healith-Tools</h2>
                    <p>Browse the sections and choose the product you want</p>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="Healith-Tools-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-chair">Chair</li>
                            <li data-filter=".filter-corona">Corona</li>
                            <li data-filter=".filter-oil">Oil</li>
                            <li data-filter=".filter-personal">Personal</li>
                            <li data-filter=".filter-crutches">Crutches</li>
                            <li data-filter=".filter-bed">Bed</li>
                            <li data-filter=".filter-corsets">Corsets</li>
                        </ul>
                    </div>
                </div>
                <div class="row Healith-Tools-container" data-aos="fade-up" data-aos-delay="300">
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                        <form action="#" method="post">
                            <div class="col-lg-4 col-md-6 Healith-Tools-item filter-' . $row['ItemType'] . '">
                            <div class="Healith-Tools-wrap">
                                  <img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" class="img-fluid" alt="">
                                  <div class="Healith-Tools-info">
                                    <h4>' . $row['ItemName'] . '</h4>
                                    <p class="mb-5">Price: ' . $row['Price'] . '</p>
                                  </div>
                                  <div class="Healith-Tools-links">
                                    <a data-toggle="modal" data-target="#' . $row['ModelNumber'] . '" title="View"><i class="far fa-eye"></i></a>
                                    <button type="submit" class="btn btn-success" name="add_to_cart"><i class="fas fa-cart-plus"></i></button>
                                    <input  type="hidden" name="Tool_ID"  value="' . $row['ID'] . '">
                                    <input  type="hidden" name="Tool_Name"  value="' . $row['ItemName'] . '">
                                  </div>
                             </div>
                             </div>
                             </form>
                        ';
                    }
                    ?>
                </div>
            </div>
        </section>
        <!-- End Tools  -->
    </main>
    <!-- End main -->

    <!-- Start Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="fas fa-home"></i><a href="index.php">&nbsp; Home</a></li>
                            <li><i class="fas fa-info-circle"></i> <a href="#about">&nbsp; About</a></li>
                            <li><i class="fas fa-toolbox"></i> <a href="#Tools">&nbsp; Tools</a></li>
                            <li><i class="fas fa-address-card"></i> <a href="Contact.php"> &nbsp; Contact</a></li>
                            <li><i class="fas fa-users-cog"></i> <a href="./Admin/AdminLogin.php"> &nbsp;  Admin Login</a></li>
                            <li><i class="fas fa-users-cog"></i> <a href="./Admin/Main_AdminLogin.php"> &nbsp;Main  Admin Login</a></li>                        </ul>
                        </ul>
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


    <!-- Models For Health Tools Sections -->
    <?php
    while ($row = mysqli_fetch_array($result2)) {
        echo '
                <!-- Model View Product -->
                    <div class="modal fade" id="' . $row['ModelNumber'] . '" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">' . $row['ItemName'] . '</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                             </button>
                            </div>
                             <div class="modal-body">
                                 <center><img src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '" class="img-fluid" alt=""></center> <br>
                                 Product explanation:
                                  ' . $row['ItemDescriptio'] . '
                            </div>
                             <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                         </div>
                        </div>
                 </div>
            ';
    }
    ?>
    <!-- End Model View Product-->

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