<?php
include_once 'view/mainView.php';
class mainControler
{
    public function loadView($name, $path = 'view/')
    {
        if (($name === '') || ($name === '/')) {
            $name = 'main';
        }
        $name = $name . "View";
        $path = $path . $name . '.php';
        //view/mainView.php
        //name - nazwa klasy
        if (is_file($path)) {
            $obj = new $name();
            return $obj;
        } else {
            echo 'wrong path';
            echo '<br>';
            echo $path;
        }
    }
}
