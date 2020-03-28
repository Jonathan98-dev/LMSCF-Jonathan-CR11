<?php  

ob_start();
session_start(); 

require_once("actions/dbconnect.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="styles/main.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
</head>
<body>

<div id = "header">
	<div id = "welcome">
		<a  href = "home.php">
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
		</a>
	</div>


	<div id = "slsen">
		<a href="general.php">Small and Large</a>
		<a href="senior.php">Our Seniors</a>
	</div>


	<div id = "log">
		<?php 
		
		if(!isset($_SESSION['user']))
		{
			echo "<a href='login.php'>Login</a>";
		}
		else
		{	
			$user = $_SESSION['user'];
			$sql_name = "SELECT * FROM user WHERE id = '$user'";
			$result = mysqli_query($conn, $sql_name);	
			$name = $result->fetch_assoc();
			echo "<a href='logout.php?logout'>Logout</a>";		
		}
		
		?>
	</div>
</div>

<div class = "container">
	<?php 
	include_once 'actions/a_seniorsdisplay.php'; 
	?>

</div>

</body>
</html>