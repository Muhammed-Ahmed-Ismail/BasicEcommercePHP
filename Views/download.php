<?php

$loginNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/login'>Login</a>
                </li>";
$logoutNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/logout'>Logout</a>
                </li>";
$emailNavItem = "<li class='nav-item'>
                      <strong class='nav-link'>Email: <span>" . $_SESSION['user_name'] . "</span></strong>
                </li>";

$profileNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/profile'>Profile</a>
                </li>";

$downloadNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/downloadarea'>Donwload</a>
                </li>";

$settingNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/editprofile'>Setting</a>
                </li>";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $productService = new ProductServices();
    $orderService = new OrderServices();
    $orderId = $_SESSION["order_id"];
    $downloadsCountobj = $orderService->getDownloadTimes($orderId);
    $downloadsCount = $downloadsCountobj->downloads_count;
    $products = $productService->listingUploadedFiles();

} else {
    header("Location:/login");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>spicy</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Static/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../Static/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="../Static/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="../Static/images/fevicon.png" type="image/gif"/>
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../Static/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
          media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="../Static/images/loading.gif" alt="#"/></div>
</div>
<!-- end loader -->
<!-- header -->
<header>
    <!-- header inner -->
    <nav id="CustomNav" class="navbar navbar-expand-lg navbar-light bg-light" style="background: #eae9e4 !important;">
        <a class="navbar-brand" href="#">Spicy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="color: #eda911!important;">
            <ul class="navbar-nav">

                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                <?php
                if (isset($_SESSION["loggedin"])) {
                    echo $downloadNavItem;
                    echo $profileNavItem;
                    echo $settingNavItem;
                }
                ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION["loggedin"])) {
                    echo $emailNavItem;
                    echo $logoutNavItem;
                } else
                    echo $loginNavItem;
                ?>
            </ul>
        </div>
    </nav>
</header>
<!-- end header inner -->
<!-- end header -->
<!-- food -->
<div class="food">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><strong class="yellow">Download </strong>Product</h2>
                    <span>You can download our product using
                        <strong>AWS S3 BUCKET</strong> OR
                        <strong>Our Server</strong>
                    </span>
                </div>
            </div>
        </div>
        <div class="row" style="justify-content: center">
            <div class="col-md-4">
                <div class="food_box" style="border-radius: 30px" >
                    <i><img src="../Static/images/softwarelogo.png" alt="product" style="margin-top: -145px"/></i>
                    <h4>Native PHP product</h4>
                    <hr style="background: black"/>

                    <p>
                        Our project is developed using
                    </p>
                    <ul class="list">
                        <li class="list-group-item">Native php</li>
                        <li class="list-group-item">Elequent</li>
                        <li class="list-group-item">Composer</li>
                        <li class="list-group-item">AWS S3 BUCKET</li>
                    </ul>
                    <hr style="background: black"/>
                    <section>
                        <h2 style="color: #FFF">Downloads number</h2>
                        <strong style="color: #FFF; font-size: large"><?= $downloadsCount ?></strong>
                    </section>
                    <hr style="background: black"/>
                    <section class="download-links">
                        <h2 style="color: white">Download Links</h2>
                        <a href="/download?local=1" style="width:120px; height:40px; color:#FFF;"
                           class="btn btn-primary btn-download">
                            Our Server
                        </a>
                        <a style="width:120px; height:40px; color:#FFF;" class="btn btn-primary btn-download"
                           target="_blank"
                           href="/download?s3=1"
                        >S3</a>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- end food -->
<!--  footer -->
<footer>
    <div class="footer" style="padding-top:10px;">
        <div class="copyright" style="background:#eae9e4!important">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: rgba(0,0,0,.5) !important;">Copyright 2022 All Right Reserved By Awesome Software</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->


<!-- Javascript files-->
<script src="../Static/js/jquery.min.js"></script>
<script src="../Static/js/popper.min.js"></script>
<script src="../Static/js/bootstrap.bundle.min.js"></script>
<script src="../Static/js/jquery-3.0.0.min.js"></script>
<!-- sidebar -->
<script src="../Static/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../Static/js/custom.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
<script src="../Static/js/navbar.js"></script>

</html>
