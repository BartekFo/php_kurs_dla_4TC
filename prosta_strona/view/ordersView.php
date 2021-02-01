<?php
include_once "view/homeView.php";

class ordersView extends homeView
{
    public function __construct()
    {
        session_start();
        $auth = $this->loadModel('login');
        if (isset($_SESSION['email'])) {
            $auth->setLogin($_SESSION['email']);
            $auth->setPassword($_SESSION['pwd']);
            if ($auth->checkLogin("bartek@gmail.com", "bartek")) {
                $this->render("orders");
            } else {
                $this->render("login");
            }
        }
        $this->render("login");
    }
}
