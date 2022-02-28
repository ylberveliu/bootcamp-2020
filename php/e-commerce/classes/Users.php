<?php 

include 'autoload.php';

class Users {
    private $mysqli;

    public function __construct() {
        $this->mysqli = (Database::getInstance())->getConnection();
    }   

    public function get($id) {
        $user = [];
        $sql = "SELECT * FROM `users` WHERE `id` = '".$id."'";
        $result = $this->mysqli->query($sql);

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();
        }

        return $user;
    }
}

$products = new Products();
$products->all();

