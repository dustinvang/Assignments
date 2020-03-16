<?php
// Start the session
session_start();
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
header("Location: catan.php");
?>

</body>
</html>