<?php
@$mysqli = new mysqli('localhost', 'root', '', 'test');

if (mysqli_connect_errno()) {
    printf("Brak połączenia z serverem mySql. Kod błędu: %s\n", mysqli_connect_error());
    exit;
} else {
    echo "Nawiązano połączenie";

    if ($result = $mysqli->query('SELECT * FROM klienci')) {
        echo '<br>';
        // print_r($result);
        while ($row = $result->fetch_assoc()) {
            print_r($row);
            echo '<br>';
        }
    }

    $mysqli->close();
}
