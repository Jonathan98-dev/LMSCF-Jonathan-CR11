<?php 
ob_start();
session_start();
require_once"actions/dbconnect.php";



if(!isset($_SESSION["admin"]) && !isset($_SESSION["user"]))
{	
	header("Location: login.php");
	exit;
}
if(isset($_SESSION["user"]))
{
	header("Location: home.php");
	exit;
}

$admin = $_SESSION['admin'];
$sql_admin = "SELECT * FROM user WHERE id = '$admin'";
$result = mysqli_query($conn, $sql_admin);	
$adminname = $result->fetch_assoc();


echo "Welcome to the Admin-Panel ".$adminname["name"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<br>
	
	<form action="a_adminpanel.php" method="GET">

		<button type="submit"><a href="actions/a_adminpanel.php?name=create">Create</a></button>
		<button type="submit"><a href="actions/a_adminpanel.php?name=update">Update</a></button>
		<button type="submit"><a href="actions/a_adminpanel.php?name=delete">Delete</a></button>

	</form>
	
	<br>

<a href="logout.php?logout">Logout</a>


</body>
</html>

<?php ob_end_flush(); ?>