<?php

// $password = "12345678";

// echo "md5: " . md5($password) ."<br />";
// echo "sha1: " . sha1($password) ."<br />";
// echo "password_hash: " . password_hash($password, PASSWORD_BCRYPT) ."<br />";

// $str = "5435234256 Note that an exception's properties are populated when the exception is *created*, not when it is thrown. 42524323432  Throwing the exception does not seem to modify them. 432 4324324";

// echo "Suggested password: ";
// $shuffled_str = str_shuffle($str);
// echo substr($shuffled_str, 0, 15);

// $sentence = "       Une jam     Agroni dhe lauj shume mire basketboll      ";

// echo strlen($sentence) ."<br />";
// echo strlen(ltrim($sentence)) ."<br />";
// echo strlen(rtrim($sentence)) ."<br />";
// echo strlen(trim($sentence)) ."<br />";


// $name = "ylber";

// $sentence = "NotE that an exception's properties are populated noTe when the exception is *created*, not when it is thrown.  Throwing the exception does not seem to modify them.";
// $find = strtolower("NoTe");
// $counter = 0;

// foreach(explode(" ", $sentence) as $word) {
//     if(strtolower($word) == $find) {
//         $counter++;
//     }
// }

// echo $find ." u gjete gjithsej " .$counter ." here.";


// $fullname = "Ylber Veliu";

// echo ucfirst($name);
// echo ucwords($fullname);
// echo strtoupper($fullname);
// echo strtolower($fullname);

// $shopping_cart_items = [
//     "Milk 1l",
//     "Milka Chocolate",
//     "ABC",
//     "BCD"
// ];

// // $products = "";
// // foreach($shopping_cart_items as $product) {
// //     $products .= $product .", ";
// // }

// $products = implode(", ", $shopping_cart_items) . ", buke 500gr";
// echo $products;

// echo "<pre>";
// print_r(explode(", ", $products));



// $name = "xnxnx";

// function is_palindrome($string) {
//     if ($string !== strrev($string)) 
//         return false;

//     return true;
// }

// if(is_palindrome($name))
//     echo "\"$name\" eshte palindrom.";
// else 
//     echo "\"$name\" nuk eshte palindrom!";

// echo strrev($name);

// $cards = [
//     "4355 6554 1236 2346",
//     "1358 4234 1236 4355",
//     "8325 6554 1236 4234"
// ];

// function hide_data_from_cards($cards) {
//     foreach($cards as $card) {
//         // $end = strlen($card) - 4;
//         $start = 4;
//         $end = strlen($card) - 1;
//         $replace = " xxxx xxxx xxxx";

//         echo substr_replace($card, $replace, $start, $end) ."<br />";
//     }
// }

// hide_data_from_cards($cards);

// xxxx xxxx xxxx 2346



// $emails = [
//     "ylber.veliu@yahoo.com",
//     "john.smith@gmail.com",
//     "tea@test.com",
//     "info@microsoft.com"
// ];

// function email_to_username($emails) {
//     foreach($emails as $email) {
//         //$start = 0;
//         //$end = strpos($email, '@');
//         $start = strpos($email, '@') + 1;
//         $end = strlen($email) - 1;
//         echo substr($email, $start, $end) ."<br />";
//     }
// }

// email_to_username($emails);

// printf("%d", strpos($email, '!'));
// return false - nese nuk e gjene substringun
// return pozicionin ku e ka gjete substringun 

// if( strpos($email, '@') !== false ) {
//     echo "Emaili eshte valid.";
// } else {
//     echo "Emaili nuk eshte valid!";
// }
 
// $sentence = "Uen jam
// agroni
// dhe luaj shume mire
// futboll";

// $name = "Agroni";

// $sentence = <<<'EOS'
//     Une jam $name
//     luaj shume mire
//     futboll
// EOS;

// echo $sentence;

// $name = "Artan";
// $x = 10;

// echo "Une jam " .($x + 5) ."<br />";
// echo 'Une jam $name <br />';

