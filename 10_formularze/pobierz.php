<?php
$email = $_POST['email'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$tel = $_POST['telefon'];
$pwd = $_POST['pwd'];
print($email);

$s = $email.'-'.$imie.'-'.$nazwisko.'-'.$tel.'-'.$pwd;

function validacja($data, $rodzaj){
    switch ($rodzaj) {
        case 'email':
            $regEX = '/^[a-z]+[0-9]*[a-z]*@[a-z]+\.[a-z]+$/';
            return preg_match($regEX, $data);
            break;
        case 'imie':
            $regEX = "/^[A-Z][a-z]+$/";
            return preg_match($regEX, $data);
            break;
        case 'nazwisko':
            $regEX = "/^[A-Z][a-z]+$/";
            return preg_match($regEX, $data);
            break;
        case 'tel':
            $regEX = "/^[0-9]{9}$/";
            return preg_match($regEX, $data);
            break;
        case 'pwd':
            if(strlen($data) < 8){
                return true;
            }
            break;
        default:
            # code...
            break;
    }
}
if(!validacja($email, 'email')){
    header('location: index.php?error=incorectEmail');
}
if (!validacja($imie, 'imie')){
    header('location: index.php?error=incorectName');
}
if(!validacja($nazwisko, 'nazwisko')){
    header('location: index.php?error=incorectSurname');
}
if(!validacja($tel, 'tel')){
    header('location: index.php?error=incorectTel');
}
if(validacja($pwd, 'pwd')){
    header('location: index.php?error=incorectPwd');
}

function zapiszDane($string){
    $file = fopen('dane.txt', 'a+');

    if($file === false){
        echo '404';
        return 0;
    } else {
        fputs($file, $string);
        fclose($file);
        return 1;
    }
}

zapiszDane($s);