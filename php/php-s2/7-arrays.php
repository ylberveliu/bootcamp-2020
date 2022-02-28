<?php 

// indeksi i pare: 0
// indeksi i fundit: array_length - 1

// count(array) -> jep numrin e elementeve ne ate varg (array)

$numbers = ["a", 2, 3, 4, 5, True, 1, 2, 3, 4];
//          10    11  12  13  14  15     16  17  18  19 

// echo count($numbers);

// $number[index]

/*
    for
    while
    do-while
    foreach
 */

// 0 - 9
// for($i = 0; $i < count($numbers); $i++) {

//     echo $numbers[$i] . (($i < count($numbers) - 1) ? "," : "");

//     // if($i == (count($numbers) - 1))
//     //     echo $numbers[$i] .".";
//     // else 
//     //     echo $numbers[$i] .", ";
// }


// $i = 0;
// while($i < count($numbers)) {
//     echo $numbers[$i] . (($i < count($numbers) - 1) ? "," : "");

//     $i++;
// }


// $i = 0;
// do{
//     echo $numbers[$i] . (($i < count($numbers) - 1) ? "," : "");

//     $i++;
// }while($i < count($numbers));

// foreach($numbers as $val) {
//     echo $val ." - ";
// }

foreach($numbers as $key => $value) {
    echo $key . " : " .$value ."<br />"; // . (($k < count($numbers) - 1) ? " - " : "");
}


// echo $numbers[5];



// echo "Vlera fillestare: " .$numbers[3] ."<br />"; # 4
// $numbers[3] = 12;
// echo "Vlera pas ndryshimit: " .$numbers[3] ."<br />"; # 12


