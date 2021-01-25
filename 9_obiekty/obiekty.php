<?php

class mojaKlasa {
    public $pole;
}

$obj = new mojaKlasa();
$obj->pole=12;
// echo $obj->pole;


class osoba {
    protected $imie;
    private $nazwisko;
    public static $ile_osob;
    public function __construct($imie, $nazwisko)
    {
        $this->_imie = $imie;
        $this->_nazwisko = $nazwisko;
        self::$ile_osob++;
    }
    public function ustawImie($imie){
        $this->imie = $imie;
        echo "klasa osoba";
    }
    public function __destruct()
    {
        // echo "<br>";
        self::$ile_osob--;
        // print("obiekt został usunięty");
    }
};

$obj1 = new osoba("jacek","kowalski");
unset($obj1);
$obj2 = new osoba("Ala","Michalska");

echo '<br>';
echo osoba::$ile_osob;
echo '<br>';

class postac extends osoba{
    public function __construct($imie)
    {
        $this->imie = $imie;
    }
    public static $rodzaj;

    public function ustawImie($imie){
        // $this->imie = $imie;
        parent::ustawImie($imie);
        echo "<br>";
        echo "klasa postac";
        echo "<br>";
    }

    public static function ustawRodaj($name)
    {
        self::$rodzaj = $name;
    }
}

class pozytywna extends postac {
    public static $rodzaj;
    public function __construct($name)
    {
        parent::__construct($name);
    }
    public static function ustawRodzaj($rodzaj){
        self::$rodzaj = $rodzaj;
    }
}

$shrek = new postac("Sherk");
postac::ustawRodaj("Postać z kreskówki");
$shrek->ustawImie("fiona");

$mike = new pozytywna("Mike");

pozytywna::ustawRodzaj("Postać negatywna");


echo pozytywna::$rodzaj;
echo '<br>';
echo postac::$rodzaj;