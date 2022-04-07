<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
session_start();
require_once("vendor/autoload.php");
//include("ProjectUtilities/Routes.php");


/*$userService = new UserService();
$userService->insertUser("a","1");*/
/*$orserservice=new OrderServices();
$orserservice->addOrder(1,1);*/

Routes::router();
