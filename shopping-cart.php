<?php
include 'config.php';
$admin = new Admin();

$uid = $_SESSION['uid'];

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
    include 'header.php'
    ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <?php
$stmt3=$admin->ret("SELECT * FROM `cart` WHERE `user_id`='$uid'");
$num=$stmt3->rowCount();
if($num>0){
        ?>
        <div class="container" id="tablecart">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                     $grandtotal=0;
                                     $total=0;
                                $stmt = $admin->ret("SELECT * FROM `cart` INNER JOIN `product` ON product.pd_id=cart.pd_id WHERE `user_id`='$uid'");
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                                    $qty = $row['cart_qty'];
                                $price = $row['pd_price'];

                                $total = $qty * $price;
                                $grandtotal = $grandtotal + $total;
                                    ?>
                                    <tr>
                                        <td class="product__cart__item">
                                            <div class="product__cart__item__pic">
                                                <img src="admin/controller/<?php echo $row['pd_img'] ?>" alt="" style="width:150px;height:100px;object-fit:cover">
                                            </div>
                                            <div class="product__cart__item__text">
                                                <h6><?php echo $row['pd_name'] ?></h6>
                                                <h5>₹<?php echo $row['pd_price'] ?></h5>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="product_count" style="display: flex;">
                                                <button onclick="decrement(<?php echo $row['cart_id'] ?>)"><i class="fa fa-angle-down"></i> </button>
                                                <input class="input-number" id="<?php echo $row['cart_id'] ?>" value="<?php echo $row['cart_qty'] ?>" type="text" style="width:50px">
                                                <button onclick="increment(<?php echo $row['pd_qty'] ?>,<?php echo $row['cart_id'] ?>)"> <i class="fa fa-angle-up"></i></button>
                                            </div>
                                        </td>
                                        <td class="cart__price">₹<?php echo $total ?></td>
                                        <td class="cart__close">
                                            <a href="controller/removecart.php?cartid=<?php echo $row['cart_id'] ?>"><i class="fa fa-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }
                                ?>



                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="product.php">Continue Shopping</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                          
                            <li>Total <span>₹<?php  echo $grandtotal ?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <h4 style="color:red;text-align:center">Your cart is empty</h4>
       <?php } ?>
    </section>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php
    include 'footer.php'
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
        function increment(stock, cartid) {
            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) + 1;

            if (qty > stock) {

                alert('out of stock');
            } else {
                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

            }

        }

        function decrement(cartid) {
            var qty = document.getElementById(cartid).value;
            qty = parseInt(qty) - 1;
            if (qty > 0) {

                document.getElementById(cartid).value = qty;
                var xmlhttp = new XMLHttpRequest();

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        document.getElementById("tablecart").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "controller/updatecart.php?cartid=" + cartid + '&qty=' + qty, true);
                xmlhttp.send();

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