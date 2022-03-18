<?php
//if(isset($_COOKIE["remember_me"])){
//    $_SESSION["loggedin"]= true;
//    header("Location:/profile");
//    echo "ay 7war ";
//}else {
//    echo "ay 7war 2";
//    header("Location:/login");
//}


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("Location:/profile");

} elseif (isset($_COOKIE["remember_me"])) {
    var_dump($_COOKIE["remember_me"]);
    $ck = new CookieGenerator();
    $isValid = $ck->isValidToken($_COOKIE["remember_me"]);
    var_dump($isValid);
    if ($isValid) {
        $_SESSION["loggedin"] = true;
        header("Location:/profile");
    }
}


if (isset($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
    $userService = new UserService();
    $visitorEmail = $_POST["email"];
    $visitorPassword = $_POST["password"];
    $authUser = $userService->is_authUser(trim($visitorEmail), trim($visitorPassword));
    if ($authUser != 0) {
        $_SESSION["loggedin"] = true;
        $_SESSION["user_id"] = $authUser;
        $_SESSION["user_name"] = $_POST["email"];

        if (isset($_POST["remember_me"]) && $_POST["remember_me"] == "on") {
            $userCookie = new CookieGenerator();
            $userCookie->remember_me($_SESSION["user_id"]);
        }
        header("Location:/profile");


    }

}
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
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9" style="display: flex;justify-content: flex-end;">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04"
                             style="display: flex;justify-content:flex-end">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Home</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end header inner -->
<!-- end header -->
<section class="banner_main" style="background-color: white;">
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
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" id="request" class="main_form">
                    <div class="row">
                        <label class="col-md-12">
                            <input class="contactus" placeholder=" Email" type="text" name="email">
                        </label>

                        <label class="col-md-12">
                            <input class="contactus" type="password" placeholder="password" name="password">
                        </label>

                        <label for="rememberMe" class="col-sm-12">
                            <input type="checkbox" name="remember_me" id="rememberMe" style="width: 20px;height: 17px;">
                            <p style="display: inline;font-size: 20px; color:whitesmoke;">Remember me</p>
                        </label>
                        <br><br><br><br><br>
                        <input type="submit" name="login" class="send_btn col-sm-12">

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--  footer -->
<footer>
    <div class="footer" style="padding-top:19px;">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>Copyright 2019 All Right Reserved By <a href="https://html.design/"> Free Html
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
</html>

