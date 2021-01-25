<?php
    //Zmienne:

    $a = 12;
    echo gettype($a);
    echo "<br>";
    $a = 12.3;
    echo gettype($a);
    echo "<br>";
    $c = 12;
    $a = "Rozbujnik $c";
    echo gettype($a);
    echo "<br>";
    echo $a;
    echo "<br>";
    $b = 'Rozbujnik $c';
    echo $b;

    $b = "Ala ma\"Kota\", no i co z tego";
    echo "<br>";
    echo $b;
    //Operatory: +, - , *, /, %, ++,--,+=,-=,*=,/=,&, |, ^, `,>>,<<,&&, ||, !,==,===,!=, <,>,.
    echo "To jest świat php".$b;
    //Zmienne predefiniowane:
    print_r($_SERVER);
    print_r($_GET);
    echo "<a href=\"index2.php?zmienna1=123&zmienna2=Kalafonia\">Kliknij mnie</a>";
    print_r($_POST);
    print_r($_COOKIE);
    print_r($_FILES);
    print_r($_REQUEST);
    print_r($_SESSION);

    echo $_SERVER['PHP_SELF'];
    //stałe superglobalne
    echo __FILE__;
    echo PHP_VERSION;
    echo PHP_OS;
    //Definiowanie stałych 
    define("MOJA_STALA", "MOJA_WARTOSC");
    echo MOJA_STALA;
    


?>