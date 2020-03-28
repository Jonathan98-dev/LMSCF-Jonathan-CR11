<?php  

ob_start();
session_start();

require_once("actions/dbconnect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<?php 

//-------------------------------
//User Welcome

if(!isset($_SESSION['user']))
{
	echo "Welcome";
}
else
{	
	$user = $_SESSION['user'];
	$sql_name = "SELECT * FROM user WHERE id = '$user'";
	$result = mysqli_query($conn, $sql_name);	
	$name = $result->fetch_assoc();

	echo "Welcome " .$name["name"];		
}

//-------------------------------

?>

<br><br>

<?php 
include_once 'actions/a_generaldisplay.php'; 
?>

<a href="logout.php?logout">Logout</a>
<a href="login.php">Login</a>
</body>
</html>

<?php ob_end_flush(); ?>