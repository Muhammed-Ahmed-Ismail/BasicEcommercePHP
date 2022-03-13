<?php
$productsService = new ProductServices();
$s3 = $productsService->getS3();
var_dump($s3);
?>

<h1>hello form Create product page</h1>
<form action="CreateProduct.php" method="post" name="createProduct">
    <label>
        Name :
        <input type="text" name="productName" placeholder="productName">
    </label>
    <label>
        File :
        <input type="file" name="selectedFile">
    </label>
    <input type="submit" value="Create">
</form>
