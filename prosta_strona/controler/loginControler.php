<?php

class loginControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
