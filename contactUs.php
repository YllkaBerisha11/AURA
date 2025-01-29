<?php
require_once 'ContactUsHandler.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

   
    $contactHandler = new ContactUsHandler();

    if ($contactHandler->saveFormData($name, $lastname, $email, $message)) {
        echo "Message sent successfully!";
    } else {
        echo "Something went wrong. Please try again.";
    }
}
?>


<form action="contactUs.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" placeholder="Write your first name" required>

    <label for="lastname">Last Name:</label>
    <input type="text" id="lastname" name="lastname" placeholder="Write your last name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Write your email" required>

    <label for="message">Message (optional):</label>
    <textarea id="message" name="message" rows="5" placeholder="Write your message"></textarea>

    <button type="submit">Submit</button>
</form>
