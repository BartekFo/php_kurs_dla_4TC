<?php

$a = 2;
echo $a." ";
$a++;
$c = true;
while($a < 100000){
    $b = false;
    for($i = 3; $i <= ceil(sqrt($a)); $i+=2){
        if($a % $i == 0){
            $b = true;
            break;
        }
        
    }
    if($b == false){
        if($c == false){
        echo $a." ";
        $c = true;
        } else {
            echo '<p style="border-radius:16px; background-color: black; color:white; display:inline-block; min-width:55px; height:15px; text-align:center;">'.$a.'</p>';
            $c =false;
        }
    }
    $a+=2;

}







?>