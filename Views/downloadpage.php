<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $orderservice = new OrderServices();
    $productService = new ProductServices();
    $orderId = $_SESSION["order_id"];
    $count = $orderservice->getDownloadTimes($orderId)->downloads_count;


      //  $orderservice->updateAnyProduct(1, $orderId, $count + 1);

        print_r($_GET);
      //  header('Content-Disposition: attachment; filename ="' . "product" . '.zip"');
        if (isset($_GET["local"])) {
            $productService->downloadFromLocalServer($orderId,1);

        } else {
            $s3Link = $productService->getObjectDownloadLink();
            header("Location:$s3Link");
        }
/*
        header('Content-Disposition: attachment; filename ="' . "product" . '.zip"');
        readfile("Download_resources/7HC7kZrlX3.zip");*/



}