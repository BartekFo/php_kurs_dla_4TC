<?php
$file = fopen('plik.txt', 'r');

$text = fread($file, filesize('plik.txt'));

echo $text;

fclose($file);

$tab = file('plik.txt');

print_r($tab);

echo implode(" ", $tab);


if (file_exists('plik.txt')) {
    echo readfile('plik.txt');
} else {
    echo 'nie znaleziono pliku';
}

// Odczytywanie wiersz po wierszu

$file = fopen('plik.txt', 'r');

if ($file === false) {
    echo 'blad otwarcia pliku';
} else {
    echo "<br>";
    while (!feof($file)) {
        $bufor = fgets($file);
        echo "$bufor <br>";
    }
    fclose($file);
}

//Odczytywanie znak po znaku
$file = fopen('plik.txt', 'r');

if ($file === false) {
    echo 'blad otwarcia pliku';
} else {
    echo "<br>";
    while (!feof($file)) {
        $bufor = fgetc($file);
        echo "$bufor <br>";
    }
    fclose($file);
}

//Otwieranie pliku ze zdalnego servera
$file = fopen('https://healthylockdown.cal24.pl/styles/style.css', 'r');

if ($file === false) {
    echo 'blad otwarcia pliku';
} else {
    echo "<br>";
    while (!feof($file)) {
        $bufor = fgets($file);
        echo "$bufor <br>";
    }
    fclose($file);
}

//*Zapis do pliku
$file = fopen('1.txt', 'a');


if ($file === false) {
    echo 'blad otwarcia pliku';
} else {
    fputs($file, "Test nadpisu\n");
    fclose($file);
    //!Zapis do pliku z nadpisywaniem
}
//*blokada
$file = fopen('sitoDane.txt' , 'w');

if(flock($file, LOCK_EX)) {
    fclose($file);
    echo "blad otwarcia pliku";
} else {
    fputs($file, 'a');
    flock($file, LOCK_UN);
    fclose($file);
    echo "udalo sie!";
}

//*Dane odczytania pliku(czas)

//funkcje informacyjne
    echo "<br>";

    echo date("Y-m-d H:i:s",fileatime("sitoDane.txt"));//funkcja fileatime jest to czas ostatniego odczytu

    echo "<br>";

    echo date("Y-m-d H:i:s",filemtime("sitoDane.txt"));//czas ostatniej modyfikacji pliku

    echo "<br>";

    echo fileowner("sitoDane.txt");//zwraca identyfikator uzytkownika ktory jest wlascicielem

    echo "<br>";

    echo fileperms("sitoDane.txt");//zwraca prawa dostepu do pliku

    echo "<br>";

    echo filesize("sitoDane.txt");//zwraca wielkosc pliku w bajtach

    echo "<br>";


//Kopiowanie z jednego pliku do drugiego
copy("plik.txt","sitoDane.txt")or die("blad przy kopiowaniu");
rename("plik3.txt","plik.txt");
unlink("usunplik.txt");
//Tworzenie katalogu
mkdir("katalog","777");
//Usuwanie katalogu
rmdir("katalog");

// //funkcje dotyczace przetwarzania sciezek

//     $path="/home/cos/plik1.txt";

//     echo dirname($path);

//     echo "<br>";

//     echo basename($path);

//     echo "<br>";

//     //operacje na katalogach

//     if($dir=@opendir("/img")){​​

//         while($file=readdir($dir)){​​

//             echo "$file \n ";

//         }​​

//     closedir($dir);

//     }​​