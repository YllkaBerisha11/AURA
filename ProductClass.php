<?php
require_once 'Database.php';
require_once 'ProductClass.php';

class Product {
    private $conn;
    private $table = 'products';   

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addProduct($name, $description, $price) {
    
        $query = "INSERT INTO {$this->table} (name, description, price) VALUES (:name, :description, :price)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
}
?>
