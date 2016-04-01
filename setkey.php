
<?php

session_start(); 


if(isset($_SESSION["user_id"])==false)
{
	//user is not logged in
	header("Location: index.php");
}

$servername = "us-cdbr-iron-east-03.cleardb.net";
$username = "bd137a7a986b26";
$password = "304a2520";
$dbname = "heroku_59a151862bc71b9";

$conn = new mysqli($servername, $username, $password, $dbname);

$userkey = $_POST['key'];
$sql = "SELECT key_num, user_id FROM keydata WHERE keydata.key_num='$userkey'";


$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
	while($row = $result->fetch_assoc()) 
	{
		if(isset($row["user_id"])==false)
		{
			$userid=$_SESSION['user_id'];
			$sql = "UPDATE keydata SET user_id='$userid' WHERE keydata.key_num='$userkey'";

			if ($conn->query($sql) === TRUE) {
				//echo "Update succeeded";
				header("Location: manage.php");
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			$conn->close();
			
		}else
		{
			//already set return error message
			$_SESSION["error"] = 'Key is in use';
			header("Location: manage.php");
		}
	}
}
else
{
	$_SESSION["error"] = 'Unable to find key '.$userkey.' Please check your device or reinstall the app.';
	header("Location: manage.php");
}

?>