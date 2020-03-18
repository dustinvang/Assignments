<?php
    function isValidDate($birthday){
        $arr = (explode("/",$birthday));
        if($arr[0] < 32 and $arr[0] > 0){
	        echo "Day is good.<br>";
        }else{
	        echo "Incorrect Day.<br>";
        }
        if($arr[1] < 13 and $arr[1] > 0){
	        echo "Month is good.<br>";
        }else{
	        echo "Incorrect Month.<br>";
        }
    }

    function fIsValidRange($age,$min,$max){
        if(is_numeric($age)){
            if($age > $min and $age < $max){
                echo "Age is good.<br>";
            }else{
                echo "Age does not qualify.<br>";
            }
        }else{
            echo "This is an invalid Age.<br>";
        }
    }

    function fIsValidZipcode($zipcode){
        if(is_numeric($zipcode)){
            if (strlen($zipcode) == 5){
                echo "Zipcode is good.<br>";
            }else{
                echo "Zipcode is too short.<br>";
            }
        }else{
            echo "Zipcode is not numeric.<br>";
        }
    }
?>