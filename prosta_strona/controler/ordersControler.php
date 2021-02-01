<?php

class ordersControler extends Controler
{
    public function __construct($request)
    {
        $this->loadView($request);
    }
}
