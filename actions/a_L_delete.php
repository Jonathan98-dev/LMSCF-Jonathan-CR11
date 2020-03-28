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

	if($_GET["id"])
	{
		$id = $_GET["id"];

		$deletelarge= "DELETE FROM l_animals WHERE id = $id";

		if(mysqli_query($conn,$deletelarge))
		{
			echo "deleted";
			header("refresh:3;url=../admin.php");
		}
		else
		{
			echo "error";
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete</title>
</head>
<body>


</body>
</html>