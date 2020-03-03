<?php

$h = $_GET["hamburger"];
$c = $_GET["cola"];
$s = $_GET["shake"];
$total = 0;

if ($h == 1){
	echo "1 Hamburger: $";
}else{
	echo $h . " Hamburgers: $";
}
echo $h * 4.95;
$total = $total + $h * 4.95;
echo "<br>";

if ($c == 1){
	echo "1 Cola: $";
}else{
	echo $c . " Colas: $";
}
echo $c * .85;
$total = $total + $c * .85;
echo "<br>";

if ($s == 1){
	echo "1  Cocolate Milk Shake: $";
}else{
	echo $s . "  Cocolate Milk Shakes: $";
}
echo $s * 1.95;
$total = $total + $s * 1.95;
echo "<br>";

echo "Total without Sales Tax: ". $total;
echo "<br>";

echo "Sales Tax: 7.5%: " . $total * .075;
$total = $total + ($total * .075);
echo "<br>";
echo "Total with Sales Tax: ". $total;
echo "<br>";

echo "Tip: 16%: " . $total * .16;
$total = $total + ($total * .16);
echo "<br>";
echo "Total with Tax and Tip: ". $total;

?> 