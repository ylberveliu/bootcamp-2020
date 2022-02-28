<?php 

$filename = "_index.html";

$fortuna = file_get_contents("test.txt");

if(file_put_contents($filename, $fortuna)) {
    echo $filename ." was updated";
}


// $mode = "r";
// $words = null;
// $counter = 0;

// try {
//     $fh = fopen($filename, $mode);

//     while(!feof($fh)) {
//         if($s = fgets($fh)) {
//             $words = preg_split('/\s+/', $s, -1, PREG_SPLIT_NO_EMPTY);
//         }
//     }

//     if(!is_null($words)) {
//         foreach($words as $w) {
//             if(strtolower($w) == 'an')
//                 $counter++;
//         }

//         echo "'an' total : " .$counter;
//     }
// }
// catch(Exception $e) {
//     echo $e->getMessage();
// }
// finally {
//     fclose($fh);
// }

// if(file_exists($filename) && !is_dir($filename)) {
//     unlink($filename);
//     echo "File: " .$filename ." was deleted";
// } else {
//     echo $filename ." is not a file!";
// }

// try {
//     $fh = fopen($filename, $mode);
    
//     if(fwrite($fh, "Test content LAST...")) {
//         echo "Content was update.";
//     }

//     // while(!feof($fh)) {
//     //     echo fgets($fh);
//     // }
//     // print_r($fh);
// } catch(Exception $e) {
//     echo $e->getMessage();
// }
// finally {
//     fclose($fh);
// }