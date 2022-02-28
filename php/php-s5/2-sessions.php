<?php 
# INFO: ruhen ne anen e servuesit
session_start();


# set session
$_SESSION['email'] = "ylber.veliu@yahoo.com";
$_SESSION['is_logged_in'] = True;

session_destroy();

# get session (item)
echo $_SESSION['email'];

# delete session item
unset($_SESSION['is_logged_in']);


if(count($_SESSION) == 0) {
    echo "Session is empty!";
} else {
    echo "<pre>";
    print_r($_SESSION);
}



