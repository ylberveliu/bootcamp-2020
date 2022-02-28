<?php 

echo "WHILE: <br />";
$i = 1000000;
while($i <= 10000) {
    echo $i .", ";
    $i+=100;
}

echo "<hr />";

echo "DO-WHILE: <br />";
$i = 1000000;
do {
    echo $i .", ";
    $i+=100;
}while($i <= 10000);

// do-while
/*
fillimi
do{
    ...
    hapat e iterimit
}while(kushti);
*/