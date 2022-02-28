<?php 
if(!isset($_COOKIE['user_id']) || !isset($_COOKIE['email']))
{
    header("Location: login.php");
} else {
    echo "Welcome " . $_COOKIE['email'];
}