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
		$id = $_POST["id"];
		$name= $_POST["name"];
		$imagelink= $_POST["imagelink"];
		$description= $_POST["description"];
		$age= $_POST["age"];
		$sheltername= $_POST["sheltername"];
		$hobbies= $_POST["hobbies"];
		$date= $_POST["date"];
	
		$sql = "
				UPDATE `sen_animals` SET `name`='$name',`image`='$imagelink',`description`='$description',`age`='$age',`hobbies`='$hobbies',`date`='$date',`location`='$sheltername'
				WHERE id = $id
				";

		if(mysqli_query($conn, $sql))
		{
			echo "Success";
			header("refresh:3;url=../admin.php");
		}
		else
		{
			echo "error";
		}
	}

	// closing connection 
	mysqli_close($conn);
?>