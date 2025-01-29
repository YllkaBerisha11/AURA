<?php

require_once 'Database.php'; // Përfshi klasën Database

class ContactUsHandler {
    private $db;
    private $conn;


    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

  
    public function saveFormData($name, $lastname, $email, $message) {
     
        $sql = "INSERT INTO contact_us (name, lastname, email, message) VALUES (:name, :lastname, :email, :message)";
        
        $stmt = $this->conn->prepare($sql);

      
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);

       
        if ($stmt->execute()) {
            return true;
        } else {
            return false; 
        }
    }
}
?>
