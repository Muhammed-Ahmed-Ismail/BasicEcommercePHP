<?php

$logoutNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/logout'>Logout</a>
                </li>";

$profileNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/profile'>Profile</a>
                </li>";

$downloadNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/download'>Donwload</a>
                </li>";

$settingNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/editprofile'>Setting</a>
                </li>";
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {

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
<body>
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
                if (isset($_SESSION["email"])) {
                    echo $downloadNavItem;
                    echo $profileNavItem;
                    echo $settingNavItem;
                }
                ?>

            </ul>
            <ul class="navbar-nav ml-auto">
                <?php
                if (isset($_SESSION["email"])) {
                    echo $logoutNavItem;
                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<!-- end header inner -->
<div class="food">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2><strong class="yellow">Download </strong>Here</h2>
                    <span>There are many variations of passages of Lorem Ipsum available, but the majorityomised words which don't look
                     even slightly believable</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="food_box">
                    <i><img src="../Static/images/softwarelogo.png" alt="#"/></i>
                    <h4>Awesome Software</h4>
                    <ul class="list-group-item border-primary">
                        <li></li>
                        <li><a href="/download"> Download page</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright 2019 All Right Reserved By <a href="https://html.design/"> Free Html Templates</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
</footer>

</body>
</html>
