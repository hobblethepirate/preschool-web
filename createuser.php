<?php

$servername = "localhost";
$username = "web_rw";
$password = "WebsiteReadWrite1@";
$dbname = "htacad";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['email'],$_POST['password'], $_POST['first'],$_POST['last'])==true)
{
	$email = $_POST['email'];	//check for email address
	$password =$_POST['password'];
	$first=$_POST['first'];
	$last=$_POST['last'];
	$phone=$_POST['phone'];
	$sql = "SELECT user_email FROM users where users.user_email='$email'";
	$result = $conn->query($sql);
	while($row = $result->fetch_assoc()) 
	{
			//duplicate exists
			//set an error message and return to the registration page
			$_SESSION["error"] = "This user is already registered. If you feel you own this account please reset the password for this user";
			header("Location: register.php");
	}
	
	$sql = "INSERT INTO Users (user_email, user_pass, user_first, user_last, user_phone) VALUES ('$email', '$password', '$first', '$last','$phone')";

	if ($conn->query($sql) === TRUE) {
		//echo "New record created successfully";
		header("Location: index.php");
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
} 
else
{
	
	$_SESSION["error"] = "Invalid form data";
	header("Location: register.php");
}

?>