<?php  
ob_start();
session_start();
require_once"actions/dbconnect.php";


	if($_GET["id"])
	{
		echo $_GET["id"];
	}
	 
	$sql = "SELECT * FROM l_animals WHERE id =".$_GET["id"];
	$result = mysqli_query($conn, $sql);
	if($result->num_rows == 0)
			{
				echo "No Entries";
			}
			elseif($result->num_rows == 1)
			{
				$row = $result->fetch_assoc();

				echo $row["name"]." | "."<br>"."<img style='width: 100px' src ='".$row["image"]."'> ".$row["description"]."<br>";
			}
			else
			{
				$rows = $result->fetch_all(MYSQLI_ASSOC);
				foreach ($rows as $key => $value) 
				{
					echo $value["id"]." | ". $value["name"]." | "."<br>"."<img style='width: 100px' src ='".$value["image"]."'> ".$value["description"]."<br>";
				}
			}


?>

<?php ob_end_flush(); ?>