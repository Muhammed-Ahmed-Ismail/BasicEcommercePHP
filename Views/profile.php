<?php
print_r($_SESSION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)
{
?>

<h1>Hello from profile page</h1>
    <form action="">
        <input type="submit">
    </form>

<?php }
else{
    header("Location:/login");
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="submit" name="logout">
</form>

</body>
</html>

<?php
if(isset($_POST["logout"])){
    session_destroy();
}
?>