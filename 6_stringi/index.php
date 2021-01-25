<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php
header('Content-Type: charset=utf-8');
$email = "jan.kowalski@wp.pl";

$domena = strstr($email, "@");
$domena = substr($domena, 1, strlen($domena));
echo $domena."<br>";


// print_r(preg_match('/(wp.pl)/', $email));
if(preg_match('/(wp.pl)/', $email)){
    echo "Adres nale�y do domeny wp.pl <br>";
} else {
    echo "Adres nie nale�y do domeny wp.pl <br>";
}

if(preg_match('/^[a-z]+[0-9]*\.[a-z]*@wp.pl$/', $email)){
    echo "Podany adres jest adresem domeny wp.pl";
}
else
{
    echo "Podany adres nie jest niepoprawny";
}


echo "<br>";
$s = "ala ma kota";

if(!strcmp("ala ma kota", $s)){
    echo $s;
} else {
    echo "Ala";
}
$wynik = str_replace("ma", "nie ma", $s);
echo "<br>";
echo $wynik;

$text = "Zażółć gęślą jaźń";
echo "<br>";
echo $text;

$latin_letters = array('Ę' => 'E',
                        'Ą' => 'A',
                        'Ś' => 'S',
                        'Ź' => 'Z',
                        'Ż' => 'Z',
                        'Ć' => 'C',
                        "Ł" => 'L',
                        'Ó' => 'O',
                        'Ń' => 'N',
                        'ę' => 'e',
                        'ą' => 'a',
                        'ś' => 's',
                        'ź' => 'z',
                        'ż' => 'z',
                        'ć' => 'c',
                        'ł' => 'l',
                        'ó' => 'o',
                        'ń' => 'n',
                        );
$wynik = strtr($text, $latin_letters);
echo "<br>";
echo $wynik;

//funkcja htmlspecialchars zamienia znaki używany w html na tekie które zostaną wyświetlone prawidłowo, a nie będą interpretowane przez przeglądarkę jako znaczniki typu &lt, &gt



$new = htmlspecialchars("<a href=\"www.wp.pl\">wp.pl</a>");

$old = "&lt;a href=\"www.wp.pl\" &gt; link &lt;/a&gt;";

echo $new;
print_r($new);

echo $old;

//htmlentities zamienia wszystkie znaki na odpowiadające im kody html jeśli takowe istnieją

echo "<br>";
echo htmlentities("ala ma <b>kota</b> Zażółć", ENT_QUOTES);


$str = "A 'quote' is <b>bold</b>";

// Outputs: A 'quote' is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str);

// Outputs: A &#039;quote&#039; is &lt;b&gt;bold&lt;/b&gt;
echo htmlentities($str, ENT_QUOTES);



?>

</body>
</html>