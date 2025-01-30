<?php
include('Database.php'); // Ensure you have your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        $db = new Database();
        $conn = $db->getConnection();
        
        $sql = "INSERT INTO contact_us(name, lastname, email, message) VALUES (:name, :lastname, :email, :message)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

        if ($stmt->execute()) {
            echo "Your message has been sent successfully!";
        } else {
            echo "Error submitting the form.";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
