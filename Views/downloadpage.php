<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
session_start();
require_once ("../vendor/autoload.php");
if(isset($_SESSION["loggedin"] )&& $_SESSION["loggedin"]==true)
{
$user_id=(int)$_SESSION["user_id"];
$orderservice=new OrderServices();
echo $_GET["id"];
$orderInfo=$orderservice->getOrderById($_GET["id"]);
var_dump($orderInfo);

if($orderInfo->ID!=$user_id )
{
   die("حرامي");
}else
{
    if($orderInfo->downloads_count<7)
    {
        $count=$orderInfo->downloads_count;
        echo "<h3> you downloaded $count times </h3>";
        $orderservice->updateAnyProduct(1,$_GET["id"],$count+1);
        $fileName=$orderInfo->custom_sl;
        header("Content-Disposition: attachment; filename=Download_resources/$fileName");
    }
    else
    {
        echo "Your life is done";
    }
}
}

