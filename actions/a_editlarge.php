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
		$sheltername= $_POST["sheltername"];
		$hobbies= $_POST["hobbies"];
	
		$sql = "
				UPDATE `l_animals` SET `name`='$name',`image`='$imagelink',`description`='$description',`location`='$sheltername', `hobbies`='$hobbies' 
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