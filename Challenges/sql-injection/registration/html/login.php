<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
</html>
<?php
include "db.inc.php";
$username = mysqli_real_escape_string($connection, $_POST["username"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);
$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) === 1) {
	$row = mysqli_fetch_array($result);
	$FLAG = file_get_contents("/var/www/hid/sql-injection/registration/flag.txt");
	echo "<h1>Logged in!</h1>";
	echo "<p>Your flag is: $FLAG</p>";
} else {
	echo "<h1>Login failed.</h1>";
	if($_POST['debug'] != 0) {
		echo "<p>$query</p>";
	}
	echo "<a href='.'>Go back</a>";
}
?>