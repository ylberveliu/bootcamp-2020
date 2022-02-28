<?php 

declare(strict_types=1);

interface Player {
    public function draw();
}

class Mario implements Character {

}

class Luigi implements Character {

}

class Level1 {
    public function earnsNewLive(Player $m) {

    }
}

(new Level1)->earnsNewLive(new Luigi());

$l1 = new Level1;
$luigi = new Luigi();

$l1->earnsNewLive($luigi);


// Mario

// interface IUBTStudent {
//     public function hasID() : bool;
// }

// interface IABBStudent {
//     public function hasBadge() : bool;
// }

// /// M.A
// class UBTStudent implements IUBTStudent {
//     public function hasID() : bool {
//         return true;
//     }
// }

// // class AABStudent implements IABBStudent {
// //     public function hasID() : bool {
// //         return true;
// //     }
// // }

// class SpecialStudent implements IUBTStudent, IABBStudent {
//     public function hasID() : bool {
//         return true;
//     }

//     public function hasBadge() : bool {
//         return false;
//     }
// }