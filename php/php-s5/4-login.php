<?php 

session_start();
$_SESSION['email'] = "ylber.veliu@yahoo.com";
$_SESSION['user_id'] = 1456;

setcookie("email", $_SESSION['email'], time()+60);
setcookie("user_id", $_SESSION['user_id'], time()+60);

echo "Success";
echo "<a href='4-homepage.php'>go to omepage</a>";