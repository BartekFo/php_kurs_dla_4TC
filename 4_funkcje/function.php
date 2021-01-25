
<?php

$address = "192.168.100.34/27";


// k = str`i`ng
function bin2dec($k){
    $pow =1;
    $dec = 0;

    $dlugoscK = strlen($k);

    for($i = $dlugoscK -1; $i >=0; $i--) {
        if($k[$i] == '1'){
            $dec += $pow;
        }
        $pow = 2 * $pow;
    }
    return $dec;
}
//p to int
function dec2bin($p) {
    $wynik = "";
    while ($p) //p!=0 
    {
        $wynik = ($p % 2 != 0 ? "1" : "0").$wynik;
        $p = (int)($p /= 2);
    }
    $wynikLenght = strlen((string)$wynik);

    $a = $wynikLenght;
    while ($a < 8) {
        $wynik = "0".$wynik;
        $a++;
    }
    return $wynik;
}
//192.168.25.1/24
function getIpAddress($ip) {
    $tab = explode("/", $ip);
    return $tab[0];

}

$thisAddress = getIpAddress($address);
echo"adres IP: ".getIpAddress($address)."<br>";

function getCidr($ip) {
    $tab = explode("/", $ip);
    return $tab[1];
}

$thisCidr = getCidr($address);

// m int
function cidr2DecMask($m) {
    $s = "";
    $mask = ""; //11111111.11111111.00000000.00000000
    $w = $m / 8; // ile pełnych oktetów "1"mamy 
    $r = $m % 8; // ile "1" pozostało 
    for ($i = 1; $i <= $w; $i++) {
        $mask .= "255.";
    }
    for ($i = 1; $i <= $r; $i++) {
        $s .= "1";
    }
    for ($i = $r + 1; $i <= 8; $i++) {
        $s .= "0";
    }
    $mask .= bin2dec($s);
    for ($i = 1; $i < 4 - $w; $i++) {
        $mask .= ".0";
    }
    return $mask;
}
$thisDecmask = cidr2DecMask($thisCidr);
echo"maska: ".getCidr($address)." = ".cidr2DecMask($thisCidr)."<br>";


//192.168.25.1
function address2Int($m) {
    $tab = explode(".", $m);
    $x = dec2bin((int)$tab[0]) . dec2bin((int)$tab[1]) . dec2bin((int)$tab[2]) . dec2bin((int)$tab[3]);
    return bin2dec($x);
}
$thisIntAddress = address2Int($thisAddress);


function int2Address($address) {
    $bin = dec2bin($address);
    $ile = strlen($bin);
    $d = substr($bin, $ile - 8, $ile); //25-32
    $bin = substr($bin, 0, $ile - 8); //0-24
    $ile = strlen($bin); //24
    $c = substr($bin, $ile - 8, $ile); //17-24
    $bin = substr($bin, 0, $ile - 8);
    $ile = strlen($bin); // 17
    $b = substr($bin, $ile - 8, $ile);
    $bin = substr($bin, 0, $ile - 8);
    $ile = strlen($bin);
    $a = substr($bin, $ile - 8, $ile);
    return bin2dec($a) . "." .
        bin2dec($b) . "." .
        bin2dec($c) . "." .
        bin2dec($d);
}

// obydwa strinig
function subnet($address, $mask) {
    //...101011011
    //...111100000
    //------------
    //...10100000
    $x = address2Int($address);
    $y = address2Int($mask);
    $x = $x & $y;
    return int2Address($x);
}
$thisSubnet = subnet($thisAddress, $thisDecmask);
echo "Adres sieci: ".subnet($thisAddress, $thisDecmask)."<br>";

$thisSubnetInt = address2Int($thisSubnet);


function broadcast($address, $mask, $thisCidr) {
    $a = (int)(address2Int($address)) & (int)(address2Int($mask));
    $b = 32 - $thisCidr;
    $i = 1;
    $z = 1; //liczba zlozna z tylu 1(bin) ile jest w czesci hosta
    while ($i < $b) {
        $z = ($z << 1) + 1;
        $i++;
    }
    //a|z
    return int2Address($a | $z);
}
$thisBroadcast = broadcast($thisAddress, $thisDecmask, $thisCidr);
echo"adres rozgłoszeniowy: ".broadcast($thisAddress, $thisDecmask, $thisCidr)."<br>";

$thisBroadcastInt = address2Int($thisBroadcast);

function firstAddress($subnet){
    $x = (int)(address2Int($subnet));
    return int2Address($x+1);
}

$thisFirstAddress = firstAddress($thisSubnet);
echo"host min: ".firstAddress($thisSubnet)."<br>";

function lastAddress($broadcast){
    $y = (int)(address2Int($broadcast));
    return int2Address($y-1);
}

$thisLastAddress = lastAddress($thisBroadcast);
echo"host max: ".lastAddress($thisBroadcast)."<br>";


?>