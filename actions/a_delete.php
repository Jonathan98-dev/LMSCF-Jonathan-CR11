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
	
<?php  

//getting data from database for small
		$sql_small = "SELECT * FROM s_animals";
//saving queryresult in a variable
		$result = mysqli_query($conn, $sql_small);
//looping through data & and displaying data on website
		if($result->num_rows == 0)
		{
			echo "No Entries";
		}
		elseif($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();

			echo $row["id"]." | ". $row["name"]." | "."<br>"."<img style='width: 100px' src ='".$row["image"]."'> "."<a href='a_S_delete.php.php?id=".$value["id"]."'>Delete</a>"."<br>";
		}
		else
		{
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $key => $value) 
			{
				echo $value["id"]." | ". $value["name"]." | "."<br>"."<img style='width: 100px' src ='".$value["image"]."'> "."<a href='a_S_delete.php?id=".$value["id"]."' >Delete</a>"."<br>";
			}
		}

?>		
		
	</body>
	</html>


<?php
	}

//-------------------------------
	if($typeofanimal == "large")
	{

?>		
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>Large Animal</title>
	</head>
	<body>
	
<?php  

//getting data from database for large
		$sql_large = "SELECT * FROM l_animals";
//saving queryresult in a variable
		$result = mysqli_query($conn, $sql_large);
//looping through data & and displaying data on website
		if($result->num_rows == 0)
		{
			echo "No Entries";
		}
		elseif($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();

			echo $row["id"]." | ". $row["name"]." | "."<br>"."<img style='width: 100px' src ='".$row["image"]."'> "."<a href='a_L_delete.php?id=".$value["id"]."' >Delete</a>"."<br>";
		}
		else
		{
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $key => $value) 
			{
				echo $value["id"]." | ". $value["name"]." | "."<br>"."<img style='width: 100px' src ='".$value["image"]."'> "."<a href='a_L_delete.php?id=".$value["id"]."' >Delete</a>"."<br>";
			}
		}


?>
		
	</body>
	</html>


<?php
	}

//-------------------------------

	if($typeofanimal == "senior")
	{

?>		
	
	<!DOCTYPE html>
	<html>
	<head>
		<title>Senior Animal</title>
	</head>
	<body>
	
<?php  

//getting data from database for seniors
		$sql_senior = "SELECT * FROM sen_animals";
//saving queryresult in a variable
		$result = mysqli_query($conn, $sql_senior);
//looping through data & and displaying data on website
		if($result->num_rows == 0)
		{
			echo "No Entries";
		}
		elseif($result->num_rows == 1)
		{
			$row = $result->fetch_assoc();

			echo $row["id"]." | ". $row["name"]." | "."<br>"."<img style='width: 100px' src ='".$row["image"]."'> "."<a href='a_SEN_delete.php?id=".$value["id"]."' >Delete</a>"."<br>";
		}
		else
		{
			$rows = $result->fetch_all(MYSQLI_ASSOC);
			foreach ($rows as $key => $value) 
			{
				echo $value["id"]." | ". $value["name"]." | "."<br>"."<img style='width: 100px' src ='".$value["image"]."'> "."<a href='a_SEN_delete.php?id=".$value["id"]."' >Delete</a>"."<br>";
			}
		}


?>
		</form>
		
	</body>
	</html>


<?php
	}
}

?>

<?php ob_end_flush(); ?>