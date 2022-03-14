<?php


require_once ("vendor/autoload.php");

use Illuminate\Support\Collection;

class OrderServices{
    private $DBC;
    private $connection;
    //private $downloads_count;

    public function __construct(){
        //$this->downloads_count = 0;
         $this->DBC = new DatabaseConnector();
         $this->connection = $this->DBC->getDbc();
    }

    function getOrders(): Collection{
        return $this->connection->table("orders")->get();
    }

    function getOrderById($orderID): ?stdClass{
        if (is_numeric($orderID) && $orderID > 0) {
            return $this->connection->table("orders")->where("order_id", "=", "$orderID")->select(["downloads_count", "product_id","ID","custom_sl"])->first();
        } else {
            return null;
        }
    }

    /**
     * Get total product Download times
     * @param int $id
     * @return stdClass|null
     */
    function getDownloadTimes($id): ?stdClass{
        if (is_numeric($id) && $id > 0) {

            return $this->connection->table("orders")->where("order_id", "=", "$id")->select(["downloads_count"])->first();
        } else {
            return null;
        }
    }

    /**
     * update the download count in the order table
     * @param $productID
     * @param $OrderID
     * @param $count
     * @return int
     */
    function updateAnyProduct($productID, $OrderID, $count): int{
        if($count>=7)
        {
            $orderLink=$this->connection->table("orders")->where('order_id', $OrderID)->select(["custom_sl"])->first();
            $this->deleteOrder($OrderID);
            $this->deleteCustomsl($orderLink->custom_sl);
        }
        return $this->connection->table("orders")->where('product_id', $productID)->where('order_id', $OrderID)->update(["downloads_count" => $count]);
    }

    /**
     * @param int $userId
     * @return void
     */
    public function getActiveOrder(int $userId) :? stdClass
    {
        return $this->connection->table("orders")->where("ID", "=", "$userId")->first();

    }

    /**
     * Delete order from database
     * @param int $id
     * @return int
     */
    function deleteOrder(int $id): int{
        return $this->connection->table("orders")->where('order_id', '=', $id)->delete();
    }


    /**
     * Adds order record to the database and returns the id of the order.
     * @return int
     */

    public function addOrder(int $uid,int $pid) :int {
        $orderDate=date("Y-m-d");
        $orderId= $this->connection->table("orders")->insertGetId(["order_date"=>$orderDate,"ID"=>$uid,"product_id"=>$pid]);
        $linkname="Download_resources/"."$orderId"."$orderDate";
        $this->createCustomSl($linkname);
        $this->connection->table("orders")->where('order_id',$orderId)->update(["custom_sl" => $linkname]);
        return $orderId;

    }

    /**
     * creates a soft link to the product file.
     * @param string $linkName
     * @return void
     */
    private function createCustomSl(string $linkName)
    {

        symlink("product.zip","$linkName");
    }

    /**
     * @param string $linkname
     * @return void
     */
    private function deleteCustomsl(string $linkname)
    {
        unlink($linkname);

    }
    
}

