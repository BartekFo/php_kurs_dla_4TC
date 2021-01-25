<?php
session_start();
if(isset($_POST['submit'])){
    if(($_POST['imie'] === 'Placek') && ($_POST['pwd'] === 'Ciastko')){
        $_SESSION['imie'] = $_POST['imie'];
        $_SESSION['isLoged'] = true;
        $_SESSION['login_time_stamp'] = time();
    }
}
if(isset($_SESSION['imie']) && isset($_SESSION['isLoged'])){
    if(time()-$_SESSION['login_time_stamp'] > 20){
        header('Location: logout.php');
    }
    echo 'Witaj '. $_SESSION['imie']. '!';
    echo 'Uzyskałeś dostęp do tajnych danych';
    echo '<a href="logout.php">Kliknij aby wylogować</a>';
} else {
    echo 'Musisz się zalogować';
    echo '<form action="dane.php" method="POST">
        <input type="text" name="imie" />
        <input type="password" name="pwd" />
        <button type="submit" name="submit">Zaloguj</button>
    </form>';
}