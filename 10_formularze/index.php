<?php
require_once('form.html');
// include('form1.html');
//Require wygeneruje fatal error w przypadku braku możliwości załadownia wskazanego pliku. Dalsza częśc nie będzie przetwarzana
//include wygeneruje tylko ostrzeżenie.
if(isset($_GET['error'])){
    echo $_GET['error'];
};