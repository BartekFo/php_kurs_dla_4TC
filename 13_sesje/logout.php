<?php
session_start();
if(isset($_SESSION['imie']) && isset($_SESSION['isLoged'])){
    echo 'Wylogowano użytkownika '. $_SESSION['imie'].'!';
    session_destroy();
    header('Location: index.php');
}