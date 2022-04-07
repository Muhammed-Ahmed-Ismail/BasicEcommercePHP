<?php

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    $orderservice = new OrderServices();
    $productService = new ProductServices();
    $orderId = $_SESSION["order_id"];
        if (isset($_GET["local"])) {
            $productService->downloadFromLocalServer($orderId,1);

        } else {
            $s3Link = $productService->getObjectDownloadLink();
            header("Location:$s3Link");
        }
}