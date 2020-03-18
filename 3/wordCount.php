<?php
    $words = $_POST["words"];
    $b = array();

    $arr = explode(" ",strtoupper($words));

    for($i=0;$i<count($arr);$i++){
        $b[$arr[$i]] += 1;
    }

    print_r($b);
    

?>