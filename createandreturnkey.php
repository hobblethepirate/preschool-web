<?php
$keynum = uniqid();
$devicename = $_REQUEST['device_name'];

$servername = "us-cdbr-iron-east-03.cleardb.net";
$username = "bd137a7a986b26";
$password = "304a2520";
$dbname = "heroku_59a151862bc71b9";

// Create connection	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
//key_num, device_name FROM keydata WHERE keydata.user_
$sql = "INSERT INTO keydata (key_num, device_name) VALUES ('$keynum', '$devicename')";

	if ($conn->query($sql) === FALSE) {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();	
	print(json_encode($keynum));
?>