<?php

class mainView
{
    public function __construct()
    {
        $path = __DIR__;

        require '../templates/home.html';
    }
    // public function render($name, $path = 'templates/')
    // {
    //     $path = $path . $name . '.html';
    // }
}
