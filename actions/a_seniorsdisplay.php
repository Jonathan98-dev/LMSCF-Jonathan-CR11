<?php  
require_once("dbconnect.php");

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

				echo $row["id"]." | ". $row["name"]." | "."<br>"."<img style='width: 100px' src ='".$row["image"]."'> "."<a href='hobbies.php?id=".$value["id"]."'>my hobbies</a>"."<br>";
			}
			else
			{
				$rows = $result->fetch_all(MYSQLI_ASSOC);
				foreach ($rows as $key => $value) 
				{
					echo $value["id"]." | ". $value["name"]." | "."<br>"."<img style='width: 100px' src ='".$value["image"]."'> "."<a href='hobbies.php?id=".$value["id"]."'>my hobbies</a>"."<br>";
				}
			}

// closing connection 
		mysqli_close($conn);

?>