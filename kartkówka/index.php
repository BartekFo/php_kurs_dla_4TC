<?php

class Pojazd
{
    protected $pojemnoscSilnika;
    protected $liczbaOsi;
    protected $silnikUruchomiony = 0;

    protected function wlaczSilnik()
    {
        if ($this->silnikUruchomiony === 0) {
            $this->silnikUruchomiony = 1;
        } else {
            echo "Silnik już pracuje";
        }
    }

    protected function wylaczSilnik()
    {
        if ($this->silnikUruchomiony === 1) {
            $this->silnikUruchomiony = 0;
        } else {
            echo "Silnik już jest wyłączony";
        }
    }
}


class Ciezarowe extends Pojazd
{
    private $ladownosc;

    public function wlaczSilnik()
    {
        parent::wlaczSilnik();
        echo "silnik właczony";
    }

    public function wylaczSilnik()
    {
        parent::wylaczSilnik();
        echo "Silnik wyłaczony";
    }

    public function ustawLadownosc($podanaLadownosc)
    {
        $this->ladownosc = $podanaLadownosc;
        echo $this->ladownosc;
    }
}

$obj = new Ciezarowe();

$obj->wlaczSilnik();
$obj->wlaczSilnik();
$obj->wylaczSilnik();
// $obj->ustawLadownosc(2000);
