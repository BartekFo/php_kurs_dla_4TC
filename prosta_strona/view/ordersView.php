<?php

class ordersView extends view
{
    public function __construct()
    {
        $auth = $this->loadModel('login');
        if ($this->isLogged($auth)) {
            $this->render('orders');
        } else {
            $this->redirect('login');
        }
    }
}
