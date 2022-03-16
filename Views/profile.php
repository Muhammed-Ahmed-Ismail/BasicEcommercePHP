<?php
print_r($_SESSION);
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"]==true)
{
    $downloadLink="/download";
    $orderService=new OrderServices();
    $orderInfo=$orderService->getOrderByUserId($_SESSION["user_id"]);
    $count=$orderInfo->downloads_count;
    $orderId=$orderInfo->order_id;
    $orderUserId=$orderInfo->ID;
    $orderLink=$orderInfo->custom_sl;
    $_SESSION["order_id"]=$orderId;
    $_SESSION["download_count"]=$count;
    echo "downloads count for this order:$count";
    echo "<h1>Hello from profile page</h1> <a href='$downloadLink'>link to download </a>";
}
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