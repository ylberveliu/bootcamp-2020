<?php 

// require 'Car.php';
// require 'Settings.php';

// abstract class A {
//     ... 
// } 

// abstract class B extends A {

// }

// class 


/*
    models/
    views/
    controller/
*/

function __autoload($class) {
    require "classes/$class.php";
}

$c = new Car;
$s = new Settings;

$s->volume = 10;

echo $s->volume;