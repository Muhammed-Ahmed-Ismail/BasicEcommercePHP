<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
require_once("vendor/autoload.php");

$userService = new UserService();

$allUsers = $userService->getUsers();

var_dump($allUsers);

ini_set('error_reporting', E_ALL);
ini_set( 'display_errors', 1 );
require_once("vendor/autoload.php");
$DBC=new DatabaseConnector();
$connection=$DBC->getDbc();
$users=$connection->table("users")->first();
var_dump($users);

require_once ("vendor/autoload.php");

$x = new ProductServices();
$t =$x->updateAnyProduct(1,"dgds","fsdgs");
print_r($t);


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

</body>
</html>
