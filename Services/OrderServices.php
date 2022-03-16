<?php



use Illuminate\Support\Collection;

class OrderServices{
    private $DBC;
    private $connection;

    /**
     * Constructor
     */
    public function __construct(){
         $this->DBC = new DatabaseConnector();
         $this->connection = $this->DBC->getDbc();
    }

    /**
     * Get all orders
     * @return Collection
     */
    function getOrders(): Collection{
        return $this->connection->table("orders")->get();
    }

    /**
     * Get download count and product id
     * @param $orderID
     * @return stdClass|null
     */
    function getOrderById($orderID): ?stdClass{
        if (is_numeric($orderID) && $orderID > 0) {
            return $this->connection->table("orders")->where("order_id", "=", "$orderID")->select(["download_count", "product_id"])->first();
        } else {
            return null;
        }
    }

    function getOrderByUserId($userID): ?stdClass{
        if (is_numeric($userID) && $userID > 0) {
            return $this->connection->table("orders")->where("ID", "=", "$userID ")->select(["download_count", "product_id"])->first();
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
        return $this->connection->table("orders")->where('product_id', $productID)->where('order_id', $OrderID)->update(["downloads_count" => $count]);
    }

    /**
     * Delete order from database
     * @param int $id
     * @return int
     */
    function deleteOrder(int $id): int{
        return $this->connection->table("orders")->where('order_id', '=', $id)->first()->delete();
    }

    /**
     * @param int $uid
     * @param int $pid
     * @return int
     */
     public function addOrder(int $uid,int $pid) :int {
        $orderDate=date("Y-m-d");
        return $this->connection->table("orders")->insertGetId(["order_date"=>$orderDate,"ID"=>$uid,"product_id"=>$pid]);

     }
}
