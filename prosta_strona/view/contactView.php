<?php
include_once "view/homeView.php";

class contactView extends homeView
{
    public function __construct()
    {
        $this->render("contact");
    }
}
