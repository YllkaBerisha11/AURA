<?php
include_once 'Session.php';

Session::startSession();

Session::destroy();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

header("Location: login.php");
exit();
?>
