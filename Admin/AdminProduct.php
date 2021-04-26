<?php include "../Connection_DataBase.php";

session_start();

$error = null;
$check = true;

if (isset($_POST['Submit'])) {
    $ItemName = isset($_POST["ItemName"]) ? $_POST["ItemName"] : "";
    $ItemDescription = isset($_POST["ItemDescription"]) ? $_POST["ItemDescription"] : "";
    $Price = isset($_POST["Price"]) ? $_POST["Price"] : "";
    $ItemType = isset($_POST["ItemType"]) ? $_POST["ItemType"] : "";
    $ItemImage = addslashes(file_get_contents($_FILES["ItemImage"]["tmp_name"]));
    $Model= 'Model'.rand();

    if (empty($ItemName) || empty($ItemDescription) || empty($Price) || empty($ItemType)) {
        $error = "Please Enter All Information About Your Product";
        $check = false;
    } elseif ($check) {
        $query = "INSERT INTO h_tools (Image,ItemName,ItemDescriptio,ItemType,Price,ModelNumber) VALUE ('$ItemImage','$ItemName','$ItemDescription','$ItemType','$Price', '$Model')";
        $result = mysqli_query($conn, $query);
    }
}


$Tools = "SELECT * FROM h_tools";

$AllTools = mysqli_query($conn, $Tools);


if(isset($_GET["ID"]) && isset($_GET["control"])){
    $ID = $_GET["ID"];
        if($_GET["control"]=="remove"){
            $DQuery="DELETE FROM h_tools WHERE ID='{$ID}'";
            $D=mysqli_query($conn,$DQuery);
            
            echo "<script>alert('Product has been Removed...!')</script>";
            echo "<script>window.location = 'AdminProduct.php'</script>";
        }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Add Product</title>
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
    <main id="main">
        <section id="Admin" class="Admin">
            <div class="container">
                <div class="section-title">
                    <span>Add a Product</span>
                    <h3 class="AdminWelcome mt-4">Add a Tools</h3>
                    <p class="AdminDesc">Fill in the details of the product you want to add</p>
                </div>
                <center>
                <?php
                if ($check == false) {
                    echo "<div class='ErrorMessage mb-4'><center>$error</center></div>";
                } elseif (isset($_POST["Submit"])) {
                    echo "<div class='SuccessMessage mb-4' style='font-size: 30px'><center>Your New Product has been Added Successfully</center></div>";
                }
                ?>
                    <form action="#" class="AdminLoginStyle mb-5" method="post" enctype="multipart/form-data">
                        <div class="form-group text-left">
                            <label>Item Name: </label>
                            <input type="text" name="ItemName" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label>Item Description: </label>
                            <input type="text" name="ItemDescription" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label>Price: </label>
                            <input type="number" name="Price" class="form-control">
                        </div>
                        <div class="form-group text-left">
                            <label>Item Type: </label>
                            <select class="form-control" id="exampleFormControlSelect1" name="ItemType">
                                <option value="corona">Corona</option>
                                <option value="oil">Oil</option>
                                <option value="chair">Chair</option>
                                <option value="personal">Personal</option>
                                <option value="corsets">Corsets</option>
                                <option value="crutches">Crutches</option>
                                <option value="bed">Bed</option>
                            </select>
                        </div>
                        <div class="form-group text-left">
                            <label>Item Image: </label>
                            <input type="file" name="ItemImage" >
                        </div>
                        <div class="text-center mb-5"><button type="submit" name="Submit">Add</button></div>
                    </form>



                    <div class="table mt-5">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Item Type</th>
                                <th scope="col">Item Image</th>
                                <th scope="col">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($AllTools) {
                                while ($row = mysqli_fetch_assoc($AllTools)) {
                                    echo "<tr><td>" . $row['ID'] . "</td><td>" . $row['ItemName'] . "</td><td>" . $row['Price'] . "</td><td style='text-transform: capitalize'>" . $row['ItemType'] . "</td><td>" .'<img src="data:image/jpeg;base64,'.base64_encode( $row['Image'] ).'" height="60" width="60" class="img-thumnail"/>'."</td><td style='text-align: center;'>" ."<a href='AdminProduct.php?ID={$row['ID']}&control=remove' class='btn btn-success'>Remove</a>" . "</td></tr>";
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
                            <li><a href="AdminProfile.php"><i class="fas fa-home"></i>&nbsp; Dashboard</a></li>
                            <li><a href="AddAdmin.php"><i class="fas fa-plus"></i>&nbsp; Add Admin</a></li>
                            <li><a href="Orders.php"><i class="fas fa-box"></i>&nbsp; Orders</a></li>
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