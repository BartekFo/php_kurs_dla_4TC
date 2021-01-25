<?php
$panstwa = array(
    "PL" => "Polska",
    "DE" => "Niemcy",
    "F" => "Francja",
    "GB" => "Wielka Brytania",
    "US" => "Stany Zjednoczone",
    "ESP" => "Hiszpania",
    "RUS" => "Rosja",
    "I" => "Włochy"
);//tablica asocjacyjna




echo "<h1>Funkcje sortujące</h1>";
foreach($panstwa as $klucz => $wartosc){
    echo "$klucz - $wartosc"."<br>"; 
}

//sortowanie według wartości;
asort($panstwa);
echo "Tablica po sortowaniu <br>";
foreach($panstwa as $klucz => $wartosc){
    echo "$klucz - $wartosc"."<br>"; 
}

arsort($panstwa);
echo "Tablica po sortowaniu 2 <br>";
foreach($panstwa as $klucz => $wartosc){
    echo "$klucz - $wartosc"."<br>"; 
}

ksort($panstwa);
echo "Tablica po sortowaniu 3 <br>";
foreach($panstwa as $klucz => $wartosc){
    echo "$klucz - $wartosc"."<br>"; 
}
krsort($panstwa);
echo "Tablica po sortowaniu 4 <br>";
foreach($panstwa as $klucz => $wartosc){
    echo "$klucz - $wartosc"."<br>"; 
}


$owoce = array("mango", "kiwi", "jabłko", "cytryna", "wiśnia", "gruszka");

print_r($owoce);
echo "<br>";

sort($owoce);
print_r($owoce);
echo "<br>";
rsort($owoce);
print_r($owoce);
echo "<br>";

//tablice i ciągi znaków
//print_r($_SERVER);
$daneServera = implode(";", $_SERVER);
echo $daneServera;
//funkcja implode tworzy stringa na podstawie danych z tablicy
$dane = "12/10/2025;15:30:15;edge;88.10.100.120";
$tablica = explode(";", $dane);
print_r($tablica);


?>