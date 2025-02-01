<?php
include('Database.php'); 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        $db = new Database();
        $conn = $db->getConnection();
        
        
        if (!empty($name) && !empty($lastname) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = "INSERT INTO contact_us(name, lastname, email, message) VALUES (:name, :lastname, :email, :message)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':message', $message);

            if ($stmt->execute()) {
                $confirmationMessage = "Thank you for contacting us, $name $lastname! We will get back to you soon at $email.";
            } else {
                $confirmationMessage = "An error occurred. Please try again.";
            }
        } else {
            $confirmationMessage = "Please fill out all fields correctly.";
        }
    } catch (PDOException $e) {
        $confirmationMessage = "Database error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="contactUs.css">
    <title>AURA</title>
</head>
<body>
    <nav>
        <label class="logo">AURA</label>
        <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="sales.html">Sales</a></li>
        <li><a href="contactUs.php">Contact Us</a></li>
        <li><a href="login.php"><i class="fa fa-user-plus"></i> </a></li>
        </ul>
    </nav>

    <div class="contact" id="ContactUs">
        <div class="container">
            <h1>Contact Us</h1>
            <form method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="Write your first name" required>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Write your last name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Write your email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Write your message" required></textarea>

                <button type="submit">Submit</button>
            </form>

            <?php if (isset($confirmationMessage)): ?>
                <div class="confirmation">
                    <h2><?php echo $confirmationMessage; ?></h2>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h4>AURA - Cosmetics</h4>
                <p><i class="fa fa-map-marker"></i><a href="Mother Teresa, Gjakova, Kosovo">Mother Teresa, Gjakova, Kosovo</a></p>
                <p><i class="fa fa-phone"></i> +383 49 636 828</p>
                <p><i class="fa fa-envelope"></i> <a href="mailto:auracosmetics@gmail.com">auracosmetics@gmail.com</a></p>
            </div>
            <div class="footer-social">
                <a href="#" target="_blank">Facebook</a>
                <a href="#" target="_blank">Twitter</a>
                <a href="#" target="_blank">Instagram</a>
            </div>
            <div class="footer-copyright">
                <p>&copy; 2024 AURA. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
