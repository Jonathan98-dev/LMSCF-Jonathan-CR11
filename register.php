<?php  
ob_start();
session_start();

if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
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
	
	$taken = "SELECT name FROM user WHERE name = '$name'";
	$querytaken = mysqli_query($conn, $taken);

	if($querytaken->num_rows !=0)
	{
		$error = true;
		$errMSG = "Name already taken";
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
		$passwordError = "Your Password must be atleast 6 characters long!";
	}
	else
	{
		$password = hash('sha256',$password);
	}



//-------------------------------

	if(!$error)
	{
		$query = "INSERT INTO user(name,password) VALUES ('$name','$password')";
		$res = mysqli_query($conn, $query);

		if($res)
		{
			$errTyp = "success";
			$errMSG = "Successfully registered, you can login now";
			unset($name);
			unset($password);
		}
		else
		{
			$errTyp = "danger";
			$errMSG = "Something went wrong, try again later...";
		}
	}

//-------------------------------
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	
	<form method = "POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
		
		<p>Sign Up</p>

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

		<button type="submit" name = "btn-signup">Sign Up</button>

		<a href="login.php">Go to Login</a>
	</form>


</body>
</html>

<?php ob_end_flush(); ?>