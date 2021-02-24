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
        if (isset($_SESSION['token'])) {
            $date = new DateTime(date("Y-m-d H:i:s"));
            $dateToken = new DateTime(date($auth->getDateToken($_SESSION['idu'])));
            $interval = abs($date->getTimestamp() - $dateToken->getTimestamp()) / 60;
            if (($auth->getToken($_SESSION['idu']) === $_SESSION['token']) && ($interval < 5)) {
                $auth->setLogin($_SESSION['email']);
                $auth->updateToken($_SESSION['idu']);
                return true;
            } else {
                $auth->deleteToken($_SESSION['idu']);
                return false;
            }
        } else {
            return false;
        }
    }
}
