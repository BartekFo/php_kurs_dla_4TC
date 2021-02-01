<?php

class contactControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
