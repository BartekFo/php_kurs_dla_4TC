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
            return null;
        } else {
            return $mysqli;
        }
    }

    public function checkLogin()
    {
        $con = $this->connectDb();
        if (!is_null($con)) {
            $sql = "SELECT idusers FROM users WHERE email = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param('s', $_POST['email']);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id);
                $stmt->fetch();
                $sql = "SELECT password FROM users WHERE idusers = ?";
                $stmt->free_result();
                $stmt = $con->prepare($sql);
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows() > 0) {
                    $stmt->bind_result($password);
                    $stmt->fetch();
                    $stmt->free_result();
                    if (password_verify($_POST['pwd'], $password)) {
                        $stmt->close();
                        $con->close();
                        $this->setLogin($_POST['email']);
                        $this->setToken($id);
                        $this->setSession($id, $this->email, $this->token);
                        return true;
                    } else {
                        $stmt->close();
                        $con->close();
                        return false;
                    }
                } else {
                    $stmt->close();
                    $con->close();
                    return false;
                }
            } else {
                $con->close();
                return false;
            }
        } else {
            $con->close();
            return false;
        }
    }

    public function setSession($id, $email, $token)
    {
        $_SESSION['idu'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['token'] = $token;
    }

    public function setToken($id)
    {
        $con = $this->connectDb();
        $token = bin2hex(random_bytes(16));
        $this->token = $token;
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO tokens VALUES (NULL,'" . $id . "' , '" . $token . "', '" . $date . "')";
        echo $sql;
        $result = $con->query($sql);
        if ($result) {
            $con->close();
            return true;
        } else {
            $con->close();
            return false;
        }
    }

    public function getToken($id)
    {
        $con = $this->connectDb();
        $sql = "SELECT token_value FROM tokens WHERE idusera = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($token);
        $stmt->fetch();
        $stmt->free_result();
        $con->close();
        return $token;
    }

    public function getDateToken($id)
    {
        $con = $this->connectDb();
        $sql = "SELECT token_date FROM tokens WHERE idusera = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($date);
        $stmt->fetch();
        $stmt->free_result();
        $con->close();
        return $date;
    }

    // TODO: zrobić dwie metody update i delete token.
    public function updateToken($id)
    {
        $con = $this->connectDb();
        $sql = "UPDATE tokens SET token_date = ? WHERE idusera = ?";
        $stmt = $con->prepare($sql);
        $date = date("Y-m-d H:i:s");
        $stmt->bind_param('sd', $date, $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows() > 0) {
            $stmt->free_result();
            $con->close();
            return true;
        } else {
            $stmt->free_result();
            $con->close();
            return false;
        }
    }

    public function deleteToken($id)
    {
        $con = $this->connectDb();
        $sql = "DELETE FROM tokens WHERE idusera = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows() > 0) {
            $stmt->free_result();
            $con->close();
            return true;
        } else {
            $stmt->free_result();
            $con->close();
            return false;
        }
    }


    public function logout()
    {
        $this->deleteToken($_SESSION['idu']);
        session_destroy();
    }
}
