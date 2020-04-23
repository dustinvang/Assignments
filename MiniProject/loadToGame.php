<?php
// Start the session
session_start();
include_once 'connect.php';
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["player1"] = $_POST["player1"];
$_SESSION["player2"] = $_POST["player2"];
$_SESSION["player3"] = $_POST["player3"];
$_SESSION["player4"] = $_POST["player4"];
echo "Session variables are set.";

$user1 = $_SESSION["player1"];
$user2 = $_SESSION["player2"];
$user3 = $_SESSION["player3"];
$user4 = $_SESSION["player4"];
$sql = "insert into catan (username,tree,ore,brick,wheat,sheep,score,houses,hotels,roads,cards) 
values ('$user1',0,0,0,0,0,2,0,0,0,0), ('$user2',0,0,0,0,0,2,0,0,0,0), ('$user3',0,0,0,0,0,2,0,0,0,0), ('$user4',0,0,0,0,0,2,0,0,0,0)";

// $result = $conn->query($sql);
if ($conn->multi_query($sql) === TRUE) {
  echo '<script language="javascript">';
  echo 'console.log("New records created successfully")';
  echo '</script>';
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: catan.php");
?>

</body>
</html>