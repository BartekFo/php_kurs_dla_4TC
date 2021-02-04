<?php

class loginView extends view
{
    public function __construct()
    {
        $auth = $this->loadModel("login");
        $this->set("error", "");
        $this->set("isLogin", false);
        if ($this->isLogged($auth)) {
            $this->set("error", $auth->login);
            $this->set("isLogin", true);
            $this->redirect('orders');
        } else {
            if (isset($_POST['submit'])) {
                if ($auth->checkLogin()) {
                    $this->set("isLogin", true);
                    $this->redirect('orders');
                } else {
                    $this->set('isLogin', false);
                    $this->set("error", 'Niepoprawny login lub hasło');
                }
            }
        }
        $this->render("login");
    }
}
