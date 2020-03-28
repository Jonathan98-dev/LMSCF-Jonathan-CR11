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


// echo "Welcome to the Admin-Panel ".$adminname["name"];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
</head>
<body>

<div id = "header">
	<div id = "welcome">
		<?php echo "<p id = 'welcomeadmin'>Welcome to the Admin-Panel ".$adminname["name"]. "</p>"; ?>
	</div>

	<div id = "log">
		<?php 
		
		if(!isset($_SESSION['admin']))
		{
			echo "<a href='login.php'>Login</a>";
		}
		else
		{	
			$user = $_SESSION['admin'];
			$sql_name = "SELECT * FROM user WHERE id = '$user'";
			$result = mysqli_query($conn, $sql_name);	
			$name = $result->fetch_assoc();
			echo "<a href='logout.php?logout'>Logout</a>";		
		}
		
		?>
	</div>
</div>
	

<div id = "formcontainer">
	
	<form action="a_adminpanel.php" method="GET">

		<button type="submit"><a href="actions/a_adminpanel.php?name=create">Create</a></button>
		<button type="submit"><a href="actions/a_adminpanel.php?name=update">Update</a></button>
		<button type="submit"><a href="actions/a_adminpanel.php?name=delete">Delete</a></button>

	</form>
</div>
	





</body>
</html>

<?php ob_end_flush(); ?>