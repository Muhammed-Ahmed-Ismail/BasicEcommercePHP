<?php




use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Collection;



class ProductServices
{
    private DatabaseConnector $DBC;
    private Manager $connection;
    private S3Client $s3;


    public function __construct()
    {
        $this->DBC = new DatabaseConnector();
        $this->connection = $this->DBC->getDbc();
        $this->s3 = new S3Client(S3_CREDENTIALS);
    }

    public function getS3(): S3Client
    {
        return $this->s3;
    }

    /**
     * Get All Items in Table
     * @return Collection
     */
    function getProducts(): Collection
    {
        return $this->connection->table("products")->get();
    }

    /**
     * Get specific item from table using id
     * @param int $id
     * @return stdClass|null
     */
    function getProductById(int $id): ?stdClass
    {
        if ($id > 0) {
            return $this->connection->table("products")->where("product_id", "=", "$id")->select(["download_file_link", "file_name"])->first();
        } else {
            return null;
        }
    }
    function getProductLink(int $id)
    {
        return $this->connection->table("products")->where("product_id", "=", "$id")->select(["download_file_link"])->first();

    }

    /**
     * Get specific item from table using id
     * @param  $productID
     * @param  $url
     * @param  $filename
     * @return int
     */
    function updateProductDate($productID, $url, $filename): int
    {
        return $this->connection->table("products")
            ->where('product_id', $productID)
            ->update(["download_file_link" => $url, "file_name" => $filename]);
    }


    // insert products  : for future plans
    /**
     * Add new product to database
     * @param String $x
     * @param String $y
     * @return bool
     */
    function addProduct(string $x, string $y): bool
    {
        return $this->connection->table("products")->insert(['download_file_link' => $x, 'file_name' => $y]);
    }

    /**
     * Delete product from database
     * @param int $id
     * @return int
     */
    function deleteProduct(int $id): int
    {
        return $this->connection->table("products")
            ->where('product_id', '=', $id)->first()->delete();

    }

    /**
     * Upload selected file to s3 bucket and remove selected file from the local server
     * @param $filePath
     */
    public function uploadFileToS3Bucket($fileName,$filePath)
    {
        try {
            $this->s3->putObject([
                'Bucket' => S3_CREDENTIALS['bucket'],
                'Key' => S3_CREDENTIALS['credentials']["key"],
                'Body' => fopen($filePath, 'rb'),
                'ACL' => 'public-read'
            ]);

            // Remove the file
            unlink($filePath);

        } catch (S3Exception $e) {
            die("Something wrong happened while uploading file to s3 bucket");
        }

    }

    /**
     * Return Iterator of available objects in the selected s3 bucket
     */
    public function listingUploadedFiles(): Iterator
    {
        return $this->s3->getIterator('ListObjects', [
            'Bucket' => S3_CREDENTIALS['bucket']],
        );
    }

    /**
     * Return pre-signed download link expires after 1 minutes
     * @return string
     */
    public function getObjectDownloadLink(): string
    {
        $cmd = $this->s3->getCommand('GetObject', [
            'Bucket' => S3_CREDENTIALS["bucket"],
            'Key' => S3_CREDENTIALS["credentials"]["key"]
        ]);
        $request = $this->s3->createPresignedRequest($cmd, '+10 seconds');

        return (string)$request->getUri();
    }
    public function downloadFromLocalServer(int $orderId, int $productId)
    {
        $orderSerivce= new OrderServices();
        $util=new ProjectUtilities();
        $count=$orderSerivce->getDownloadTimes($orderId)->downloads_count;
        echo $count;
        if($count<7)
        {
           $orderSerivce->updateAnyProduct($productId,$orderId,$count+1);
            $fileLink= $this->getProductLink($productId)->download_file_link;
            header('Content-Disposition: attachment; filename ="'."product".'.zip"');
            readfile("$fileLink");
            $newName=$util->generateRandomString();
            rename("$fileLink","Download_resources/$newName.zip");
            $newLink='Download_resources/'.$newName.'.zip';
            $this->updateProductDate(1,$newLink,'product');
        }
        else header("location:/profile");

    }

}
