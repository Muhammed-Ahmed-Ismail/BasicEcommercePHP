<?php
session_start();
require_once("vendor/autoload.php");
include("Utilities/Routes.php");
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);

$userService = new UserService();
$userService->insertUser("a","1");

Routes::router();
