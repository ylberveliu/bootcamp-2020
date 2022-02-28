<?php 

include 'autoload.php';

class Products {
    private $mysqli;

    public function __construct() {
        $this->mysqli = (Database::getInstance())->getConnection();
    }   

    public function all() {
        $products = [];
        $sql = "SELECT * FROM `products`";
        $result = $this->mysqli->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }

        return $products;
    }

    public function get($id) {
        $product = [];
        $sql = "SELECT * FROM `products` WHERE `id` = '".$id."'";
        $result = $this->mysqli->query($sql);

        if($result->num_rows > 0) {
            $product = $result->fetch_assoc();
        }

        return $product;
    }

    public function create($data) {
        $sql = "INSERT INTO `products` (`title`, `price`, `qty`, `images`, `admin_id`) VALUES ('".$data['title']."', '".$data['price']."', '".$data['qty']."', '".$data['images']."', '".$data['admin_id']."')";
        
        if($result = $this->mysqli->query($sql))
            return true;
        else
            return false;
    } 

    public function update($id, $data) {
        $sql = "UPDATE `products` SET `title`='".$data['title']."', `price`='".$data['price']."', `qty`='".$data['qty']."' WHERE `id`='".$id."'";
        
        if($result = $this->mysqli->query($sql))
            return true;
        else
            return false;
    } 

    public function delete($id) {
        $sql = "DELETE FROM `products` WHERE `id` = '" .$id ."'";

        if($this->mysqli->query($sql))
            return true;

        return false;
    }
}

$products = new Products();
$products->all();

