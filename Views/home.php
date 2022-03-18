<?php
//$EmailValidateResult;
//$passwordValidateResult;
//$creditCardValidateResult;
//$CvvValidateResult;
$FormValidator = new FormValidator();
$qrService=new QService();
$qrCode=$qrService->makeQR("/profile");
$loginNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/login'>Login</a>
                </li>";
$logoutNavItem = "<li class='nav-item'>
                    <a class='nav-link' href='/logout'>Logout</a>
                </li>";

if(isset($_SESSION["user_name"])){
$emailNavItem = "<li class='nav-item'>
                      <strong class='nav-link'>Email: <span>" .$_SESSION['user_name']. "</span></strong>
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
        if ($userID > 0) {
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
    <nav id="CustomNav" class="navbar navbar-expand-lg navbar-light bg-light" style="background: #eae9e4 !important;">
        <a class="navbar-brand" href="#">Awesome</a>
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
<!-- banner -->
<section class="banner_main" style="background: white !important;">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-6">
                <div class="text-bg">
                    <h1>Software Packages</h1>
                    <p>Some valuable software products that is designd by a group of brilliant developers using php.</p></br>
                    <img src="<?php echo $qrCode;?>" style="width:400px; height: 400px" alt="qrcode">
                </div>
            </div>

            <div class='col-md-6'>
                <form id='request' class='main_form' method='POST'>
                    <div class='row'>
                        <div class='col-md-12 '>
                            <input class='contactus' placeholder='email' type='text' name='email'>
                            <?php
                            if (isset($EmailValidateResult['isValid'])) {
                                if ($EmailValidateResult['isValid'] == false) {
                                    echo "<span style ='color:red;'>" . $EmailValidateResult['message'] . "</span>";

                                }
                            }
                            ?>

                        </div>
                        <div class='col-md-12'>
                            <input class='contactus' placeholder='Password' type='password' name='password'>
                            <?php
                            if (isset($passwordValidateResult['isValid'])) {
                                if ($passwordValidateResult['isValid'] == false) {
                                    echo "<span style ='color:red;'>" . $passwordValidateResult['message'] . '</span>';
                                }
                            }
                            ?>
                        </div>
                        <div class='col-md-12'>
                            <input class='contactus' placeholder='confirm password' type='password'
                                   name='confirm password'>

                        </div>
                        <div class='col-md-12'>
                            <input class='contactus' placeholder='credit card' type='text' name='credit card'>
                            <?php
                            if (isset($creditCardValidateResult['isValid'])) {
                                if ($creditCardValidateResult['isValid'] = false) {
                                    echo "<span style ='color:red;'>" . $creditCardValidateResult['message'] . '</span>';
                                }
                            }
                            ?>
                        </div>
                        <div class='col-md-12'>
                            <input class='contactus' placeholder='cvv' type='number' name='cvv'>
                            <?php
                            if (isset($CvvValidateResult['isValid'])) {
                                if ($CvvValidateResult['isValid'] = false) {
                                    echo "<span style ='color:red;'>" . $CvvValidateResult['message'] . '</span>';
                                }
                            }
                            ?>
                        </div>
                        <input class='send_btn' value='submit' type='submit' name='submit'>
                </form>
            </div>
        </div>
</section>

<!-- end clients -->
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