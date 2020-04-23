<?php

    $servername = "localhost";
    $username = "dvang1";
    $password = "dvang1";
    $dbname = "dvang1";

    $conn = new mysqli($servername, $username, $password,$dbname);

    if($conn->connect_error){
      die("Connection failed: " . $conn->connect_error);
    }

    // echo "Connection success";
    // echo "<br>";
    echo '<script language="javascript">';
    echo 'console.log("Connection success")';
    echo '</script>';
?>