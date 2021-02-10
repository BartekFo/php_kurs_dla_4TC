<?php
@$mysqli = new mysqli('localhost', 'root', '', 'test');

if (mysqli_connect_errno()) {
    printf("Brak połączenia z serverem mySql. Kod błędu: %s\n", mysqli_connect_error());
    exit;
} else {
    echo "Nawiązano połączenie";

    if ($result = $mysqli->query('SELECT * FROM klienci')) {
        echo '<br>';
        echo '<table>';
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['imie'] . "</td>
                <td>" . $row['nazwisko'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['numer'] . "</td>
                <td><a href='index.php?action=edit&id=" . $row['id_klienta'] . "'>Edytuj</a></td>
                <td><a href='index.php?action=delete&id=" . $row['id_klienta'] . "'>Usuń</a></td>
                </tr>";
        }
        echo '</table>';
    }

    if (!isset($_GET['action'])) {
        echo "<form action='index.php' method='POST'>
        <input type='text' name='imie'>
        <input type='text' name='nazwisko'>
        <input type='text' name='email'>
        <input type='text' name='numer'>
        <button type='submit' name='submit'>Prześlij</button>
        </form>";
    }


    if ((isset($_POST['submit']) && (!isset($_POST['action'])))) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $numer = $_POST['numer'];
        // $request = "INSERT INTO klienci (imie, nazwisko, email, numer) values ('$imie','$nazwisko','$email','$numer')";
        // $mysqli->query($request);

        //przykład dynamicznego przekazywania parametrów

        $st = $mysqli->prepare("INSERT INTO klienci (imie, nazwisko, email, numer) values (?,?,?,?)");
        $st->bind_param('ssss', $imie, $nazwisko, $email, $numer);
        $st->execute();
        printf("wstawiono wiersze: %d  \n", $st->affected_rows);
        $st->close();
    }

    if ((isset($_GET['action']) && ($_GET['action'] == 'edit'))) {
        $id = $_GET['id'];
        $st = $mysqli->prepare("SELECT * FROM klienci WHERE id_klienta = " . $id);
        $st->execute();
        $st->bind_result($oldId, $imie, $nazwisko, $email, $numer);
        $st->fetch();

        echo "<form action='index.php' method='POST'>
        <input type='text' name='imie' value=" . $imie . ">
        <input type='text' name='nazwisko' value=" . $nazwisko . ">
        <input type='text' name='email' value=" . $email . ">
        <input type='text' name='numer' value=" . $numer . ">
        <input type='hidden' name='action' value='edit1'>
        <input type='hidden' name='editID' value=" . $id . ">
        <button type='submit' name='submit'>Edytuj</button>
        </form>";
        $st->close();
    }

    if ((isset($_POST['submit']) && (isset($_POST['action'])))) {
        $id = $_POST['editID'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email = $_POST['email'];
        $numer = $_POST['numer'];

        $st = $mysqli->prepare("UPDATE klienci SET imie = ?, nazwisko = ?, email = ?, numer = ? WHERE  id_klienta = ?");
        $st->bind_param('ssssd', $imie, $nazwisko, $email, $numer, $id);
        $st->execute();
        printf("zmieniono wierszy: %d  \n", $st->affected_rows);
        $st->close();
    }

    if ((isset($_GET['action']) && ($_GET['action'] == 'delete'))) {
        $id = $_GET['id'];
        $st = $mysqli->prepare("DELETE FROM klienci WHERE id_klienta = " . $id);
        $st->execute();
        printf("usunięto wierszy: %d  \n", $st->affected_rows);
        $st->close();
    }


    $mysqli->close();
}
