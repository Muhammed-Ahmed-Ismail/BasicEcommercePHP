<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true)
{
    if(!isset($_SESSION["authtoedit"]) || $_SESSION["authtoedit"]==false)
    {
        header("Location:/authedit");
    }
    $userService=new UserService();
    $formValidator=new FormValidator();
    $userId=$_SESSION["user_id"];
    $userName= $_SESSION["user_name"];

    if(isset($_POST["editprofile"]))
    {
        if(!empty($_POST["email"]))
        {

            $newEmail=$_POST["email"];
            $emailValidatorResult= $formValidator->validate_email();
            if($emailValidatorResult["isValid"]) {
                $emailUpdateResult = $userService->updateUsersEmail($userId, $newEmail);
                if ($emailUpdateResult) {
                    $_SESSION["user_name"] = $newEmail;

                }
            }else
            {
                $emailValidationError=$emailValidatorResult["message"];

            }
        }
        if(!empty($_POST["password"])) {
            $passwordValidatorResult = $formValidator->validate_password();
            if ($passwordValidatorResult) {
                if (empty($_POST["confirm_password"])) {
                    $passwordConfirmValidatioinError = "You must confirm your password";
                } elseif (strcmp(trim($_POST["password"]), trim($_POST["confirm_password"])) != 0) {
                    $passwordConfirmValidatioinError = "Not matched with the entered password";
                } else {
                    $newPassword = $_POST["password"];
                    $passwordUpdateResult = $userService->updateUsersPassword($userId, $newPassword);
                }
            } else
            {
                $passwordValidationError=$passwordValidatorResult["message"];
            }
        }
       // $_SESSION["authtoedit"]=false;
    }

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
                                    <a class="nav-link" href="/profile">Profile </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= "/logout"?>">Log Out</a>
                                </li>
                            </ul>
                            <div class="Call"><a href="#"> <span class="yellow">Email: </span><?= $_SESSION["user_name"]?></a></div>
                            <div style="margin-left: 50px" class="Call"><a href="/editprofile"> <span class="yellow">Settings</span></a></div>

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container" style="display: flex; justify-content: center">
    <div class="col-md-6" style="margin-top: 25px">
        <form id="request" class="main_form" method="POST" action="/editprofile">
            <div class="row">
                <div class="col-md-12 ">
                    <input class="contactus" placeholder="email" type="text" name="email">
                    <span style="color:red;"><?php if(isset($emailValidationError)) echo $emailValidationError;?></span>
                </div>
                <div class="col-md-12">
                    <input class="contactus" placeholder="Password" type="password" name="password">
                    <span style="color:red;"><?php if(isset($passwordValidatioinError)) echo $passwordValidatioinError;?></span></div>
                <div class="col-md-12">
                    <input class="contactus" placeholder="confirm password" type="password" name="confirm password">
                    <span style="color:red;"><?php if(isset($passwordConfirmValidatioinError))echo $passwordConfirmValidatioinError;?></span>
                </div>

                <div class="col-sm-12">
                    <!-- <input class="send_btn" value="submit" type="submit" name="submit"> -->

                </div>
                <input class="send_btn" value="submit" type="submit" name="editprofile">

            </div>
        </form>
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