<?php

function sito($n) {
$table = array_fill(2, $n, '');

    for($h = 2; ($h * $h) <= $n; ++$h)
    {
        for($i = (2 * $h); $i <= $n; $i += $h)
        {
            unset($table[$i]);
        }
    }

    return $table;
}

$daneZFunkcji = sito(100);

foreach($daneZFunkcji as $key => $value) {
    $daneZFunkcji[$key] = $key;
}

$stringZFunkcji = implode("-", $daneZFunkcji);

// print_r($daneZFunkcji);

echo $stringZFunkcji;

function zapis($stringZFunkcji, $nazwaPliku) {
    $file = fopen($nazwaPliku, 'w');

    if ($file === false) {
        echo 'blad otwarcia pliku';
        return 0;
    } else {
        fputs($file, $stringZFunkcji);
        // flock($file, LOCK_EX);
        fclose($file);
        //!Zapis do pliku z nadpisywaniem
        return 1;
    }
}

function odczyt($nazwaPliku) {
    $file = fopen($nazwaPliku, 'r');

    if ($file === false) {
        echo 'blad otwarcia pliku';
        return 0;
    } else {
        $odczytanaTablica = explode("-", fread($file, filesize($nazwaPliku)));
        fclose($file);
        //!Zapis do pliku z nadpisywaniem
        return $odczytanaTablica;
    }
}

print_r(odczyt('sitoDane.txt'));
zapis($stringZFunkcji, 'sitoDane.txt');
