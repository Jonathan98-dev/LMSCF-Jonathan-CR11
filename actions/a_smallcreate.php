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

	$sql_small = "INSERT INTO `s_animals`(`name`, `image`, `description`, `location`) VALUES ('$name','$imagelink','$description','$sheltername')";

	if(mysqli_query($conn, $sql_small))
	{
		echo "Success;";
		header("refresh:3;url=../admin.php");
	}
	else
	{
		echo "error";
	}	

}



?>

<?php ob_end_flush(); ?>