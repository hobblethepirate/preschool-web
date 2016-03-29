<?php
session_start(); 
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

$userlogin=$_POST["username"];
$userpass=$_POST["password"];
$sql = "SELECT user_id, user_email, user_first, user_last, user_pass FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) 
	{
		if(strcmp($row["user_email"],$userlogin)==0 && strcmp($row["user_pass"], $userpass)==0)
		{
			//echo "Successfully logged in";
			$_SESSION["user_id"]=$row["user_id"];
			$_SESSION["first"] = $row["user_first"];
			$_SESSION["last"] = $row["user_last"];
			header("Location: main.php");
		}		
    }
} else {
    //echo "Login failed";
	header("Location: index.php");
}
$conn->close();

?>