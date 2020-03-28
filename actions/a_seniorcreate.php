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
	$description= $_POST["description"];
	$age = $_POST["age"];
	$hobbies = $_POST["hobbies"];
	$date = $_POST["date"];
	$sheltername= $_POST["sheltername"];

	$sql_senior = "INSERT INTO `sen_animals`(`name`, `image`, `description`, `age`, `hobbies`, `date`, `location`) VALUES ('$name','$imagelink','$description','$age','$hobbies','$date','$sheltername')";

	if(mysqli_query($conn, $sql_senior))
	{
		echo "Success";
		header("refresh:3;url=../admin.php");
	}
	else
	{
		echo "error";
		

		if(strlen($description) > 999)
		{	
			echo strlen($description);
			echo "description to long";
		}
	}	

}



?>

<?php ob_end_flush(); ?>