<?php
$keynum = uniqid();
$devicename = $_REQUEST['device_name'];

$servername = "localhost";
$username = "web_rw";
$password = "WebsiteReadWrite1@";
$dbname = "htacad";

// Create connection	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//key_num, device_name FROM keydata WHERE keydata.user_
$sql = "INSERT INTO keydata (key_num, device_name) VALUES ('$keynum', '$devicename')";

	if ($conn->query($sql) === FALSE) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();	
	echo $keynum;
?>