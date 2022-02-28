<?php 

# ruhen ne browserin (pajisjen) e klientit
$expires = time() + 60; // 60 sec
# set cookie item
setcookie("logged_in_user", "ylber.veliu@yahoo.com", $expires);

// # read cookie item
// echo "My email addess is: " .$_COOKIE['logged_in_user'];

// # delete
// unset($_COOKIE['PHPSESSID']);



// echo "<pre>";
// print_r($_COOKIE);

/**
 Array(
     [logged_id_user] => "..."
 )
 */
