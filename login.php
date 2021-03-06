<?php  

ob_start();
session_start();
require_once 'actions/dbconnect.php';


if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
	exit;
}

include_once 'actions/dbconnect.php';

$error = false;
$nameError = "";
$passwordError = "";
$name = "";
$password = "";

//-------------------------------

if(isset($_POST['btn-signup']))
{
	$name = trim($_POST['name']);
	$name = strip_tags($name);
	$name = htmlspecialchars($name);

	$password = trim($_POST['password']);
	$password = strip_tags($password);
	$password = htmlspecialchars($password);


//-------------------------------

	if(empty($name))
	{
		$error = true;
		$nameError = "Please enter a Name";
	}
	else if(strlen($name) < 3)
	{
		$error = true;
		$nameError = "Your Name must be atleast 3 characters long!";
	}
	else if(!preg_match("/^[a-zA-Z]+$/", $name))
	{
		$error = true;
		$nameError = "Your Name is invalid!";
	}

//-------------------------------	

	if(empty($password))
	{
		$error = true;
		$passwordError = "Enter a password";
	}
	else if (strlen($password) < 6)
	{
		$error = true;
		$passwordError = "Your Password is atleast 6 characters long!";
	}
		
//-------------------------------

	if(!$error)
	{
		$password = hash('sha256',$password);

		$res = mysqli_query($conn, "SELECT id, name, password, status FROM user WHERE name = '$name'");
		$row = mysqli_fetch_array($res, MYSQLI_ASSOC);
		$count = mysqli_num_rows($res);

		if($count == 1 && $row['password'] == $password)
		{

//Is Admin --> admin.php

			if($row["status"] == "admin")
			{
				$_SESSION["admin"] = $row["id"];
				header("Location: admin.php");
			}
			else
			{
			$_SESSION['user'] = $row['id'];
			header("Location: home.php");	
			}			
				
	
		}
		else
		{
			$errMSG = "This user is not registered, try again...";
		}
	}

	//-------------------------------
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="styles/log.css">
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




<div class = "formcontainer">
	



		<form method = "POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
			
			<p>Sign In</p>

	<?php  

			if(isset($errMSG))
			{
	?>			
				<div>
					<?php echo $errMSG; ?>
				</div>
	<?php  
			}

	?>		

			<input type="text" name="name" placeholder = "Enter Name" >
			<span><?php echo $nameError ?></span>

			<input type="password" name="password" placeholder = "Enter Password">
			<span><?php echo $passwordError ?></span>
			
			<br>

			<button type="submit" name = "btn-signup">Sign In</button>

			<a href="register.php">Go to Register</a>
		</form>

</div>

</body>
</html>

<?php ob_end_flush(); ?>