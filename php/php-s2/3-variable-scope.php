<?php 

$g = 10;
$m = "Male";

$x = null;

function change_x() {
    global $x;
    $x = 20;

    echo $x;
}

echo "-> " . $x ."<br />";


echo "funksioni:  <br />";
change_x();


// function print_val() {
//     $loc = 20;

//     echo $loc;

//     // echo $loc ." hey";
// }

// echo $loc; # error / gabim

// print_val();


// function print_value() {
//     // echo $g; # gabim

//     // variables superglobale $GLOBALS 
//     //echo $GLOBALS['g'];

//     // keyword: global
//     global $g;

//     echo "g: " . $g;
// }

// print_value();
// echo $g;