<?php
    $k = 0;
    for($i = 0; $i<10000; $i++){
        if(($i % 6 == 0) && ($i % 7 == 0) ){
            echo $i;
            echo ', ';
            $k++;
        }
    }
            echo '<br>';
            echo $k;

?>