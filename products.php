<?php
require_once 'Product.php';


$product = new Product();

$product->addProduct('Product 1', 10.00, 'images/image1.jpg');
$product->addProduct('Product 2', 15.50, 'images/image2.jpg');


$products = $product->getAllProducts();


if (empty($products)) {
    echo "<p>No products found.</p>";
} else {
    foreach ($products as $prod) {
        echo "<div>";
        echo "<h3>" . htmlspecialchars($prod['name']) . "</h3>";
        echo "<p>Price: $" . htmlspecialchars($prod['price']) . "</p>";
        echo "<img src='" . htmlspecialchars($prod['image']) . "' alt='" . htmlspecialchars($prod['name']) . "' />";
        echo "<button class='add-to-cart'>Add to Cart</button>";
        echo "<button class='favorite'>Add to Favorites</button>";
        echo "</div>";
    }
}
?>
