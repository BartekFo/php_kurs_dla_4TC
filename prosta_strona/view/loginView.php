<?php
include_once "view/homeView.php";

class loginView extends homeView
{
    public function __construct()
    {
        $auth = $this->loadModel("login");
        $this->set("error", "");
        if (isset($_POST['submit'])) {
            $auth->setLogin($_POST['email']);
            $auth->setPassword($_POST['pwd']);

            if ($auth->checkLogin("bartek@gmail.com", "bartek")) {
                $this->set("error", "Udało się zalogować");
                session_start();
                $_SESSION['login'] = $auth->login;
                $_SESSION['pwd'] = $auth->password;
            } else {
                $this->set("error", "Niepoprawny login lub hasło");
            }
        }
        $this->render("login");
    }
}
