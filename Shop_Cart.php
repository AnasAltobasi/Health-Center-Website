<?php

include 'Connection_DataBase.php';

$query = 'SELECT * FROM h_tools';
$result = mysqli_query($conn, $query);

session_start();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['Tool_ID'] == $_GET['id']) {
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'Shop_Cart.php'</script>";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <meta content='width=device-width, initial-scale=1.0' name='viewport' />
    <title>Shopping Cart</title>
    <!-- CSS Files -->
    <link href='assets/vendor/bootstrap/css/bootstrap.min.css' rel='stylesheet' />
    <link href='assets/vendor/icofont/icofont.min.css' rel='stylesheet' />
    <link href='assets/vendor/boxicons/css/boxicons.min.css' rel='stylesheet' />
    <link href='assets/vendor/venobox/venobox.css' rel='stylesheet' />
    <link href='assets/vendor/owl.carousel/assets/owl.carousel.min.css' rel='stylesheet'>
    <link href='assets/vendor/aos/aos.css' rel='stylesheet' />
    <!-- FontAwesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' integrity='sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==' crossorigin='anonymous' />
    <!-- Main CSS File -->
    <link href='assets/css/style.css' rel='stylesheet' />
</head>


<body>
    <!--  Header -->
    <header id='header' class='d-flex align-items-center'>
        <div class='container d-flex align-items-center'>
            <div class='logo mr-auto'>
                <h1 class='text-light'><a href='index.php'><span>HEALTH TOOLS</span></a></h1>
            </div>
            <nav class='nav-menu d-none d-lg-block'>
                <ul>
                    <li> <a href='index.php'><i class='fas fa-home'></i>&nbsp; Home</a></li>
                    <li><a href='Contact.php'><i class='fas fa-address-card'></i>&nbsp; Contact</a></li>
                </ul>
            </nav>
        </div>
        <a href='Shop_Cart.php'><i class='shopCart fas fa-shopping-cart'></i>
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo '<span class="cart-count">' . $count . '</span>';
            } else {
                $count = 0;
                echo '<span class="cart-count">' . $count . '</span>';
            }
            ?>
        </a>
    </header>
    <!-- End Header -->

    <div class='container-fluid'>
        <div class='row px-5'>
            <div class='col-md-7'>
                <div class='shopping-cart mt-5 mb-5'>
                    <h6 class="text-success">My Cart</h6>
                    <hr>
                    <?php

                    $total = 0;
                    $error = null;
                    $check = true;

                    if (isset($_SESSION['cart'])) {
                        $Tool_ID = array_column($_SESSION['cart'], 'Tool_ID');
                        $ItemsName = array_column($_SESSION['ItemsName'], 'Tool_Name');
                        while ($row = mysqli_fetch_assoc($result)) {
                            foreach ($Tool_ID as $id) {
                                if ($row['ID'] == $id) {
                                    cartElement($row['Image'], $row['ItemName'], $row['Price'],  $id);
                                    $total = $total + (int)$row['Price'];

                                    $ItemSelected = $_SESSION['ItemsName'];
                                }
                            }
                        }
                        $All_Item = implode(" . ,<br> ", $ItemsName);
                    } else {
                        echo '<h5 class="pt-2 text-success text-center" style="font-size: 30px">Cart is Empty</h5>';
                    }

                    if (isset($_POST["CheckOut"])) {
                        $Name = isset($_POST["Name"]) ? $_POST["Name"] : "";
                        $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
                        $Phone = isset($_POST["NumberPhone"]) ? $_POST["NumberPhone"] : "";

                        if (empty($Name) || empty($Email) || empty($Phone)) {

                            $error = "Please Fill All Requires (Your Name or Email or Number Phone Is Empty)";
                            $check = false;
                        }

                        if ($total == 0) {
                            $error = "Your Cart Is Empty";
                            $check = false;
                        } elseif ($check) {

                            $query2 = "INSERT INTO orders (Username,Email,NumberPhone,ProductsNames,TotalPrice) VALUES ('$Name','$Email','$Phone','$All_Item','$total')";
                            $result2 = mysqli_query($conn, $query2);

                            session_unset();
                            session_destroy();
                            mysqli_close($conn);
                        }
                    }
                    function cartElement($Image, $ItemName, $Price, $id)
                    {
                        $element = '
                        <form action="Shop_Cart.php?action=remove&id=' . $id . '" method="post" class="cart-items mb-3">
                                        <div class="border rounded">
                                            <div class="row bg-white">
                                                <div class="col-md-3 pl-0">
                                                <img src="data:image/jpeg;base64,' . base64_encode($Image) . '" class="img-fluid" >
                                                </div>
                                                <div class="col-md-6">
                                                    <h5 class="pt-2">' . $ItemName . '</h5>
                                                    <h5 class="pt-2">' . $Price . '</h5>
                                                    <h5 class="pt-2 text-success" style="font-size:15px">HEALTH TOOLS</h5>
                                                </div>
                                                <div class="col-md-3 py-5">
                                                        <div>
                                                             <input type="text" id="quantity" class="form-control w-25 d-inline text-center" value="1" ><br>
                                                             <button type="submit" class="btn btn-danger mb-3 mt-3 text-center" name="remove">Remove</button>
                                                        </div>
                                       </div>
                                            </div>
                                        </div>
                                    </form>
                        ';
                        echo  $element;
                    }
                    ?>
                </div>
            </div>
            <div class='col-md-4 offset-md-1 border rounded mt-5 mb-5 bg-white h-25'>

                <div class='pt-4 mb-4'>
                    <h6>PRICE DETAILS</h6>
                    <hr>
                    <div class='row price-details mb-3'>
                        <div class='col-md-6'>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6> Price ($count) Tools</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>

                        <div class='col-md-6'>
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class='text-success'>FREE</h6>
                            <hr>
                            <h6>$<?php echo $total; ?></h6>
                        </div>
                    </div>
                </div>
                <?php
                if ($check == false) {
                    echo "<div class='ErrorMessage'><center>$error</center></div>";
                } elseif (isset($_POST["CheckOut"])) {
                    echo "<div class='SuccessMessage'><center>Your request has been successfully sent. <br>We will contact you shortly</center></div>";
                }

                if ($total > 0) {
                    echo '
                            <form action="Shop_Cart.php" method="post">
                            <div class="form-group col-md-8">
                                <label class="text-success">Your Name:</label>
                                <input type="text" name="Name" class="form-control">
                            </div>
                            <div class="form-group col-md-8">
                                <label class="text-success">Your Number Phone:</label>
                                <input type="text" name="NumberPhone" class="form-control">
                            </div>
                            <div class="form-group col-md-8">
                                <label class="text-success">Your Email:</label>
                                <input type="email" name="Email" class="form-control">
                            </div>
                            <div class="Check_out mb-3">
                                <button type="submit" class="btn btn-success2 mt-0 mr-3" name="CheckOut">Check Out</button>
                                <a class="btn btn-warning" href="index.php#Tools" role="button">Continue shopping</a>
                            </div>
                        </form>
                    ';
                };
                ?>

            </div>
        </div>
    </div>
    <!-- Start Footer -->
    <footer id='footer'>
        <div class='footer-top'>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-6 col-md-6 footer-links'>
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class='fas fa-home'></i><a href='index.php'>&nbsp; Home</a></li>
                            <li><i class='fas fa-info-circle'></i> <a href='#about'>&nbsp; About</a></li>
                            <li><i class='fas fa-toolbox'></i> <a href='#Tools'>&nbsp; Tools</a></li>
                            <li><i class='fas fa-address-card'></i> <a href='Contact.php'> &nbsp; Contact</a></li>
                            <li><i class='fas fa-users-cog'></i> <a href='./Admin/AdminLogin.php'> &nbsp; Admin Login</a></li>
                        </ul>
                    </div>
                    <div class='col-lg-6 col-md-6 footer-links'>
                        <h4>How can you benefit?</h4>
                        <p>Through the exhibition there are many medical devices, tools and supplies, with a detailed
                            explanation and price, where you can shop and book directly and smoothly.</p>
                        <div class='social-links mt-3'>
                            <a href='#' class='twitter'><i class='bx bxl-twitter'></i></a>
                            <a href='#' class='facebook'><i class='bx bxl-facebook'></i></a>
                            <a href='#' class='linkedin'><i class='bx bxl-linkedin'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class='container py-4'>
            <div class='copyright '>
                &copy; Copyright <strong><span>HEALTH TOOLS</span></strong>. All Rights Reserved
            </div>
        </div>
    </footer>
    <!-- End Footer -->



    <!-- JS Files -->
    <script src='assets/vendor/jquery/jquery.min.js'></script>
    <script src='assets/vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
    <script src='assets/vendor/jquery.easing/jquery.easing.min.js'></script>
    <script src='assets/vendor/jquery-sticky/jquery.sticky.js'></script>
    <script src='assets/vendor/isotope-layout/isotope.pkgd.min.js'></script>
    <script src='assets/vendor/venobox/venobox.min.js'></script>
    <script src='assets/vendor/aos/aos.js'></script>
    <script src='assets/vendor/owl.carousel/owl.carousel.min.js'></script>
    <!-- Main JS  Files-->
    <script src='assets/js/main.js'></script>

</body>

</html>