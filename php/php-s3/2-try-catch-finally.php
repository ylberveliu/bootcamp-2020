<?php 

class DevideByZeroException extends Exception {
    public function __toString() {
        return "Error: " .$this->message ." - " .$this->file;
    }
} 

function print_positive_number($number) {
    if ($number < 0)
        throw new Exception("Numri eshte negativ!");
    
    return $number;
}

function devide($x, $y) {
    if ($y == 0) 
        throw new DevideByZeroException("Parametri i dyte nuk guxon te jete zero!");
    return $x / $y;
}

try {
    // echo print_positive_number(-50);
    echo devide(10, 0);
} 
catch(DevideByZeroException $e) {
    echo $e;
}
catch(Exception $e) {
    echo "Gabim: " .$e->getMessage() ." throwed at line: " .$e->getLine();
} 
finally {
    echo "<br />" ."Finally";
}