<?php

class loginModel
{
    public function setLogin($value)
    {
        $this->login = $value;
    }

    public function setPassword($value)
    {
        $this->password = $value;
    }

    public function checkLogin($login, $password)
    {
        if (($login == $this->login) && ($password == $this->password)) {
            return true;
        } else {
            return false;
        }
    }
}
