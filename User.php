<?php
class User {
    private $conn;
    private $table_name = 'useri';  // Assuming your table is named 'useri'

    public function __construct($db) {
        $this->conn = $db;
    }

    // Register function
    public function register($name, $surname, $email, $password) {
        $query = "INSERT INTO {$this->table_name} (name, surname, email, password, role) 
                  VALUES (:name, :surname, :email, :password, 'user')";  // Default role is 'user'

        $stmt = $this->conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', password_hash($password, PASSWORD_DEFAULT));  // Hashing the password

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Login function
    public function login($email, $password) {
        $query = "SELECT id, name, surname, email, password, role FROM {$this->table_name} WHERE email = :email";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Check if a record exists
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                // Start the session and store user data
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];  // Store the user's role

                return true;
            }
        }
        return false;
    }
}
?>
