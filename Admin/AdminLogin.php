<!-- Back End Admin Login -->
<?php include "../Connection_DataBase.php";

session_start();

$error = null;
$check = true;

$Error_flag_ERROR = false;

$Error_array = array(
    // register errors
    'ERROR' >= ''
);

if (isset($_POST['Submit'])) {

    $AdminName = isset($_POST["AdminName"]) ? $_POST["AdminName"] : "";
    $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

    if (empty($AdminName) || empty($Password)) {
        $error = "Please Enter Email And Password";
        $check = false;
    } else {
        $query = " SELECT * FROM admin WHERE Name='$AdminName'";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {

            $db_password = $row['Password'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['ID'] = $row['ID'];

            if ($Password == $db_password) {
                header('Location: AdminProfile.php');
            } else {
                $Error_array['ERROR'] = "Incorrect Password";
                $Error_flag_ERROR = true;
            }
        } else {
            $Error_array['ERROR'] = "Please Ckeck Your Email And PassWord";
            $Error_flag_ERROR = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Login</title>
    <!-- CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet" />
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Main CSS File -->
    <link href="../assets/css/Admin.css" rel="stylesheet" />
</head>

<body>
    <!-- Header -->
 <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1 class="text-light"><a href="../index.php"><span>HEALTH TOOLS</span></a></h1>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="../index.php"><i class="fas fa-home"></i>&nbsp; Home</a></li>
                    <li><a href="../Contact.php"><i class="fas fa-address-card"></i>&nbsp; Contact</a></li>
                    <li class="active"><a href="./AdminLogin.php"><i class="fas fa-users-cog"></i>&nbsp; Admin Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
<!-- End Header -->

    <main id="main">
        <!-- Contact Us -->
        <section id="Admin" class="Admin">
            <div class="container">
                <div class="section-title">
                    <span>Hi Admin</span>
                    <h3 class="AdminWelcome mt-4">Hi Admin</h3>
                    <p class="AdminDesc">Login to get full control of your information and your site</p>
                </div>
                <center>
                    <form action="#" method="post" class="AdminLoginStyle mb-5">
                        <?php
                        if ($check == false) {
                            echo "<div class='ErrorMessage'><center>$error</center></div>";
                        } 
                        elseif ($Error_flag_ERROR == true) {
                            echo "<div class='ErrorMessage'><center>Try Again You Have A Problem</center></div>";
                        } 
                        elseif (isset($_POST["Submit"])) {
                            echo "<div class='SuccessMessage'><center>Your Message Sent Successfully<br>We will contact you very soon. Be ready</center></div>";
                        }
                        ?>
                        <div class="form-group text-left">
                            <label for="exampleInputEmail1">Admin Name</label>
                            <input type="text" name="AdminName" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="Password" class="form-control">
                        </div>
                        <div class="text-center mb-5"><button type="submit" name="Submit">Login</button></div>
                    </form>
                </center>
            </div>
        </section>
    </main>
    
    <!-- Start Footer -->
<footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="fas fa-home"></i><a href="../index.php">&nbsp; Home</a></li>
                            <li><i class="fas fa-address-card"></i> <a href="../Contact.php"> &nbsp; Contact</a></li>
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
                &copy; Copyright <strong><span>HEALTH TOOLS</span></strong>.All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    
    <!-- JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <!-- Main JS  Files-->
    <script src="../assets/js/main.js"></script>
</body>

</html>