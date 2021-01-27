<?php

class homeView
{
    public function __construct()
    {
        $art = $this->loadModel("home");
        $this->set("artData", $art->homeData());
        $this->render("home");
    }

    public function render($name, $path = "templates/")
    {
        $path = $path . $name . ".html";
        if (is_file($path)) {
            require $path;
        }
    }

    public function loadModel($name, $path = 'model/')
    {
        $name = $name . "Model";
        $path = $path . $name . '.php';
        //view/mainView.php
        //name - nazwa klasy
        if (is_file($path)) {
            require $path;
            $obj = new $name();
            return $obj;
        } else {
            echo 'wrong path';
            echo '<br>';
            echo $path;
        }
    }

    public function set($name, $value)
    {
        $this->$name = $value;
    }

    public function get($name)
    {
        return $this->$name;
    }
}
