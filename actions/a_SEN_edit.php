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

		$sql = "SELECT * FROM sen_animals WHERE id = $id";
		$result = mysqli_query($conn, $sql);

	//php formating
		$row = $result->fetch_assoc();

	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
</head>
<body>

<!-- updating form -->
	
		<form action="a_editsenior.php" method = "post">
			<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
			<input type="text" name="name" value="<?php echo $row["name"] ?>"><br>
			<input type="text" name="imagelink" value="<?php echo $row["image"] ?>"><br>
			<input type="text" name="description" value="<?php echo $row["description"] ?>"><br>
			<input type="text" name="age" value="<?php echo $row["age"] ?>"><br>
			<input type="text" name="hobbies" value="<?php echo $row["hobbies"] ?>"><br>
			<input type="date" name="date" value="<?php echo $row["date"] ?>"><br>
			<input type="text" name="sheltername" value="<?php echo $row["location"] ?>" ><br>
			

			<input type="submit" name="submit">		

		</form>

</body>
</html>