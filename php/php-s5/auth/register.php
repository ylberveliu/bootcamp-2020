<?php 
session_start();
include "db.php";

// print_r($mysqli);

# y.v@perprogramera.com|net

function is_email($email) {
    if(preg_match("/[\w\.\_\-]+\@perprogramera.(com|net)/i", $email) == 0) 
        return false;

    return true;
}

$errors = [];

if(isset($_POST['register_btn'])) {
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string($_POST['password']);
    $confirm_password = $mysqli->escape_string($_POST['confirm_password']);

    if(isset($email) && !empty($email) && isset($password) && !empty($password) && isset($confirm_password) && !empty($confirm_password) ) {
        if(is_email($email)) {
        // if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($password === $confirm_password) {
                $password = password_hash($password, PASSWORD_BCRYPT);
                $confirm_password = password_hash($confirm_password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO `users` (`email`, `password`) VALUES ('$email', '$password')";
                if($mysqli->query($sql)) {
                    $_SESSION['user_email'] = $email;
                    $_SESSION['is_logged_in'] = true;
                    setcookie("user_email", $_SESSION['user_email'], time()+120);
                    setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);

                    header("Location: homepage.php");
                } else {
                    $errors[] = "Registration faild!";
                }
            } else {
                $errors[] = "Password and Confirm password doesn't match!";
            }
        } else {
            $errors[] = "Email is not valid!";
        }
    } else {
        $errors[] = "All fields are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PHP</title>
</head>
<body>
    <h1>Register</h1>
    <?php
        echo "<ul>"; 
        if(count($errors)) {
            foreach($errors as $error) {
                echo "<li>$error</li>";
            }
        }
        echo "</ul>";
    ?>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        <input type="text" name="email" placeholder="Enter your email" />
        <br /><br />
        <input type="password" name="password" placeholder="Enter your password" />
        <br /><br />
        <input type="password" name="confirm_password" placeholder="Enter your password" />
        <br /><br />
        <button name="register_btn" type="submit">Register</button>
        <a href="login.php">Login</a>
    </form>
</body>
</html>