<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $downloadLink = "/download";
    $orderService = new OrderServices();
    $orderInfo = $orderService->getOrderByUserId($_SESSION["user_id"]);
    $downloadCount = $orderInfo->downloads_count;
    $orderId = $orderInfo->order_id;
    $orderUserId = $orderInfo->ID;
    //  $orderLink=$orderInfo->custom_sl;
    $_SESSION["order_id"] = $orderId;
    $_SESSION["download_count"] = $downloadCount;
    /* echo "downloads count for this order:$count";
     echo "<h1>Hello from profile page</h1> <a href='$downloadLink'>link to download </a>";*/
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
                                    data-target="#navbarsExample04" aria-controls="navbarsExample04"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= "/logout" ?>">Log Out</a>
                                    </li>
                                </ul>
                                <div class="Call"><a href="#"> <span
                                                class="yellow">User Name: </span><?= $_SESSION["user_name"] ?></a></div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th>
                    Order number
                </th>
                <th>
                    Product name
                </th>
                <th>
                    Download count
                </th>
                <th>
                    Download page
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?= $orderId ?>
                </td>
                <td>
                    Awesome product
                </td>
                <td>
                    <?= $downloadCount ?>
                </td>
                <td>
                    <button class="btn-link">
                        <a href="<?= "/download" ?>">Download Page</a>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
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
    </body>
    <script src="../Static/js/navbar.js"></script>
    </html>

<?php
if (isset($_POST["logout"])) {
    session_destroy();
}
?>