<?php
//skrypt wyswietlajacy słowa o długosci 41 znaków. Symetryczne względem 21 znaku. 100 słów
//symetryczne słowo: acgca

$alfabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q",
"R", "S", "T", "U", "V", "W", "X","Y", "Z");


$slowo = array();

for($i = 0; $i <100; $i++){
    for($j = 0; $j < 21; $j++){
        $slowo[$j] = $alfabet[rand(0 , 25)];
        // echo $slowo[$j];
    }
    $a = 19;
    for($j = 21; $j <=40; $j++){
        $slowo[$j] = $slowo[$a];
        $a--;
    }
    for($j = 0; $j <=40; $j++ ){
        if($j == 20){
            echo "<span style=\"font-size: 2rem; font-weight: 700;\">$slowo[$j]</span>";
        } else {
            echo $slowo[$j];
        }

        
        
        
    }
    echo "<br>";
}



?>