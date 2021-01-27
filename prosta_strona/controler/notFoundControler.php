<?php

class notFoundControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
