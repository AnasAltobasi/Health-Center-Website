<?php include "../Connection_DataBase.php";

session_start();


$query = "SELECT * FROM admin";
$result = mysqli_query($conn, $query);


$error = null;
$check = true;

if (isset($_POST['Submit'])) {

    $Username = isset($_POST["Username"]) ? $_POST["Username"] : "";
    $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

    if (empty($Username) || empty($Password)) {
        $error = "Please Enter Username And Password";
        $check = false;
    } elseif ($check) {

        $InQuery = "INSERT INTO admin (Name,Password) VALUE ('$Username','$Password')";
        $InResult = mysqli_query($conn, $InQuery);
    }
}

if(isset($_GET["ID"]) && isset($_GET["control"])){
    $ID = $_GET["ID"];
        if($_GET["control"]=="remove"){
            $DQuery="DELETE FROM admin WHERE ID='{$ID}'";
            $DResult=mysqli_query($conn,$DQuery);
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <!-- <meta http-equiv="refresh" content="10;url=AddAdmin.php" /> -->

    <title>Add Admin</title>
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
                    <li><a href="AdminProduct.php"><i class="fas fa-toolbox"></i>&nbsp; Add a Tools</a></li>
                    <li><a href="AdminLogout.php"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <section id="Admin" class="Admin">
            <div class="container">
            
                <div class="section-title">
                    <span>Add New Admin</span>
                    <h3 class="AdminWelcome mt-4">Add New Admin</h3>
                </div>

                <center>
                    <?php
                    if ($check == false) {
                        echo "<div class='ErrorMessage mb-4'><center>$error</center></div>";
                    } elseif (isset($_POST["Submit"])) {
                        echo "<div class='SuccessMessage mb-4' style='font-size: 30px'><center>New Admin has beed Added Successfully</center></div>";
                    }
                    ?>
                    <form action="#" class="AdminLoginStyle mb-5" method="post">
                        <div class="form-group text-left">
                            <label>New Admin Username: </label>
                            <input type="text" name="Username" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label>New Admin Password </label>
                            <input type="password" name="Password" class="form-control">
                        </div>
                        <div class="text-center mb-5"><button type="submit" name="Submit">Add</button></div>
                    </form>


                    <div class="table mt-5">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Admin Name</th>
                                <th scope="col">Password</th>
                                <th scope="col">Controls</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['Name'] . "</td><td>" . $row['Password'] . "</td><td style='text-align: center;'>" . "<a href='AddAdmin.php?ID={$row['ID']}&control=remove' class='btn btn-success'>Remove</a>" . "</td></tr>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
                            <li class="active"><a href="AdminProfile.php"><i class="fas fa-home"></i>&nbsp; Dashboard</a></li>
                            <li><a href="AdminProduct.php"><i class="fas fa-toolbox"></i>&nbsp; Add a Product</a></li>
                            <li><a href="Orders.php"><i class="fas fa-box"></i>&nbsp; Orders</a></li>
                            <li><a href="AdminFeed.php"><i class="bx bx-phone-call"></i>&nbsp; Feed Back</a></li>
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