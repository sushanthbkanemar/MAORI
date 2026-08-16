<?php
include 'config.php';
$admin=new Admin();
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div>
            <div >
                <div class="container">
                    <div class="row">
                        <div>
                        <h1 style="margin-top: 200px;"><b>MĀORI<span style="color:red">.</span></b></h1>
                        <h4> <span style="color:blue">Your inner battle,Our support</span></h4>
                        </div>
                        <div>
                            <img src="img1/crystals/hm.png" alt="" style="height:600px; margin-top:-50px; margin-left:150px;">
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Instagram Section Begin -->
    <section class="instagram spad" style="background: #001C30; padding-bottom: 60px;">
        <div class="container">
            <div class="row">
                <div >
                    <div style="display: flex;gap:300px">
                    <div>
                    <img src="img1/crystals/bbl.png" alt="" style="height:350px">
                   </div>
                   <div style="width:500px;margin-top:50px">
                    <h4 class="text-light"><br><br><b>"Seeking a remedy for an unsettled mind and a lack of focus? Explore our resources at MĀORI and embark on a journey towards mental clarity and emotional stability."</b></h4>
                   </div>
                   
                   </div>
                </div>
                <div >
                    <div style="display: flex;gap:300px;flex-direction:row-reverse">
                    <div>
                    <img src="img1/crystals/key.png" alt="" style="height:350px">
                   </div>
                   <div style="width:500px;margin-top:50px">
                    <h4 class="text-light"><br><br><b>"Discover the key to a grounded and focused mind. Explore the resources available at MĀORI and learn practices that promote clarity and stability."</b></h4>
                   </div>
                   
                   </div>
                </div>
                <div >
                    <div style="display: flex;gap:300px"> 
                    <div>
                    <img src="img1/crystals/ar.png" alt="" style="width:350px; margin-top: -50px;">
                   </div>
                   <div style="width:500px;margin-top:50px;">
                    <h4 class="text-light"><b>At MĀORI, we believe in the transformative power of self-care and mindful living. Discover our carefully curated range of wellness products, designed to nourish your body, mind, and soul. From crystals and supplements  to meditation tools and sacred rituals, we offer everything you need to create a sanctuary of well-being</b></h4>
                   </div>
                   
                   </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->
<div style="padding: 50px;">
    <div>
        <h2>Write down your feedback.</h2>
        <form action="controller/feedback.php" method="POST">
        <div class="form-group">
            <textarea name="feed" id="" cols="" rows="" class="form-control" placeholder="write...." style="width:600px;" required/></textarea>
        </div>
        <button type="submit" name="send" class="btn" style="background: #64CCC5; color: #fff">Submit</button>
        </form>
    </div>
</div>

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