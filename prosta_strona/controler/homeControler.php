<?php

class homeControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
