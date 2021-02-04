<?php

class logoutControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
