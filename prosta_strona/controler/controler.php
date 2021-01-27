<?php

class Controler
{
    public function loadView($name, $path = 'view/')
    {
        $name = $name . "View";
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
}
