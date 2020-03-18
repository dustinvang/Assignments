<?php

    $words = $_POST["words"];
    $letter = $_POST["letter"];

    $arr = str_split($words);
    $b = [];

    for($i=0;$i<=count($arr);$i++){
        
        if($arr[$i] != $letter){
            array_push($b,$arr[$i]);
        }
        
    }
    echo join($b);

?>