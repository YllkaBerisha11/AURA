<?php
include_once 'Database.php';
include_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $connection = $db->getConnection();
    $user = new User($connection);

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($name, $surname, $email, $password)) {
        echo "Registration successful!";
    } else {
        echo "Registration failed! The email may already exist.";
    }
}
?>

<form action="register.php" method="POST">
    <link rel="stylesheet" href="loginregister.css">
    <p class="login-text">AURA - Register</p>
    Name: <input type="text" name="name" required><br>
    Surname: <input type="text" name="surname" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
    <p class="login-register-text"> Do you have an account?<a href="login.php"> Login now!</a></p>
</form>
