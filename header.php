<?php
$admin=new Admin();
?>

<header class="header">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="index.php">
                        <h2 style="margin-left: -50px;"><b>MĀORI</b><span style="font-size: 50px;color:red">.</span></h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="product.php">Products</a></li>
                        <?php

                        if (!isset($_SESSION['uid'])) { ?>

                            <li><a href="login.php">Quiz</a></li>
                            <li><a href="login.php">Activity</a></li>
                            <li><a href="login.php">Cart</a></li>
                            <li><a href="login.php">Login</a></li>
                        <?php } else { ?>
                            <li><a href="quiz.php">Quiz</a></li>
                            <li><a href="viewinfo.php">Activity</a></li>
                            <li><a href="shopping-cart.php">Cart</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php   }
                        ?>

                    </ul>
                </nav>
            </div>

        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>