<?php
include 'config.php';
$admin = new Admin();

$uid = $_SESSION['uid'];

$stmt = $admin->ret("SELECT * FROM `user` WHERE `user_id`='$uid'");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$cat = $row['category'];
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
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->

    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <?php
    include 'header.php';
    ?>
    <!-- Header Section End -->

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                    <?php
                        if($cat=="")
                        {
                            echo '<h2>Please Attend quiz to know your activities.</h2>';
                            echo '<a href="quiz.php" class="btn btn-info">Click Here To Attend</a>';
                        }
                        else{
                            echo '<h2>These are the activities which you can try to improve your self.</h2>';
                        }
                       
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>






        <!-- Blog Details Hero End -->

        <!-- Blog Details Section Begin -->
        <?php
$stmt2 = $admin->ret("SELECT * FROM `information` WHERE `cat_name`='$cat'");
while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $infoid = $row2['info_id'];
    
    // Check if the info_id exists in user_activity table for the given user_id
    $stmt3 = $admin->ret("SELECT * FROM `user_activity` WHERE `user_id`='$uid' AND `info_id`='$infoid'");
    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
    $status = $row3 ? $row3['status'] : ''; // Get the status if the record exists
    
?>
    <section class="blog-hero spad" style="margin-top:-100px">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2><?php echo $row2['info_title'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div style="margin-left:180px;margin-top:-50px">
                        <?php
                        $file_extension = pathinfo($row2['info_img'], PATHINFO_EXTENSION); // get the file extension

                        if (in_array($file_extension, array('jpg', 'jpeg', 'png', 'gif'))) { ?>
                            <img src="admin/controller/<?php echo $row2['info_img'] ?>" alt="" style="width:800px !important;height:500px !important">
                        <?php } elseif (in_array($file_extension, array('mp4', 'avi', 'mov', 'wmv', 'mkv'))) { ?>
                            <video width="800" height="500" controls autoplay muted>
                                <source src="admin/controller/<?php echo $row2['info_img'] ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content" style="margin-top:30px">
                        <div class="blog__details__quote">
                            <i class="fa fa-quote-left"></i>
                            <p><?php echo $row2['info_about'] ?></p>
                            <a href="<?php echo $row2['link'] ?>" class="btn btn-info mb-4" target="_blank">Link</a>
                            <div>
                                <?php
                                if ($status == 'practicing') {
                                    echo '<a href="" class="btn btn-success">Practicing</a>
                                    <a href="trackactivity.php?actid='.$row2['info_id'].'" class="btn btn-warning">Update Status</a>
                                    ';
                                } else {
                                    echo '<a href="controller/practice.php?infoid=' . $row2['info_id'] . '" class="btn btn-success">Practice Activity</a>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>






    <!-- Blog Details Section End -->

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