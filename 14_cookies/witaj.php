<?php
if(isset($_COOKIE['name'])){
    echo "Witaj ". $_COOKIE['name'];
    echo 'Ciasteczko zostanie usunięte po 20 sekundach';
    echo 'Jeśli chcesz usunąć ciastko wcześniej kliknij link';
    echo '<a href="witaj.php?action=usun">Kliknij!</a>';
}
if(isset($_GET['action'])){
    if($_GET['action'] === 'usun'){
        setcookie("name", "", time()-1);
    }
}