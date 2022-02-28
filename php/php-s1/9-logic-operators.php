<?php

$t = True;  // 1
$f = False; // 0

printf("and %d <br />", ($t and $f));   // 0
printf("&& %d <br />", ($t && $f));     // 0
printf("or %d <br />", ($t or $f));     // 1
printf("|| %d <br />", ($t || $f));     // 1
printf("!t %d <br />", (!$t));     // 0
//printf("$t Xor $f %d <br />", ($t Xor $f));     // 0

/*

AND
p q p&&q
0 0 0
0 1 0
1 0 0
1 1 1

OR
p q p||q
0 0 0
0 1 1
1 0 1
1 1 1

OR
p q pXorq
0 0 0
0 1 1
1 0 1
1 1 0
*/