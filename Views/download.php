<?php
if(isset($_SESSION["loggedin"] )&& $_SESSION["loggedin"]==true) {
    $productService = new ProductServices();
    $orderService= new OrderServices();
    $orderId=$_SESSION["order_id"];
    $downloadsCountobj=$orderService->getDownloadTimes($orderId);
   $downloadsCount=$downloadsCountobj->downloads_count;
    $products = $productService->listingUploadedFiles();

}else{
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
                <div class="food_box">
                    <i><img src="../Static/images/food3.png" alt="product"/></i>
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
                        <strong style="color: #FFF; font-size: large"><?= $downloadsCount?></strong>
                    </section>
                    <hr style="background: black"/>
                    <section class="download-links">
                        <h2 style="color: white">Download Links</h2>
                        <a href="/download?local=1" style="width:120px; height:40px; color:#FFF;" class="btn btn-primary btn-download">
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
    <div class="footer">
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
