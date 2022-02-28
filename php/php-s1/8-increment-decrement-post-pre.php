<?php 

$x = 500;

/*

++$x;       rritet x per 1 dhe mandej kthehet
$x++;       kthehet x mandej rritet per 1
--$x;       zvogelohet x per 1 dhe mandej kthehet
$x--;       kthehet x mandej zvogelohet per 1
*/

// 500
echo $x++; //   500             v501
echo "<br />";
// 501
echo $x++; //   501             v502
echo "<br />";
// 502
echo ++$x; //   503

echo "<br /><br /> <hr /> <br /><br />";

// 503
echo $x--; //   503             v502
echo "<br />";
// 502
echo $x--; //   502               v501 
echo "<br />";
// 501
echo --$x; // 500