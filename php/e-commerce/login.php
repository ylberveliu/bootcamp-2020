<?php 
    session_start();
    include 'autoload.php';

    $errors = [];

    if(isset($_POST['login_btn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $user_obj = new Auth($username, $password, $role);

        if($user = $user_obj->login()) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_logged_in'] = true;
            $_SESSION['is_admin'] = $user['is_admin'];

            if(isset($_POST['remember_me'])) {
                if($_POST['remember_me'] == 1) {
                    setcookie("username", $_SESSION['username'], time()+3600);
                    setcookie("is_logged_in", $_SESSION['is_logged_in'], time()+3600);
                    setcookie("is_admin", $_SESSION['is_admin'], time()+3600);
                }
            }

            if($user['is_admin'] == 1)
                header("Location: admin-panel.php");
            else 
                header("Location: profile.php");
        } else {
            $errors[] = "Username or/and password is incorrect!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | e-commerce</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
</head>
<body>


    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <?php
                    if(count($errors)) {
                ?>
                    <div class="alert alert-danger">
                        <ul>
                        <?php foreach($errors as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                <?php   
                    }
                ?>

                <a href="index.php"><h1 class="my-5 align-center">e-commerce</h1></a>

                <form method="POST">
                    <div class="form-group">
                        <select name="role" class="form-control">
                            <option value="0">Customer</option>
                            <option value="1">Administrator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember_me" value="1" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                    <a href="register.php" class="btn btn-sm btn-link">Register</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>