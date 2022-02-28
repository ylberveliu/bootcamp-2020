<?php 

$x = 10; // lokacionin ne memorje

function increment(&$n) {
    return $n++;
}

increment($x);

echo $x;    # 11


// $mn = "V.";

// $fullname = function($name, $surname) use ($mn) {
//     echo $name ." " .$mn ." " .$surname;
// };

// $fullname("Ylber", "Veliu"); # Ylber V. Veliu

// f(x, f(y)); # callback -> array functions

// $fullname = function($name, $surname) {
//     echo $name ." " .$surname;
// };

// $fullname("Ylber", "Zekaj");

// var = function(...) {

// }

// function x() {
//     echo "I am x";
// }

// x();