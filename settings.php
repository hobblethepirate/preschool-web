<?php 
session_start();
?>
<html>
<head>
<title>My Settings</title>
<?php require 'login-banner.php' ?>
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet">
<div class="container navbar-custom">
<nav class="navbar navbar-default">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Pre-School</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
	<li><a href="main.php">Home</a></li>
	<li><a href="manage.php">Manage</a>
	<li class="active"><a href="#">Settings</a>
	<li><a href="logout.php">Logout</a>
</ul>
<p class="navbar-p">Logged in as  <?php echo $_SESSION["first"]." ".$_SESSION["last"]?></p>
</div>
</div>
</nav>
</div>
</head>
<body>
<div class="div-small">
	<h3>Settings:</h3>

<form action="edituser.php" method="post">
<?php 

$servername = "us-cdbr-iron-east-03.cleardb.net";
$username = "bd137a7a986b26";
$password = "304a2520";
$dbname = "heroku_59a151862bc71b9";
// Create connection	
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$userid=$_SESSION["user_id"];

$sql = "SELECT user_id, user_email, user_phone, user_first, user_last, user_pass FROM users WHERE users.user_id='$userid'";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) 
{
	echo "Password: <input id ='password' class='form-control' name='password' type='password' value='".$row['user_pass']."'><br>";
	echo "First:<input id ='first' class='form-control' name='first' type='text' value='".$row['user_first']."'><br>";
	echo "Last:<input id ='last' class='form-control' name='last' type='text' value='".$row['user_last']."'><br>";
	echo "Phone:<input id ='phone' class='form-control ' name='phone' type='text' value='".$row['user_phone']."'><br>";	
}

?>
	
<input type="Submit" value="Save" class="btn btn-sm btn-primary smbutton-marginright"><a href="main.php">Cancel</a><br>

</form>
</div>
</body>

</html>
