<?php

require_once ("../vendor/autoload.php");

class DownloadValidation{
    function isValid($user_id, $product_id, $order_id) : bool { //still need to check for the 7 times download
        $OS = new OrderServices();
        $download_times = $OS->getDownloadTimes($order_id);
        $download_times = $download_times->download_count;
        $PS = new ProductServices();
        $US = new UserService();
        $err = "";

        if($OS->getOrderById($order_id)) {
            if (!$PS->getProductById($product_id)) {
                $err = "product isn't valid";
            }
            if (!$US->getUserById($user_id)) {
                $err = "user id is invalid";
            }
            if ($download_times >= 7 || $download_times == null) {
                $err = "maxed download limit or not allowed to download";
            }
        }

        if(empty($err)){
            return true;
        }else{
            return false;
        }
    }
}