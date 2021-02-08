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
        echo '<table>';
        while ($row = $result->fetch_assoc()) {
            // print_r($row);
            // echo '<br>';
            echo "<tr>
                <td>" . $row['imie'] . "</td>
                <td>" . $row['nazwisko'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['numer'] . "</td>
                </tr>";
        }
        echo '</table>';
    }

    echo "<form action='index.php' method='POST'>
        <input type='text' name='imie'>
        <input type='text' name='nazwisko'>
        <input type='text' name='email'>
        <input type='text' name='numer'>
        <button type='submit' name='submit'>Prześlij</button>
    </form>";

    // if (isset($_POST['submit'])) {
    //     $imie = $_POST['imie'];
    //     $nazwisko = $_POST['nazwisko'];
    //     $email = $_POST['email'];
    //     $numer = $_POST['numer'];
    //     $request = "INSERT INTO klienci (imie, nazwisko, email, numer) values ('$imie','$nazwisko','$email','$numer')";
    //     $mysqli->query($request);
    // }

    $mysqli->close();
}
