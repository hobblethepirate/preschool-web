
<html>
<head>
<script>
function manageDevice(id)
{
	  var result = document.getElementById("modifydiv"+id);
	  result.style.display = 'block';
}

</script>
<?php require 'login-banner.php' ?>
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

$userid=$_SESSION["user_id"];
$sql = "SELECT key_num, device_name,settings,shapes,alphabet FROM keydata WHERE keydata.user_id='$userid'";
$result = $conn->query($sql);
//var_dump($_SESSION);
?>

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
	<li class="active"><a href="#">Manage</a>
	<li><a href="settings.php">Settings</a>
	<li><a href="logout.php">Logout</a>
</ul>
<p class="navbar-p">Logged in as  <?php echo $_SESSION["first"]." ".$_SESSION["last"]?></p>
</div>
</div>
</nav>
</div>
</head>
<body>
<div style="float: left; margin-left: 113px;" >
<div class="div-small" >
	<h3>Set Key:</h3>
	<form action="setkey.php" method="post">
		<input type="text" id="key" name='key' class="form-control" placeholder="Type in your key from your device">
		<input type="submit" value="Save" class="btn btn-sm btn-primary smbutton-margintop">
	</form>

</div>
<div class="div-small"  style="padding-bottom: 10px; margin-top: 20px;">

<h3>Current Managed Devices:</h3>
<?php 
//echo var_dump($result);

if ($result->num_rows > 0)
{ 
	$keys=array();
	$devices=array();
	$counter=0;
	while($row = $result->fetch_assoc()) 
	{
		//print a link for each item in the list
		echo "<a href='#' onclick='manageDevice(".$counter.")'>".$row['device_name']."</a><br>";
		array_push($keys,$row["key_num"]);
		array_push($devices,$row["device_name"]);
		array_push($devices,$row["settings"]);
		array_push($devices,$row["alphabet"]);
		array_push($devices,$row["shapes"]);
	
		$counter = $counter+1;
	}
$_SESSION["user_keys"]=$keys;
} else{
	echo "<p>Currently you do not own any devices.</p>";
}

?>
</div>
</div>	
<?php
	$count =0;
	//echo var_dump($keys);
	foreach($keys as $item)
	{
		echo "<div id='modifydiv".$count."' class='div-medium manage-modify-div'>";
		echo "<h3> Modify ".$devices[$count*4].":</h3>";	
		
		echo "<form action='modifydevice.php' method='post'>";
		echo "<input name='key' value='".$item."'hidden>";
		if($devices[1+$count*4]==1){
			echo "<div class='manage-modify-settings-div'>Settings:</div> <input type='radio' name='settings' value='Enabled' checked> Enabled <input type='radio' name='settings' value='Disabled'> Disabled<br>";
		} 
		else
		{
			echo "<div class='manage-modify-settings-div'>Settings:</div> <input type='radio' name='settings' value='Enabled'> Enabled <input type='radio' name='settings' value='Disabled' checked> Disabled<br>";
		}
		if($devices[3+$count*4]==1)
		{
			echo "<div class='manage-modify-shapes-div'>Shapes Game: </div><input type='radio' name='shapes' value='Enabled' checked> Enabled <input type='radio' name='shapes' value='Disabled'> Disabled<br>";
		}
		else
		{
			echo "<div class='manage-modify-shapes-div'>Shapes Game: </div><input type='radio' name='shapes' value='Enabled'> Enabled <input type='radio' name='shapes' value='Disabled' checked> Disabled<br>";
		}
		if($devices[2+$count*4]==1)
		{
			echo "<div class='manage-modify-alphabet-div'>Alphabet Game: </div><input type='radio' name='alphabet' value='Enabled' checked> Enabled <input type='radio' name='alphabet' value='Disabled'> Disabled<br>";
		}
		else
		{
			echo "<div class='manage-modify-alphabet-div'>Alphabet Game: </div><input type='radio' name='alphabet' value='Enabled'> Enabled <input type='radio' name='alphabet' value='Disabled' checked> Disabled<br>";
		}
		echo "<br><input class='btn btn-sm btn-primary' type='submit' value='Save'>";
		echo "</form>";
		echo "</div>";
		$count = $count+1;
	}

?>

</body>
</html>