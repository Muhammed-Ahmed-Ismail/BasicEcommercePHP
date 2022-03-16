<?php
//print_r($_SERVER);
print_r($_SESSION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)
{
    header("Location:/profile");
}
if(isset($_POST["login"]))
{
    print_r($_POST);
    $userService=new UserService();
    $visitorEmail=$_POST["email"];
    $visitorPassword=$_POST["password"];
    $authUser=$userService->is_authUser(trim($visitorEmail),trim($visitorPassword));
    if($authUser!=0)
    {
        $_SESSION["loggedin"]=true;
        $_SESSION["user_id"]=$authUser;
        $_SESSION["user_name"]=$_POST["email"];
        header("Location:/profile");
    }
}
?>

<h1>Hello from login page</h1>

<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">

    <label for="email"> email </label> <input type="text" name="email" id="email"> </br>
    <label for="password"> password </label> <input type="password" name="password" id="password"> </br>
    <label for="remme">remember me </label><input type="checkbox" name="remember_me" id="remme" >
    <input type="submit" name="login">


</form>
