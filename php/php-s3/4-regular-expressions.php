<?php 

$sentece = "If specified,  1879 rest of the string being placed 1900,  If in the last substring.";

//echo preg_match('/[0-9]{4}/', $sentece); // 1 (gjindet stringu) - 0 (nuk gjindet stringu)
// echo preg_match_all('/[0-9]{5}/', $sentece);

// echo preg_match('/[0-9]{4}/', $sentece);

$result = preg_split('/\,\s{1}/', $sentece);

echo "<pre>";
print_r($result);

// $pattern = '/[0-9]{4}/i';
// $pattern = "/placed/";
// $replace = "PLACED";
// echo preg_replace($pattern, $replace, $sentece);

// preg_match 
// preg_match_all 
// preg_split 
// preg_replace