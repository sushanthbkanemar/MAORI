
<?php
include 'config.php';
$admin=new Admin();

$uid=$_SESSION['uid'];

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MĀORI</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php
    include 'header.php';
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <a>Cart</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="controller/checkout.php" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">

                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" style="color: blue;" name="fname" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" style="color: blue;" name="lname" placeholder="" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" style="color: blue;" name="country" required/>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text"  style="color: blue;" name="address" placeholder="Street Address" class="checkout__input__add" required/>

                            </div>

                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input type="text" style="color: blue;" name="state"required/>
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="number" style="color: blue;" name="zip" placeholder="" maxlength="6" required/>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="tel" style="color: blue;" name="phone" placeholder="" pattern="[0-9]{10}" title="Please Enter Valid Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" style="color: blue;" name="email" placeholder="" required/>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="order__title">Your order</h4>
                                <div class="checkout__order__products">Product <span>Total</span></div>
                                <ul class="checkout__total__products">
                                    <?php
                                    $grandtotal = 0;
                                    $total = 0;
                                    $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `user_id`='$uid'");
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $qty = $row['cart_qty'];
                                        $price = $row['pd_price'];

                                        $total = $qty * $price;
                                        $grandtotal = $grandtotal + $total;
                                    ?>
                                        <li><?php echo $row['pd_name'] ?>&nbsp;&nbsp;&nbsp;x<?php echo $qty ?><span>₹<?php echo $total ?></span></li>
                                    <?php } ?>
                                </ul>
                                <ul class="checkout__total__all">

                                    <li>Total <span>₹<?php echo $grandtotal ?></span></li>
                                </ul>


                            </div>



                            <div class="payment-check">
                                <div class="card-info  ">

                                    <div>
                                        <input type="radio" name="payment_method" value="cash" id="cash" onclick="cardform(this.value)" style="width: 14px;" required>&nbsp;
                                        <label style="font-family: 'Open Sans', sans-serif;">Cash On Delivery</label>


                                        <div style="display:none;" id="cash_div">
                                            <div class="row">

                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <input type="radio" name="payment_method" value="upi" id="upi" onclick="cardform(this.value)" style="width: 14px;" required>&nbsp;
                                    <label style="font-family: 'Open Sans', sans-serif;">UPI / Netbanking</label>
                                    <div style="display:none;" id="upi_div">

                                        <div class="Pement">
                                            <div class="form-box" style="display: flex;flex-direction:column">
                                                <label><b> Scan and Pay</b></label>
                                                <img src="img1/qrcode.jpg" height="180px" width="180px">

                                            </div>
                                            <br>
                                            <div class="form-box" style="display: flex;flex-direction:column">
                                                <form action="controller/checkout.php" method="post">
                                                    <label>Transaction Id</label>
                                                    <input type="text" name="transaction" id="trid" class="form-control" placeholder="0000 0000 0000 0000 " style="width: 200px;" minlength="16" maxlength="16" required>
                                            </div>
                                        </div>


                                    </div><br>
                                    <button type="submit" name="checkout" class="site-btn">PLACE ORDER</button>
                                    <a href="or.php"></a>
                                    

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->


    <script>
        function cardform(myvalue) {

            if (myvalue == 'cash') { //radio button id
                document.getElementById('cash_div').style.display = 'block'; //div id
                document.getElementById('upi_div').style.display = 'none';
                document.getElementById('trid').removeAttribute('required');


            } else if (myvalue == 'upi') {

                document.getElementById('upi_div').style.display = 'block';
                document.getElementById('cash_div').style.display = 'none';
                document.getElementById('trid').setAttribute('required', '');
            }
        }
    </script>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>