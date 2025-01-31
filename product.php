<?php
session_start(); 

require_once 'Database.php'; 

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

        return $stmt->execute(); 
    }
}

class Auth {
    public static function checkLogin() {
        return isset($_SESSION['user_id']);
    }

    public static function login($user_id) {
        $_SESSION['user_id'] = $user_id;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }
}

$database = new Database();
$db = $database->getConnection();
$product = new Product($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($name) && !empty($description) && !empty($price)) {
        
        if ($product->addProduct($name, $description, $price)) {
            echo "Product successfully added!";
        } else {
            echo "An error occurred while adding the product!";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productsProduct.css">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" required><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" required><br><br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>
