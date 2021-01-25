<?php 
//Intrukcja sterująca if
$a = 8;

if($a % 2 == 0){
    echo "Liczba jest parzysta";
} else {
    echo "Liczba nie jest parzysta ";
}

//Instruckja switch
$a = 8;

switch($a){
    case 1: echo "Fajny dzień";
break;
    case 2: echo "Kiepski dzień";
break;
    case 3: echo "Bywało lepiej";
break;
default: echo "Różnie bywa";
}

//operator trójkowy (operator warunkowy) 

$s = ($a>5)?"Większe od 5":"Mniejsze od pięciu";

echo $s;


//pętle

for($i= 0; $i<10; $i++){
    echo $i.", ";
}
$i = 0;

while($i<10){
    echo $i.", ";
    $i++;
}

$i = 0;
do {
    echo $i.", ";
    $i++;
} while ($i<10);

$tab = array("imie" => "Jan", "nazwisko" => "kowalski", "email" => "jan.kowalski@gmail.com");

foreach($tab as $klucz => $wartosc){
    echo $klucz.": ".$wartosc." ";
}
reset($tab);
while(list($klucz, $wartosc) = each($tab)){
    echo $klucz.": ".$wartosc." ";
}

?>