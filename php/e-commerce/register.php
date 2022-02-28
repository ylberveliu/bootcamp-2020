<?php 
    session_start();
    include 'autoload.php';

    $errors = [];

    if(isset($_POST['register_btn'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $user = new Auth($username, $password, $role);

        $reg_user_id = $user->register();

        if($reg_user_id > 0) {
            $users = new Users();
            $_user = $users->get($reg_user_id);
            
            $_SESSION['username'] = $_user['username'];
            $_SESSION['is_logged_in'] = true;
            $_SESSION['is_admin'] = $_user['is_admin'];

            if($_user['is_admin'] == 0)
                header("Location: profile.php");
            else
                header("Location: admin-panel.php");
        } else {
            $errors[] = "Please enter valid username(email) and password (8 or more chars)!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | e-commerce</title>
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
                <button type="submit" name="register_btn" class="btn btn-primary">Register</button>
                    <a href="login.php" class="btn btn-sm btn-link">Login</a>
                </form>
            </div>
        </div>
    </div>

</body>
</html>