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

	$name= $_POST["name"];
	$imagelink= $_POST["imagelink"];
	$sheltername= $_POST["sheltername"];
	$description= $_POST["description"];
	$hobbies = $_POST["hobbies"];

	$sql_large = "INSERT INTO `l_animals`(`name`, `image`, `description`, `hobbies`, `location`) VALUES ('$name','$imagelink','$description','$hobbies','$sheltername')";

	if(mysqli_query($conn, $sql_large))
	{
		echo "Success";
		header("refresh:3;url=../admin.php");
	}
	else
	{
		echo "error";
		echo strlen($description);

		if(strlen($description) > 999)
		{
			echo "description to long";
		}
	}	

}



?>

<?php ob_end_flush(); ?>