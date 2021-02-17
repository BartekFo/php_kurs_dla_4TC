<?php

class loginModel
{
    public function setLogin($value)
    {
        $this->email = $value;
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

    public function checkUser($login, $pwd)
    {
        $mysqli = $this->connectDb();
        $sql = "SELECT email, password FROM users WHERE email = ?";
        //? $hashedPassword = sha1($pwd);
        //* 'apple' => "dauidhaidaiuhiua";
        //* 'apple' + dadhaiudahiu => daihdbahjdbawdja;

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $login);
        $stmt->execute();
        $stmt->bind_result($email, $password);
        print($stmt->affected_rows);
        printf("%s (%s)\n", $email, $password);
        if ($stmt->affected_rows > 0) {
            $stmt->fetch();
            $isPasswordVerified = password_verify($pwd, $password);
            if ($isPasswordVerified) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        } else {
            $stmt->close();
            return false;
        }
    }

    public function checkLogin()
    {
        if ($this->checkUser($_POST['email'], $_POST['pwd'])) {
            $token = bin2hex(random_bytes(16));
            $this->setLogin($_POST['email']);
            $this->setSession($this->email, $token);
            if ($this->saveTokenToDb($token)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function setSession($email, $token)
    {
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
    }

    public function saveTokenToDb($token)
    {
        $mysqli = $this->connectDb();
        $sql = "SELECT idusers FROM users where email = '" . $_SESSION['email'] . "'";
        $result = $mysqli->query($sql) or die($mysqli->error);
        if ($result->fetch_assoc()) {
            $id = $result->fetch_assoc();
        } else {
            printf('błąd', $mysqli->error);
        }

        $date = new DateTime();
        $timeStamp = $date->getTimestamp();

        $sql = "INSERT INTO tokens VALUES (NULL, " . $id . ", " . $token . ", " . $timeStamp . ")";
        $result = $this->connectDb()->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        session_destroy();
    }
}
