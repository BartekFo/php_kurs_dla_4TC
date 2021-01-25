<?php
$page = file_get_contents("https://www.nbp.pl/home.aspx?f=/kursy/kursya.html");

$table = ['Nazwa waluty', 'Powyższa'];

$x = strstr($page, $table[0]);

$tab = explode(" ", strip_tags(substr($x, 0, strpos($x, $table[1]))));
echo '<table>';
for ($i=0; $i <count($tab); $i++) {
    if($tab[$i] == "") continue;
    else if($tab[$i] == 'średni'){
        echo '<tr>';
    }
    else if(strpos($tab[$i], ',')){
        echo "<td>$tab[$i]</td>";
        echo '</tr>';
        echo '<tr>';
    }
    else if($tab[$i] == 'euro'){
        echo "<td>";
        echo $tab[$i];
        echo "</td>";
        echo "<td> </td>";
    }
    else if($tab[$i] == '(Republika'){
        echo "<td>";
        echo $tab[$i].' ';
        $i++;
        echo $tab[$i].' ';
        $i++;
        echo $tab[$i];
        echo "</td>";
    }
    else if($tab[$i] == 'izraelski'){
        echo "<td>";
        echo $tab[$i].' ';
        $i++;
        echo $tab[$i].' ';
        $i++;
        echo $tab[$i];
        echo "</td>";
    }
    else if($tab[$i] == 'renminbi'){
        echo "<td>";
        echo $tab[$i].' ';
        $i++;
        echo $tab[$i];
        echo "</td>";
    }
    else {
        echo "<td>$tab[$i]</td>";
    }
}
echo '</table>';