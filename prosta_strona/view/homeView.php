<?php
class homeView extends view
{
    public function __construct()
    {
        $art = $this->loadModel("home");
        $this->set("artData", $art->homeData());
        $this->render("home");
    }
}
