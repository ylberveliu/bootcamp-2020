<?php

$numbers = [1, 2, 3, 4, 5];
//          0  1  2  3  4

// echo $numbers[3];

// assco. array

$student = [
    "name" => "And",
    "surname" => "Zekaj",
    "index" => 562021,
    "grades" => [8, 7, 10, 9, 8], # 8,7,10,9,8
    "av_grade" => 8.89,
    // /*12 =>*/ 300,
    // 400,
    // 500
];

foreach($student as $key => $value) {

    echo $key ." : ";
    if(is_array($value)) {
        // join(del, array)
        echo join(", ", $value) ."<br />";
        // foreach($value as $v) {
        //     echo $v .", ";
        // } 
        // echo "<br />";
    } else 
        echo $value ." <br />";
}



// echo $student['index'] ." old <br />";

// $student['index'] = 602122;

// echo $student['index'] ." new <br />";

// echo "<pre>";
// print_r($student['grades']);

// $student['grades'] = [9, 10, 8,7];

// print_r($student['grades']);

// echo $student['index']; # 562021
// $grades = $student['grades'];
// echo "<br />" . count($grades);