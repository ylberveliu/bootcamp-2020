<?php 
session_start();

if(isset($_COOKIE['is_logged_in'])) {
    if(isset($_COOKIE['user_email'])) {
        echo "Welcome " .$_COOKIE['user_email'] ." " .'<a href="?action=logout">Logout</a>';
    }
} else {
    header("Location: login.php");
}

if(isset($_GET['action'])) {
    if($_GET['action'] === "logout") {
        # delete sessions
        unset($_SESSION['user_email']);
        unset($_SESSION['is_logged_in']);
        session_destroy();

        # delete cookies
        setcookie("user_email", null, -1);
        setcookie("is_logged_in", null, -1);

        header("Location: login.php");
    }
}