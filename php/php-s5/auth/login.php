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

if(isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if( isset($email) && !empty($email) && isset($password) && !empty($password) ) {
        if(is_email($email)) {
            $sql = "SELECT * FROM `users` WHERE `email`='$email'";
            if($result = $mysqli->query($sql)) {
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if(password_verify($password, $row['password'])) {
                        $_SESSION['user_email'] = $email;
                        $_SESSION['is_logged_in'] = true;
                        setcookie("user_email", $_SESSION['user_email'], time()+120);
                        setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+120);
    
                        header("Location: homepage.php");
                    } else {
                        $errors[] = "Password is incorrect!";
                    }
                } else {
                    $errors[] = "User doesn't exist!";
                }
            } else {
                $errors[] = "Login faild!";
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
    <title>Login - PHP</title>
</head>
<body>
    <h1>Login</h1>
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
        <button name="login_btn" type="submit">Register</button>
        <a href="register.php">Register</a>
    </form>
</body>
</html>