<?php

class Routes
{
    public static function router()
    {
        // Iterate through a given list of routes.
        $request = $_SERVER['REQUEST_URI'];

        switch ($request) {
            case '':
            case '/' :
                require_once("./Views/home.php");
                break;
            case '/login' :
                require_once("./Views/login.php");
                break;
            case '/profile' :
                require_once("./Views/profile.php");
                break;
            case '/editprofile' :
                require_once("./Views/editprofile.php");
                break;
            case '/authedit':
                require_once("./Views/authtoedit.php");
                break;
            case '/create-product':
                require_once("./Views/CreateProduct.php");
                break;
            case '/download?s3=1':
            case '/download?local=1':
                require_once("./Views/downloadpage.php");
                break;
            case '/downloadarea':
                require_once("./Views/download.php");
                break;
            case  '/logout':
                require_once("./Views/logout.php");
                break;
            default:
                http_response_code(404);
                require_once("./Views/404.php");
                break;
        }
    }
}