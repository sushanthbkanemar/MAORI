<?php
include 'config.php';
$admin = new Admin();

$uid = $_SESSION['uid'];

$actid = $_GET['actid'];

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
                        <h2>Track your activities for 21 days.</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class=" d-flex justify-content-center">
            <div class="col-md-10 d-flex justify-content-center" style="background: black;padding:50px;border-radius:10px">
                <form action="controller/track.php" method="POST">
                    <div class="form-group ">
                        <input type="hidden" name="infoid" value="<?php echo $actid ?>">
                        <h5 class="text-success"><b> Select Date</b></h5><br>
                        <?php
$stmt7=$admin->ret("SELECT * FROM `user_activity` WHERE `user_id`='$uid' AND `info_id`='$actid'");
$row7=$stmt7->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <input type="date" name="date" class="form-control col-md-12 bg-muted" min="<?php echo $row7['started_date'] ?>" max="<?php echo $row7['end_date'] ?>" required><br><br>
                    </div>
                    <div class="form-check form-check-inline">

                        <input class="form-check-input" type="radio" name="practice" id="inlineRadio1" value="practiced" style="width:20px;height:20px;" required> 
                        <h5 class="form-check-label text-success" for="inlineRadio1"> <b>Practiced</b></h5>
                    </div><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="practice" id="inlineRadio2" value="not practiced" style="width:20px;height:20px" required>
                        <h5 class="form-check-label text-success" for="inlineRadio2"><b>Not Practiced</b></h5>
                    </div><br><br>
                    <div class="form-group ">
                        <h5 class="text-success"><b> Describe your activity</b></h5>
                        <textarea name="activity" id="" cols="30" rows="4" placeholder="Write down...." class="form-control bg-muted" style="width:500px" required></textarea>
                    </div>
                    <div class="form-group">
                        <button name="send" type="submit" class="btn btn-success btn-block">Submit</button>
                    </div>

                </form>
            </div>
        </div>


        <?php
        $stmt4 = $admin->ret("SELECT * FROM `user_activity` WHERE `user_id`='$uid' AND `info_id`='$actid'");
        while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
            $infoid = $row4['info_id'];
            $end_date = $row4['end_date'];
        ?>
            <div class=" d-flex justify-content-center">
                <div class="col-md-10" style="margin-top: 30px;background:black;padding:50px;border-radius:10px">
                    <div>
                        <h4 class="text-light"><b>Your daily track.</b></h4>
                    </div>
                    <div>
                        <table class="table">
                            <thead class="text-success">
                                <tr>
                                    <th>
                                        slno
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Practiced
                                    </th>
                                   
                                    <th>
                                        Activity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-light">
                                <?php
                                $count = 1;
                                $stmt2 = $admin->ret("SELECT * FROM `activity_status` WHERE `user_id`='$uid' AND `info_id`='$infoid' ORDER BY `as_id` DESC");
                                while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                                    $status = $row2 ? $row2['as_status'] : '';
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $count++ ?>
                                        </td>
                                        <td>
                                            <?php echo $row2['as_date'] ?>
                                        </td>
                                        <td>
                                            <?php if ($status == "practiced") : ?>
                                                <i class="fa fa-check text-success" style="font-size: 22px;margin-left:20px"></i>
                                            <?php else : ?>
                                                <i class="fa fa-times text-danger" style="font-size: 22px;margin-left:25px"></i>
                                            <?php endif; ?>
                                        </td>
                                       
                                        <td>
                                            <textarea name="" id="" cols="30" rows="" class="form-control" readonly><?php echo $row2['remark'] ?></textarea>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <?php
                        $curdate = date('Y-m-d');
                        $stmt5 = $admin->ret("SELECT * FROM `activity_status` WHERE `as_status`='practiced'");
                        $stmt6 = $admin->ret("SELECT * FROM `activity_status` WHERE `as_status`='not practiced'");

                        $yescount = $stmt5->rowCount();
                        $nocount = $stmt6->rowCount();
                        // $nocount = 8-$yescount;

                        if ($end_date <= $curdate) {
                            if ($yescount <= 21) { ?>

                                <div class="bg-secondary" style="padding: 40px;border-radius:10px">
                                    <h5 class="text-light"> Your 21 days from the starting date till now has completed.According to your tracking list you did not practice activity for 2<?php echo $nocount ?></h5>
                                    <p class="text-dark">You can continue practicing 2<?php echo $nocount ?> more days.</p>
                                </div>

                        <?php }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>




    </section>






    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->







    <!-- Blog Details Section End -->

    <!-- Footer Section Begin -->
    <?php
    include 'footer.php';
    ?>
    <!-- Footer Section End -->


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