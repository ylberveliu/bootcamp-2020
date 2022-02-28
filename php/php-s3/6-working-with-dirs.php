<style>
    .dir {
        color: red;
    }
</style>
<?php
$dir_name = "test";
$excluded_dir = [".", ".."];


// echo "<pre>";
// print_r(scandir("."));[".", ".."]

function list_content($dir) {
    global $excluded_dir;

    if(is_dir($dir)) {
        if($d = scandir($dir)) {
            // print_r($d);
            foreach($d as $item) {
                if(in_array($item, $excluded_dir)) 
                    continue;
                
                if(is_dir($item))
                   list_content($item);
                
                echo "<a href=\"".$item."\">" .$item ."</a><br />";
            }
        }
    }
}

list_content(".");


// echo getcwd() ."<br />";
// chdir("../../../../");
// echo getcwd();


// if(!file_exists($dir_name)) {
//     rmdir($dir_name);
//     mkdir($dir_name);
//     echo $dir_name ." was created successfully.";
// } 

// else {
//     echo $dir_name ." already exists!";
// }