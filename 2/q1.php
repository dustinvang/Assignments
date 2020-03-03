<?php
function isBitten() {
    return rand(1,2);
}

$chance = isBitten();

if($chance == 1){
	echo "Charlie did not eat my lunch!<br>";
}else{
	echo "Charlie ate my lunch!<br>";
}

echo $chance;
?>
