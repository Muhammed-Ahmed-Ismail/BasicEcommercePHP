<?php
$FormValidator = new FormValidator();
$loginNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/login'>Login</a>
                </li>";
$logoutNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/logout'>Logout</a>
                </li>";
if (isset($_SESSION["user_name"])) {
    $emailNavItem = "<li class='nav-item'>
                      <strong class='nav-link'>Email: <span>" . $_SESSION['user_name'] . "</span></strong>
                </li>";
}

$profileNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/profile'>Profile</a>
                </li>";

$downloadNavItem = " <li class='nav-item'>
                    <a class='nav-link' href='/downloadarea'>Donwload</a>
                </li>";

$settingNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/editprofile'>Setting</a>
                </li>";
?>


<!doctype html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Login Page</title>
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
<body class="main-layout">
<header>
    <!-- header inner -->
    <nav id="CustomNav" class="navbar navbar-expand-lg navbar-light bg-light"
         style="background: #eae9e4 !important;">
        <a class="navbar-brand" href="#">Spicy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown" style="color: #eda911!important;">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/about">About</a>
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
                } else {
                    echo $loginNavItem;

                }
                ?>
            </ul>
        </div>
    </nav>
</header>
<!-- end header inner -->
<!-- Start of body -->
<section style="height: 585px">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-6">
                <br><br>
                <div class="text-bg">
                    <h1>Awesome Software</h1>
                    <p>A start up of bunche of brilliant developers </p>
                    <ul>
                        <li>Abullah Hegab</li>
                        <li>Abulrahman Saleh</li>
                        <li>Muhammad Eldefrawy</li>
                        <li>Muhammed Emad</li>
                        <li>Muhammad Ismail</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <img src="Static/images/awesom.jpg" alt="image">
            </div>
        </div>
    </div>

</section>
<!-- end of body -->
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