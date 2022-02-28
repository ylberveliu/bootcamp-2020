<?php 
// $student = [
//     "name" => "And",
//     "surname" => "Zekaj",
//     "index" => 562021,
//     "grades" => "Ne jemi notat",#[8, 7, 10, 9, 8], # 8,7,10,9,8
//     "av_grade" => 8.89,
//     // /*12 =>*/ 300,
//     // 400,
//     // 500
// ];

// if(array_key_exists("grades", $student)) {
//     if(is_array($student['grades']))
//         print_r($student['grades']);
//     else
//         echo "-> " . $student['grades'];
// }

$grades = [0,8,9,7,16,8,10,9];

// echo min($grades);
// echo "<hr />";
// echo max($grades);

// $f_g = array_merge($grades, [9,10, 8]);


// echo "<pre>";
// print_r($f_g);

// f(x, f(y))


// filter   array_filter($arr, callback)
$fg = array_filter($grades, function($grade) {
    return $grade > 8;
});

// print_r($fg);

// map      array_map(callback, $arr)   
$ma = array_map(function($g) {
    return $g > 8;
}, $grades);

print_r($ma);

// print_r($ma);

// reduce   array_reduce($arr, callback)
// $total = array_reduce($grades, function($p, $n) {
//     return $p + $n;
// });


// echo $total / count($grades);