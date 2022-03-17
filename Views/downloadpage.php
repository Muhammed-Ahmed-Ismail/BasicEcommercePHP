<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
if(isset($_SESSION["loggedin"] )&& $_SESSION["loggedin"]==true)
{
    $orderservice=new OrderServices();
    $productService = new ProductServices();
    $user_id=(int)$_SESSION["user_id"];
    $orderId=$_SESSION["order_id"];
    $count=$orderservice->getDownloadTimes($orderId)->downloads_count;

           if($count<7)
            {$orderservice->updateAnyProduct(1,$orderId,$count+1);
                print_r($_GET);
                header('Content-Disposition: attachment; filename ="'."product".'.zip"');
                if(isset($_GET["local"])){

            readfile("Download_resources/product.zip");
                }else{
                    $s3Link=$productService->getObjectDownloadLink();
                   header("Location:$s3Link");
                }
            }
            else
            {
                echo "Your life is done";
            }

}

