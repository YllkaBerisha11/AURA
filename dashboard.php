<?php
session_start();
include_once 'Database.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$db = new Database();
$connection = $db->getConnection();


$messageQuery = "SELECT COUNT(*) as total FROM contact_us";
$messageResult = $connection->query($messageQuery);
$messageCount = $messageResult->fetchColumn();

$productQuery = "SELECT COUNT(*) as total FROM products";  
$productResult = $connection->query($productQuery);
$productCount = $productResult->fetchColumn();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <nav>
        <h1>Admin Dashboard</h1>
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="sales.html">Sales</a></li>
        <li><a href="contactUs.php">Contact Us</a></li>
        <a href="logout.php">Logout</a>
    </nav>
    
    <div class="dashboard-container">
        <div class="dashboard-row">
            <div class="box">
                <h2>Total Messages</h2>
                <p><?php echo $messageCount; ?></p>
            </div>
            
            <div class="box">
                <h2>Total Products</h2>
                <p><?php echo $productCount; ?></p>
            </div>
        </div>

        <div class="dashboard-row">
            <div class="box add-product">
                <h2>Add New Product</h2>
                <form action="add_product.php" method="POST">
                    <input type="text" name="product_name" placeholder="Product Name" required><br>
                    <input type="text" name="product_price" placeholder="Product Price" required><br>
                    <button type="submit">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
