<?php  

//connecting to database

	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cr11_jonathan_petadoption";

	$conn = mysqli_connect($hostname, $username, $password, $dbname);

	if(!$conn)
	{
		echo "error";
	}

	//echo "success". "<hr>";

?>