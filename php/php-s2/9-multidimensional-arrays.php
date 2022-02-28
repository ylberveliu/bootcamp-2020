<?php 

$n = 3;

$mat = [
    [10,22,1],
    [46,54,96],
    [2,86,11]
];

/*  Indekset e matrices:

    00 01 02
    10 11 12
    20 21 22

    (r+k) == n-1
*/

foreach($mat as $key => $arr) {
    foreach($arr as $item) {
        echo $item ." ";
    }
    echo "<br />";
}

// $sum = 0;
// for($r = 0; $r < $n; $r++) {
//     for($k = 0; $k < $n; $k++) {
//         //if($r == $k)
//         if( ($r+$k) == ($n-1) )
//             $sum += $mat[$r][$k];
//         //echo $mat[$r][$k] ." ";
//     }
//     echo "<br />";
// }

// echo $sum;

// Shkrimi i indeksave te matrices
// for($r = 0; $r < $n; $r++) {
//     for($k = 0; $k < $n; $k++) {
//         echo "(" .$r . ", " . $k .")   ";
//     }
//     echo "<br />";
// }

