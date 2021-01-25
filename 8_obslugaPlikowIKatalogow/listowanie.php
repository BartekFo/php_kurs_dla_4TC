<?php
$path = $_SERVER['PHP_SELF'];
$host = $_SERVER['HTTP_HOST'];


$newPath = explode('/', $path);

$newPath[count($newPath) -1] = 'html';

$newPath = implode('/', $newPath);

$katalog = scandir('html');


foreach($katalog as $key => $value){
    if($value === "." || $value === ".." || is_dir("html/".$value)) continue;
    echo "<a href=\"http://$host$newPath/$value\">$value</a>"."<br>";
}