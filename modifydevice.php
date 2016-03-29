
<?php

session_start(); 

if(isset($_SESSION["user_id"])==false)
{
	//user is not logged in
	header("Location: index.php");
}
$servername = "localhost";
$username = "web_rw";
$password = "WebsiteReadWrite1@";
$dbname = "htacad";

// Create connection	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$userid=$_SESSION["user_id"];
$sql = "SELECT key_num FROM keydata WHERE keydata.user_id='$userid'";
$result = $conn->query($sql);
$found = false;
	while($row = $result->fetch_assoc()) 
	{
		if(strcmp($_POST["key"],$row["key_num"])==0)
		{
			//owned device
			$found=true;
		}			
	}
	if($found==true)
	{
		if(strcmp($_POST["settings"],"Enabled")==0)
		{
			$settings = 1;
		} 
		else
		{
			$settings = 0;
		}
		
		if(strcmp($_POST["alphabet"],"Enabled")==0)
		{
			$alphabet = 1;
		} 
		else
		{
			$alphabet = 0;
		}
		
		if(strcmp($_POST["shapes"],"Enabled")==0)
		{
			$shapes = 1;
		} 
		else
		{
			$shapes = 0;
		}
		$key = $_POST["key"];
		
		$sql = "UPDATE keydata SET settings='$settings', shapes='$shapes', alphabet='$alphabet' WHERE keydata.key_num='$key'";	
		if ($conn->query($sql) === TRUE) {
				//echo "Update succeeded";
			header("Location: manage.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();	
	}else
	{
		header("Location: manage.php");
	}

?>