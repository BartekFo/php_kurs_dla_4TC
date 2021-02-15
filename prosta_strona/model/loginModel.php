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

    public function connectDb()
    {
        $host = 'localhost';
        $user = 'root';
        $pwd = '';
        $dbName = "prostastronadb";

        $mysqli = new mysqli($host, $user, $pwd, $dbName);

        if (mysqli_connect_errno()) {
            printf('Błąd połączenia z bazą ', mysqli_connect_error());
        } else {
            return $mysqli;
        }
    }

    public function getUser($login, $pwd)
    {
        $mysqli = $this->connectDb();
        $sql = "SELECT email, password FROM users WHERE email=? AND password =?";
        //? $hashedPassword = sha1($pwd);
        // * opcja z użyciem bcryptu i z przepuszczenie hasła 11 razy przez ziarno
        $options = [
            'cost' => 11
        ];
        $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT, $options);
        // *----------------------------------------------------------------
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $login, $hashedPassword);
        $stmt->execute();
        if ($stmt->affected_rows == 0) {
        }

        $stmt->close();
    }

    public function checkLogin()
    {
        if (($_POST['email'] == 'bartek@gmail.com') && ($_POST['pwd']) == 'bartek') {
            $this->setLogin($_POST['email']);
            $this->setPassword($_POST['pwd']);
            $this->setSession($this->login, $this->password);
            return true;
        } else {
            return false;
        }
    }

    public function setSession($login, $password)
    {
        $_SESSION['login'] = $login;
        $_SESSION['pwd'] = $password;
    }

    public function logout()
    {
        session_destroy();
    }
}
