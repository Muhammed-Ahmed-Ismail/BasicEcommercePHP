<?php
$EmailValidateResult;
$passwordValidateResult;
$creditCardValidateResult;
$CvvValidateResult;
$FormValidator = new FormValidator();
if (isset($_POST["submit"])) {
    $EmailValidateResult = $FormValidator->validate_email("email");
    $passwordValidateResult = $FormValidator->validate_Password("password");
    $creditCardValidateResult = $FormValidator->validate_credit("credit_card");
    $CvvValidateResult = $FormValidator->validate_cvv("cvv");
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
    <link rel="icon" href="../Static/images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="../Static/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="../Static/images/loading.gif" alt="#" /></div>
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
                                    <a href="#"><img src="../Static/images/logo.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="read_more" href="#">Read More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <form id="request" class="main_form" method="POST" >
                        <div class="row">
                            <div class="col-md-12 ">
                                <input class="contactus" placeholder="email" type="text" name="email">
                                <?php
                               
                                if ($EmailValidateResult["isValid"] == false) {
                                    echo $EmailValidateResult["message"];
                                } 
                                ?>

                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="Password" type="password" name="password">
                                <?php
                                if ($passwordValidateResult["isValid"] == false) {
                                    echo $passwordValidateResult["message"];
                                } 
                                ?>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="confirm password" type="password" name="confirm password">

                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="credit card" type="password" name="credit card">
                                <?php
                                if ($valid_credit["isValid"] = false) {
                                    echo $valid_credit["message"];
                                } 
                                ?>
                            </div>
                            <div class="col-md-12">
                                <input class="contactus" placeholder="cvv" type="number" name="cvv">
                                <?php
                                if ($CvvValidateResult["isValid"] = false) {
                                    echo $CvvValidateResult["message"];
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
    <!-- end banner -->
    <!-- food -->
    <div class="food">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2><strong class="yellow">Food </strong>Packages</h2>
                        <span>There are many variations of passages of Lorem Ipsum available, but the majorityomised words which don't look
                            even slightly believable</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="food_box">
                        <i><img src="../Static/images/food1.png" alt="#" /></i>
                        <h4>Homemade</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food_box ">
                        <i><img src="../Static/images/food2.png" alt="#" /></i>
                        <h4>Noodles</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="food_box">
                        <i><img src="../Static/images/food3.png" alt="#" /></i>
                        <h4>Egg</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end food -->
    <!-- works -->
    <div class="works">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <span>How it works</span>
                        <h2><strong class="yellow">3 Step For </strong>Healthy Eating</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div id="white_bg" class="works_box">
                        <h4>01</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="white_bg" class="works_box ">
                        <h4>02</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="white_bg" class="works_box">
                        <h4>03</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                            alteration in some form, by injected humour, or randomised words which don't look even slightly
                            believable</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end works -->
    <!-- clients -->
    <div class="clients">
        <div class="container-fluid">
            <div class="row d_flex">
                <div class="col-md-7">
                    <div class="padding_lert">
                        <div class="titlepage">
                            <h2><strong class="yellow">Clients </strong>says</h2>
                        </div>
                        <div id="myCarousel" class="carousel slide clients_Carousel " data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="carousel-caption ">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="imga">
                                                        <figure><img src="../Static/images/client.png" alt="#" /></figure>
                                                    </div>
                                                    <div class="test_box">
                                                        <h4>mark du</h4>
                                                        <p>It is a long established fact that a reader will be distracted by
                                                            the readable content of a page when looking at its layout. The
                                                            point of using Lorem Ipsum is that it has a more-or-less normal
                                                            distribution of letters,</p>
                                                        <i><img src="../Static/images/toy_img.png" alt="#" /></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="imga">
                                                        <figure><img src="../Static/images/client.png" alt="#" /></figure>
                                                    </div>
                                                    <div class="test_box">
                                                        <h4>mark du</h4>
                                                        <p>It is a long established fact that a reader will be distracted by
                                                            the readable content of a page when looking at its layout. The
                                                            point of using Lorem Ipsum is that it has a more-or-less normal
                                                            distribution of letters,</p>
                                                        <i><img src="../Static/images/toy_img.png" alt="#" /></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="container">
                                        <div class="carousel-caption">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="imga">
                                                        <figure><img src="../Static/images/client.png" alt="#" /></figure>
                                                    </div>
                                                    <div class="test_box">
                                                        <h4>mark du</h4>
                                                        <p>It is a long established fact that a reader will be distracted by
                                                            the readable content of a page when looking at its layout. The
                                                            point of using Lorem Ipsum is that it has a more-or-less normal
                                                            distribution of letters,</p>
                                                        <i><img src="../Static/images/toy_img.png" alt="#" /></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="clients_imgfood">
                        <figure><img src="../Static/images/food4.png" alt="#" /></figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end clients -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="cont">
                            <h3> Free Multipurpose <br> Responsive Landing Page 2019</h3>
                            <p>Modern lighting fast & easily Customizable</p>
                        </div>
                        <button class="sub_btn" href="#">Get A Quote</button>
                    </div>
                </div>
            </div>
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

</html>