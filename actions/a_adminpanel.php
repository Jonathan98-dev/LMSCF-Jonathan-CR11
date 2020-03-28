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

if($_GET['name'])
{

	if($_GET['name']=="create")
	{
		echo "create";

?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Create</title>
	</head>
	<body>
	
	<form action="a_create.php" method = "post">

		<label for = "animals">Type of animal:</label>

		<br>

		<select name ="animaloptions" id="animals">
		  <option value="small">Small Animal</option>
		  <option value="large">Large Animal</option>
		  <option value="senior">Senior Animal</option>
		</select>
		
		<br>

		<button type="submit">Create new entry</button>
	</form>
	
	</body>
	</html>


<?php

	}

//-------------------------------

	if($_GET['name']=="update")
	{
		echo "update";
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Update</title>
	</head>
	<body>
		
	<form action="a_update.php" method = "post">

		<label for = "animals">Type of animal:</label>

		<br>

		<select name ="animaloptions" id="animals">
		  <option value="small">Small Animal</option>
		  <option value="large">Large Animal</option>
		  <option value="senior">Senior Animal</option>
		</select>
		
		<br>

		<button type="submit">Update</button>
	</form>


	</body>
	</html>


<?php
	}

//-------------------------------

	if($_GET['name']=="delete")
	{
		echo "delete";
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Delete</title>
	</head>
	<body>
		
		<form action="a_delete.php" method = "post">

		<label for = "animals">Type of animal:</label>

		<br>

		<select name ="animaloptions" id="animals">
		  <option value="small">Small Animal</option>
		  <option value="large">Large Animal</option>
		  <option value="senior">Senior Animal</option>
		</select>
		
		<br>

		<button type="submit">Delete</button>
	</form>

	</body>
	</html>


<?php
	}

}

//-------------------------------


?>