<?php
include 'config.php';
$admin = new Admin();

$uid = $_SESSION['uid'];

$stmt4 = $admin->ret("SELECT * FROM `user` WHERE `user_id`='$uid'");
$row4 = $stmt4->fetch(PDO::FETCH_ASSOC);
$cat = $row4['category'];

$stmt5 = $admin->ret("SELECT * FROM `category` WHERE `cat_name`='$cat'");
$row5 = $stmt5->fetch(PDO::FETCH_ASSOC);
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


    <link rel="stylesheet" href="quiz.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
    <section class="breadcrumb-blog set-bg" data-setbg="img1/quebg2.avif">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-dark">Questionnaire</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <?php
    if (empty($row4['category'])) { ?>


        <!-- Blog Section Begin -->
        <section class="blog spad">
            <?php
            $stmt = $admin->ret("SELECT * FROM `question`");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $qid = $row['qa_id'];
            ?>
                <div class="container1 mt-sm-5 my-1 col-md-10" style="margin-left: 120px;">
                    <div class="question ml-sm-5 pl-sm-5 pt-2">
                        <div class="py-2 h5"><b>Q. <?php echo $row['question'] ?></b></div>
                        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">
                            <form action="controller/quiz.php" method="POST">
                                <?php
                                $stmt2 = $admin->ret("SELECT * FROM `answer` WHERE `q_id`='$qid'");
                                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                    $ans = $row2['ans_id'];
                                ?>
                                    <label class="options"><?php echo $row2['answer'] ?>
                                        <input type="radio" name="ans<?php echo $qid ?>" value="<?php echo $ans ?>" required/>
                                        <span class="checkmark"></span>
                                    </label>


                                <?php }
                                ?>

                        </div>
                    </div>
                </div>
            <?php }
            ?>
            <div style="padding: 50px;display:flex;justify-content:center">
                <button type="submit" name="send" class="btn btn-success" style="width:300px";>Submit</button>
            </div>
            </form>

        </section>

    <?php } else { ?>
        <section class="blog-hero spad">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-9 text-center">
                        <div class="blog__hero__text">
                            <h2>Your questionnaire is already completed-</h2>
                            <h3>Based on your answer your behaviour may fall in this category.</h3>
                            <h3>"<?php echo $row5['cat_behave'] ?>"</h3>
                            <h6><?php echo $row5['cat_dec'] ?></h6>

                            <div>
                                <a href="viewinfo.php" class="primary-btn">View Avtivity</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
    ?>
    <!-- Blog Section End -->

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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</body>

</html>