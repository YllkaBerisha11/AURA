<?php
class Auth {
    public static function checkLogin() {
        return isset($_SESSION['user_id']);
    }

    public static function login($user_id) {
        $_SESSION['user_id'] = $user_id;
    }

    public static function logout() {
        session_unset();
        session_destroy();
    }
}
?>
