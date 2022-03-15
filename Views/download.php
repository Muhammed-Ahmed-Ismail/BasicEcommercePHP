<?php
$productService = new ProductServices();
$products = $productService->listingUploadedFiles();
?>

<table>
    <thead>
    <tr>
        <th>Product name</th>
        <th>Link</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>
            <?php echo $products->current()['Key'] ?>
        </td>
        <td>
            <a target="_blank" href="<?php echo $productService->getObjectDownloadLink() ?>" download="
            <?php $products->current()['Key'] ?>">Download</a>
        </td>
    </tr>
    </tbody>
</table>
