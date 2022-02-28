<?php

/*
    Scalar types:
    1. boolean
    2. number - integer             100
    3. floating point numbers       3.1415
    4. strings
*/

$switch = True; //True;         True - 1    False - 0
$x = 10;
$pi = 3.1415;
$name = "Ylber";

// variable->variable 
$a = "abc";
// $$a  -> $abc
$$a = "b";

//echo $abc; // b

$bank_name = "procredit";
$$bank_name = "Pro Credit Bank 2020"; // $procredit

echo $procredit;

echo "<br /><br /> <hr /> <br /><br />";


$amount = 1_250_000;

echo "$amount euro";


// printf("\$switch = %d <br />", $switch);
// echo "\$x = $x <br />";
// echo "\$pi = $pi <br />";
// echo "\$name = $name <br />";