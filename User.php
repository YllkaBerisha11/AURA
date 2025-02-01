<?php
class User {
    private $conn;
    private $table_name = 'useri';  

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function register($name, $surname, $email, $password) {
        
        if ($this->isEmailExists($email)) {
            return false;
        }

        
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        
        $query = "INSERT INTO {$this->table_name} (name, surname, email, password, role) 
                  VALUES (:name, :surname, :email, :password, 'user')"; 

        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

   
    public function login($email, $password) {
        $query = "SELECT id, name, surname, email, password, role FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role']; 

                return true;
            }
        }

        return false;
    }

   
    private function isEmailExists($email) {
        $query = "SELECT id FROM {$this->table_name} WHERE email = :email LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}
?>