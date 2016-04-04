<?php
$key = $_REQUEST['key'];

$servername = "localhost";
$username = "web_rw";
$password = "WebsiteReadWrite1@";
$dbname = "htacad";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT settings, shapes, alphabet FROM keydata WHERE key_num='$key'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
	print(json_encode($row["shapes"]);
	print(json_encode($row["alphabet"]);
	print(json_encode($row["settings"]);
}
?>