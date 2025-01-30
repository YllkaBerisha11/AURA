<?php
require_once 'Database.php';

class  contactform {
    private $name;
    private $lastname;
    private $email;
    private $message;
    private $conn;

    public function __construct($name, $lastname, $email, $message) {
        $this->name = htmlspecialchars(trim($name));
        $this->lastname = htmlspecialchars(trim($lastname));
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $this->message = htmlspecialchars(trim($message));

        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function isValid() {
        return !empty($this->name) && !empty($this->lastname) && 
               !empty($this->email) && !empty($this->message) &&
               filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    public function saveToDatabase() {
        if ($this->isValid()) {
            try {
                $query = "INSERT INTO contact_us (name, lastname, email, message) VALUES (:name, :lastname, :email, :message)";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':name', $this->name);
                $stmt->bindParam(':lastname', $this->lastname);
                $stmt->bindParam(':email', $this->email);
                $stmt->bindParam(':message', $this->message);
                
                if ($stmt->execute()) {
                    return "Thank you for contacting us, $this->name $this->lastname! We will get back to you soon at $this->email.";
                } else {
                    return "An error occurred. Please try again.";
                }
            } catch (PDOException $e) {
                return "Database error: " . $e->getMessage();
            }
        }
        return "Please fill out all fields correctly.";
    }
}
?>
