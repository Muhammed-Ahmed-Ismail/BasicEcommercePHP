<?php
if (isset($_POST["submit"])) {
    $productsService = new ProductServices();

    echo "<h2> Counter = " . ++ProductServices::$testCounter . "</h2>";


    if (isset($_FILES['selectedFile'])) {
        FileUploader::uploadSelectedFile();
        var_dump(FileUploader::getFilePath());
        var_dump(FileUploader::getFileName());
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
