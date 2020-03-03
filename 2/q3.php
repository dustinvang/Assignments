<?php
$month = array ('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August','September', 'October', 'November', 'December');

function sortAndPrint($month){
    sort($month);
    for($i = 0; $i < count($month); $i++){
		echo $month[$i] . "<br>";
    	}
    }

echo "For Loop:<br>";
for($i = 0; $i < count($month); $i++){
		echo $month[$i] . "<br>";
}
echo "<br>Sort Function:<br>";
sortAndPrint($month);

echo "<br>For Each:<br>";
foreach ($month as $value) {
  echo "$value <br>";
}

echo "<br>For Each Sorted:<br>";
sort($month);
foreach ($month as $value) {
  echo "$value <br>";
}

?> 