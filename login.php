<?php
session_start();
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->login($email, $password)) {
        
        if ($_SESSION['role'] === 'admin') {
            header("Location: dashboard.php"); 
        } else {
            header("Location: Home.php"); 
        }
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>
<form action="login.php" method="POST">
    <link rel="stylesheet" href="loginregister.css">
    <p class="login-text">AURA - Login</p>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <p class="login-register-text"> Don't have an account?<a href="Register.php"> Register now!</a></p>
</form>
