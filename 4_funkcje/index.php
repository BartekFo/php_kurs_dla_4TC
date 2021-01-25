<?php
function wartoscBezwzgledna($liczba)
{
    if($liczba < 0){
        $liczba = -$liczba;
    }
    return $liczba;
}

echo wartoscBezwzgledna(-20);
echo "<br>";

function fun1(&$a)
{
    $a++;
    echo $a;
    echo "<br>";
    return $a;
}

$a = 12;
echo $a;
echo "<br>";
fun1($a);


echo $a;
echo "<br>";

//rekurencja 
// silnia 
// n! = (n-1)!*n
// warunek zakończenia 0! = 1 


function silnia($n){
    if($n == 0){
        return 1;
    } else {
        return silnia($n - 1)*$n;
    }
}

echo silnia(8);




?>