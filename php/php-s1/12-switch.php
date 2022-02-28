<?php 

$dita = "E shtunesaas";

switch($dita) {
    case "E hene":
        echo "Sot eshte dite e hene <br />";
        echo "Sa dite e merzitshme";
        $x = 10 + 20;
        echo $x;
    break;
    case "E marte":
        echo "Sot eshte dite e marte <br />";
    break;
    case "E merkure":
        echo "Sot eshte dite e merkure <br />";
    break;
    case "E enjte":
        echo "Sot eshte dite e enjete <br />";
    break;
    case "E premte":
        echo "Sot eshte dite e premte <br />";
    break;
    default:
        if ($dita == "E shtune" || $dita == "E diele")
            echo "Wooow sot eshte uikend";
        else 
            echo "Diten qe keni shkruar nuk eshte valide!";
    break;
}

// switch(shprehja)
//     case 1 

//     case 2

//     ...

//     case 100

//     default             Nese shprehja nuk eshte njera nga case-at (1..N)
//        ...