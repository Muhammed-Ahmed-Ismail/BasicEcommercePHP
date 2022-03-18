<?php
//$EmailValidateResult;
//$passwordValidateResult;
//$creditCardValidateResult;
//$CvvValidateResult;
$FormValidator = new FormValidator();
if (isset($_POST["submit"])) {
    $EmailValidateResult = $FormValidator->validate_email("email");
    $passwordValidateResult = $FormValidator->validate_Password("password");
    $creditCardValidateResult = $FormValidator->validate_credit("credit_card");
    $CvvValidateResult = $FormValidator->validate_cvv("cvv");

    /**
     * inserting new user into database
     * if success redirect to login page
     */
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $insertNewUser = new UserService();
        $userID = $insertNewUser->insertUser($_POST["email"], $_POST["password"]);
        if ($userID>0) {
            $newOrder = new OrderServices();
            $newOrder->addOrder($userID);
            header("Location:/login");
        } else {
            header("Location:/");
        }
    }



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
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="#"><img src="../Static/images/logo.png" alt="#"/></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Screenshort</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                            <div class="Call"><a href="#"> <span class="yellow">Call Us : </span>12345677890</a></div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header inner -->
<!-- end header -->
<!-- banner -->
<section class="banner_main">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-6">
                <div class="text-bg">
                    <h1>Healthy Food Recipes</h1>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majorityomised words
                        which don't look even slightly believable</p>

                </div>
            </div>
            <div class="col-md-6">
                <form id="request" class="main_form" method="POST">
                    <div class="row">
                        <div class="col-md-12 ">
                            <input class="contactus" placeholder="email" type="text" name="email">
                            <?php
                            if (isset($EmailValidateResult["isValid"])) {
                                if ($EmailValidateResult["isValid"] == false) {
                                    echo "<span style ='color:red;'>" . $EmailValidateResult["message"] . "</span>";

                                }
                            }
                            ?>

                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="Password" type="password" name="password">
                            <?php
                            if (isset($passwordValidateResult["isValid"])) {
                                if ($passwordValidateResult["isValid"] == false) {
                                    echo "<span style ='color:red;'>" . $passwordValidateResult["message"] . "</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="confirm password" type="password"
                                   name="confirm password">

                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="credit card" type="password" name="credit card">
                            <?php
                            if (isset($creditCardValidateResult["isValid"])) {
                                if ($creditCardValidateResult["isValid"] = false) {
                                    echo "<span style ='color:red;'>" . $creditCardValidateResult["message"] . "</span>";
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-12">
                            <input class="contactus" placeholder="cvv" type="number" name="cvv">
                            <?php
                            if (isset($CvvValidateResult["isValid"])) {
                                if ($CvvValidateResult["isValid"] = false) {
                                    echo "<span style ='color:red;'>" . $CvvValidateResult["message"] . "</span>";
                                }
                            }
                            ?>
                        </div>

                        <div class="col-sm-12">
                            <!-- <input class="send_btn" value="submit" type="submit" name="submit"> -->

                        </div>
                        <input class="send_btn" value="submit" type="submit" name="submit">
                </form>
            </div>
        </div>
</section>

<!-- end clients -->
<!--  footer -->
<footer>
    <div class="footer" style="padding-top:19px;">
        <div class="copyright" style="background:#eae9e4!important">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: rgba(0,0,0,.5) !important;">Copyright 2019 All Right Reserved By <a
                                    style="color: rgba(0,0,0,.5) !important;" href="https://html.design/"> Free Html
                                Templates</a>
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