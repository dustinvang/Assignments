<?php
$restaurants = array("Chama Gaucha"=>"40.50", "Aviva by Kameel"=>"15.00", "Bone’s Restaurant"=>"65.00", "Umi Sushi Buckhead"=>"40.50", "Fandangles"=>"30.00", "Capital Grille"=>"60.50", "Canoe "=>"35.50", "One Flew South"=>"21.00", "Fox Bros. BBQ"=>"15.00", "South City Kitchen Midtown"=>"29.00");

function table($restaurants){
	foreach($restaurants as $x => $value) {
    	echo $x . " - Average Cost $". $value;
    	echo "<br>";
	}
}

echo "Table:<br>";
table($restaurants);

echo "<br>Sorted By Price:<br>";
asort($restaurants);
table($restaurants);

echo "<br>Sorted By Name:<br>";
ksort($restaurants);
table($restaurants);

?> 