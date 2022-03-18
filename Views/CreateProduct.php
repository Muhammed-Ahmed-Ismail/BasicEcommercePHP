<?php
if (isset($_POST["submit"])) {
    $productsService = new ProductServices();

    if (isset($_FILES['selectedFile'])) {
        FileUploader::uploadSelectedFile();
        $productsService->uploadFileToS3Bucket(FileUploader::getFileName(), FileUploader::getFilePath());
    }
}
?>

<h1>hello form Create product page</h1>
<form action="/create-product" method="post" name="createProduct" enctype="multipart/form-data">
    <label>
        Name :
        <input type="text" name="productName" placeholder="productName">
    </label>
    <label>
        File :
        <input type="file" name="selectedFile">
    </label>
    <input type="submit" name="submit" value="Create">
</form>
