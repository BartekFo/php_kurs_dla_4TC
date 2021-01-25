<?php

interface interA{
    public function run();
    public function stop();
}

abstract class pojazd implements interA {
    protected $nazwa;
    protected $pojemnosc;
    public function run(){
        echo "Pojazd $this->nazwa został uruchomiony";
    }
    public function stop(){
        echo "Pojazd $this->nazwa został zatrzymany";
    }
}

class osobowe extends pojazd {
    public function run(){
        parent::run();
        echo "Pojazd osobowy uruchomiono!";
    }
}

class ciezarowe extends pojazd {
    public function run(){
        parent::run();
        echo "Pojazd ciezarowy został uruchomiony";
    }
}

$maluch = new osobowe();
$star = new ciezarowe();

$maluch->run();
echo "<br>";
$star->run();