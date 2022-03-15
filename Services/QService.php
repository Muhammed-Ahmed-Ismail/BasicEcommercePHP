<?php
/**
 *                                     ------------------------
 *                                    | how to use QR Service: |
 *                                     ------------------------
 * HTML CODE: <img src='--><?= $qrcode; ?> <!--' alt='QR Code' width='400' height='400'>
 * make an object from the class:  $qrcode = new QService();
 * pass your desired link to makeQR function: $qrcode = $qrcode->makeQR($link);
 */

require_once "vendor/autoload.php";

use chillerlan\QRCode\QRCode as QR;
use chillerlan\QRCode\QROptions as options1;

class QService
{

    private $QR_options;

    function __construct()
    {
    }

    function makeQR($link)
    {
        $this->QR_options = new options1(
            [
                'eccLevel' => QR::ECC_L,
                'outputType' => QR::OUTPUT_MARKUP_SVG,
                'version' => 5,
            ]
        );
        $qrcode = (new QR($this->QR_options))
            ->render($link);
        return $qrcode;

    }


}