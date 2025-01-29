<?php
require_once 'Database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $price, $image) {
        $sql = "INSERT INTO products (name, price, image) VALUES (:name, :price, :image)";
        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            ':name' => $name,
            ':price' => $price,
            ':image' => $image
        ]);
    }
}
?>
