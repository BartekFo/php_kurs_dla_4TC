<?php
@$mysqli = new mysqli('localhost', 'root', '', 'test');

if (mysqli_connect_errno()) {
    printf("Brak połączenia z serverem mySql. Kod błędu: %s\n", mysqli_connect_error());
    exit;
} else {
    echo "Nawiązano połączenie";
    $s = "SHOW TABLES FROM test;";
    $result = $mysqli->query($s);
    print_r($result);
    if ($result) {
        while ($table = $result->fetch_assoc()) {
            print_r($table);
            echo '<br>';
        }
    }
}
