<?php

// declare(strict_types = 1);

// class Human {

// }

// class Student {

// }

// class MScStudent extends Human, Student {

// }


// include 'Settings.php';


// $settings = new Settings;

// $settings->volume = 9;
// $settings->background = "me.jpg";

// echo $settings->volume ." " .$settings->background;

// $settings->setData(["volume" => 9, "background" => "me.jpg"]);
// print_r($settings->getData());


/*
    private     - class
    protected   - class, child classes
    public      - class, child classes, outside
*/

// class DB {
//     protected $connection;

//     public function __construct() {
//         $this->connection = new Mysql();
//     }

//     public function __destruct() {
//         close($this->connection);
//     }
// }

class Student {
    protected $name, $index, $must_finish_in;

    public function __construct($name, $index, $must_finish_in) {
        $this->name = $name;
        $this->index = $index;
        $this->must_finish_in = $must_finish_in;
    }

    public function __toString() {
        return "Emri: " .$this->name . " " . $this->index .", duhet perfunduar: " .$this->must_finish_in ." ";
    }

    public final function getName() {
        echo "Emri: " .$this->name;
    }

    public function getStaticMethod() {
        echo "I am method";
    }
}

Student::getStaticMethod();

// // $s = new Student("Genc", 562021, 2);
// // $s->getName();

// Student::getStaticMethod();


// class BScStudent extends Student {
//     private $b;

//     public function __constructor($name, $index, $must_finish_in, $b) {
//         // $this->name = $name;
//         // $this->index = $index;
//         // $this->must_finish_in = $must_finish_in;

//         parent:: __construct($name, $index, $must_finish_in);
//         $this->b = $b;
//     }

//     public function __toString() {
//         return parent::__toString() . " - b: " .$this->must_finish_in ."<br />";
//     }

//     // public function getName() {
//     //     echo "Emri i studentit: " .$this->name;
//     // }
// }

// $bsc_genci = new BScStudent("Genc", 562021, 2, "BOPTYQS432");
// // echo $bsc_genci;
// $bsc_genci->getName();

// class MScStudent extends Student {
//     private $m;
// }

// class PhdStudent extends Student {
//     private $mentor;
// }




// class Student {
//     private $name, $surname, $age;

//     public function __construct($name, $surname, $age = 18) {
//         $this->name = $name;
//         $this->surname = $surname;
//         $this->age = $age;
//     }

//     public function __toString() {
//         return "Emri: " .$this->name . " " . $this->surname .", vitet: " .$this->age ."<br />";
//     }

//     public function setName($name) : void{
//         $this->name = $name;
//     }

//     public function getName() : string {
//         return $this->name;
//     }
// }

// $me = new Student("Ylber", "Veliu", 30);
// $me->setName("Artan");
// echo $me->getName(); // error

// $genci = new Student("Genci", "...", 20);
// $sanzani = new Student("Zazan", "...");

// echo $genci;
// echo $sanzani;


class Rrethi {
    private $r; 
    public const PI = 3.14;

    // Konstruktori
    public function __construct($rrezja) {
        //echo "Une jam metoda konstruktor <br />";
        $this->r = $rrezja;
    }

    // Destruktori
    public function __destruct() {
        // echo "Une jam metoda destruktori <br />";
    }

    public function perimetri() {
        return (2*$this->r*self::PI); 
        // self::Constanta
    }
}

// $r1 = new Rrethi(15); 
// echo $r1->perimetri() ."<br />"; // 2x5x3.14 = ...

// $r2 = new Rrethi(115); 
// echo $r2->perimetri() ."<br />";

// $rrethi->r;
// echo "<br />";
// echo Rrethi::PI; //$rrethi->PI;
// Class::Constanta

// RRETHI

// define('PI', 3.14);
// $r = 10;

// // func
// per() {

// }

// syp() {

// }
