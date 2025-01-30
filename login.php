<?php

include_once 'Database.php';
include_once 'User.php';
include_once 'Session.php';

Session::startSession();

$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loggedInUser = $user->login($email, $password);

    if ($loggedInUser) {
        Session::set('username', $loggedInUser['name']);
        Session::set('email', $loggedInUser['email']);
        header("Location: home.php");
        exit;
    } else {
        echo "<script>alert('Oops!!! Email or Password is incorrect, please try again!')</script>";
    }
}
?>

<form action="login.php" method="POST">
    <link rel="stylesheet" href="loginregister.css">
    <p class="login-text">AURA - Login</p>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
    <p class="login-register-text"> Don't have an account?<a href="register.php"> Register now!</a></p>
</form>
