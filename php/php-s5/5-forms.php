<?php 

// $_GET['email'] $_GET['password']
// $_POST['email'] $_POST['password']

// if(isset($_GET['email']) && isset($_GET['password']) ) {
//     echo "Email: " .$_GET['email'] ." <br /> Password: " .$_GET['password'];
// }

// if(isset($_POST['email']) && isset($_POST['password']) ) {
//     echo "Email: " .$_POST['email'] ." <br /> Password: " .$_POST['password'];
// }

if(isset($_REQUEST['email']) && isset($_REQUEST['password']) ) {
    echo "Email: " .$_REQUEST['email'] ." <br /> Password: " .$_REQUEST['password'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms - PHP</title>
</head>
<body>
    <form method="get" action="">
        <input type="text" name="email" placeholder="Enter your email" />
        <input type="text" name="password" placeholder="Enter your password" />
        <button type="submit">Send</button>
    </form>
</body>
</html>