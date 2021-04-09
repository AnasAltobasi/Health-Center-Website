<?php include "../Connection_DataBase.php";

session_start();

$query = "SELECT * FROM orders";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Admin Orders</title>
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
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <div class="logo mr-auto">
                <h1 class="text-light"><span><?php echo "Welcome " . $_SESSION['Name'] ?></span></h1>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="AdminProfile.php"><i class="fas fa-home"></i>&nbsp; Dashboard</a></li>
                    <li class="active"><a href="AdminProduct.php"><i class="fas fa-toolbox"></i>&nbsp; Add a Tools</a></li>
                    <li><a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main>
        <section class="dashboard ">
            <div class="container">
                <div class="section-title text-center mt-0">
                    <h2 class="mb-5">Orders</h2>
                </div>
                <div class="table mb-5">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number Phone</th>
                                <th scope="col">Products Selected</th>
                                <th scope="col">Price</th>
                                <th scope="col">Call Him</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Username'] . "</td><td>" . $row['Email'] . "</td><td>" . $row['NumberPhone'] . "</td><td>" . $row['ProductsNames'] . "</td><td>" . $row['TotalPrice'] . "</td><td>" . "<a href=mailto:{$row["Email"]}><button type='button' class='btn btn-info' >Send Email</button></a>" . "</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
                            <li><a href="AdminProfile.php"><i class="fas fa-home"></i>&nbsp; Dashboard</a></li>
                            <li><a href="AdminProduct.php"><i class="fas fa-toolbox"></i>&nbsp; Add a Product</a></li>
                            <li><a href="AddAdmin.php"><i class="fas fa-plus"></i>&nbsp; Add Admin</a></li>
                            <li><a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 footer-links">
                        <h4>How can you benefit?</h4>
                        <p>Through the exhibition there are many medical devices, tools and supplies, with a detailed
                            explanation and price, where you can shop and book directly and smoothly.</p>
                        <div class="social-links mt-4">
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