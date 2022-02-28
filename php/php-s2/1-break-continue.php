<?php 

// for($i = 0; $i <= 10; $i++) {
//     echo $i . " ";
// }

// break
for($i = 0; $i <= 10; $i++) {
    echo $i . " ";
    if ($i == 5) 
        break;
}

echo "<hr />";

// continue
for($i = 0; $i <= 10; $i++) {
    if ($i == 5) 
        continue;
    echo $i . " ";
}