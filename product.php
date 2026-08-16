<?php
include 'config.php';
$admin = new Admin();
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
                        <h4>Shop</h4>
                        <div class="breadcrumb__links">
                            <a href="index.php">Home</a>
                            <span>Products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">

                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="product.php" style="color:black">All 
                                                    <?php
                                                     
                                                        $stmt5 = $admin->ret("SELECT * FROM `pcategory`");
                                                        $num5=$stmt5->rowCount();
                                                        ?>
                                                    (<?php echo $num5 ?>)</a></li>
                                                    <?php
                                                    $stmt1 = $admin->ret("SELECT * FROM `pcategory`");
                                                    while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) { ?>
                                                        <li><a href="product.php?pid=<?php echo $row1['pcat_id'] ?>" style="color:black"><?php echo $row1['pcat_name'] ?> 
                                                        <?php
                                                        $pdid=$row1['pcat_id'];
                                                        $stmt4 = $admin->ret("SELECT * FROM `pcategory` WHERE `pcat_id`='$pdid'");
                                                        $num=$stmt4->rowCount();
                                                        ?>
                                                        
                                                        (<?php echo $num ?>)</a></li>
                                                    <?php  }
                                                    ?>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
                if (isset($_GET['pid'])) {
                    $pid = $_GET['pid'];

                ?>
                    <div class="col-lg-9">

                        <div class="row">
                            <?php
                            $stmt2 = $admin->ret("SELECT * FROM `product` WHERE `pcat_id`='$pid'");
                            while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="viewproduct.php?pid=<?php echo $row2['pd_id'] ?>"> 
                                    <div class="product__item">
                                      <div class="product__item__pic set-bg" data-setbg="admin/controller/<?php echo $row2['pd_img'] ?>">

                                        </div>
                                        <div class="product__item__text">
                                            <h5 style="margin-bottom: 6px;"><?php echo $row2['pd_name'] ?></h5>
                                            <form action="controller/addtocart.php" method="POST">
                                                <input type="hidden" name="pdid" value="<?php echo $row2['pd_id'] ?>">
                                                <input type="hidden" name="cqty" value="1">
                                            <input type="submit" name="addtocart" class="btn btn-dark " value="+ Add To Cart">
                                            </form>

                                            <h5 style="margin-top: 20px;">₹<?php echo $row2['pd_price'] ?></h5>

                                        </div>
                                    </div>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-lg-9">

                        <div class="row">
                            <?php
                            $stmt = $admin->ret("SELECT * FROM `product`");
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                                <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="viewproduct.php?pid=<?php echo $row['pd_id'] ?>"> 
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="admin/controller/<?php echo $row['pd_img'] ?>">

                                        </div>
                                        <div class="product__item__text">
                                        <h5 style="margin-bottom: 6px;"><?php echo $row['pd_name'] ?></h5>
                                            <form action="controller/addtocart.php" method="POST">
                                                <input type="hidden" name="pdid" value="<?php echo $row['pd_id'] ?>">
                                                <input type="hidden" name="cqty" value="1">
                                            <input type="submit" name="addtocart" class="btn btn-dark " value="+ Add To Cart">
                                            </form>

                                            <h5 style="margin-top: 20px;">₹<?php echo $row['pd_price'] ?></h5>

                                        </div>
                                    </div>
                                </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

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