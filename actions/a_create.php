<?php  
ob_start();
session_start();
require_once"dbconnect.php";

//-------------------------------

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

//-------------------------------

if($_POST)
{	
	$typeofanimal = $_POST["animaloptions"];
	echo $typeofanimal;


	if($typeofanimal == "small")
	{

?>		
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>Small Animal</title>
	</head>
	<body>
	
		<form action="a_smallcreate.php" method="post">

			<input type="text" name="name" placeholder="Animal name"><br>
			<input type="text" name="imagelink" placeholder="Animal Image URL"><br>
			
			<input type="text" name="sheltername" placeholder="Shelter Name"><br>
			
			<input type="text" name="description" placeholder="Animal Description" maxlength="999"><br>

			<input type="submit" name="submit">
		</form>
		
	</body>
	</html>


<?php
	}

//-------------------------------

}

?>

<?php ob_end_flush(); ?>