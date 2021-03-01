<?php
$isNameOfFileCorrect = preg_match('/^[a-zA-Z0-9]+$/', $_POST['name']);
$maxsize = 1024 * 1024 * 1024;
if ($isNameOfFileCorrect === false) {
    echo "Błędna nazwa pliku";
    echo "<a href='index.php'>Formularz</a>";
} else {
    $roz = explode("/", $_FILES['file']['type']);
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        if ($_FILES['file']['size'] > $maxsize) {
            echo "Plik jest za duży";
        } else {
            echo "Odebrano plik. Początkow nazwa " . $_FILES['file']['name'];
            echo "<br>";
            if (isset($_FILES['file']['type'])) {
                echo "Typ pliku: " . $_FILES['file']['name'];
            }
            move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/PHP/16_Obsluga_sieci/img/" . $_POST['name'] . "." . $roz[1]);
        }
    } else {
        echo "Błąd przesyłania danych";
    }
}
