<html>
<head>
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
	<li class="active"><a href="#">Home</a></li>
	<li><a href="manage.php">Manage</a>
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
<div class="div-small">
	<h3>Recent Changes:</h3>
	<ol>
		<li>Change 1</li>
		<li>Change 2</li>
		<li>Change 3</li>
		<li>Change 4</li>
	</ol>
</div>
</body>
</html>