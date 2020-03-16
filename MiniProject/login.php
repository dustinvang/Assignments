<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["name"] = $_POST["name"];
$_SESSION["password"] = $_POST["password"];
echo "Session variables are set.";
header("Location: welcome.php");
?>

</body>
</html>