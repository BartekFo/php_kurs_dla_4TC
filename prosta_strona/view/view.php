<?php
class view
{
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

    public function redirect($url)
    {
        header('Location: ' . $url);
    }

    public function isLogged($auth)
    {
        session_start();
        if (isset($_SESSION['login'])) {
            $auth->setLogin($_SESSION['login']);
            $auth->setPassword($_SESSION['pwd']);
            return true;
        } else {
            return false;
        }
    }
}
