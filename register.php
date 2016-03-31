<html>
<head>
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/main.css" rel="stylesheet">
</head>
<body>
<div class="div-small register-div" style="margin-top: 100px">
<h3>Register</h3>
<form action="createuser.php"  method="post" ><br>
<input id ="email" name="email" type="email" placeholder "email address" required class="form-control"><br>
<input id ="password" name="password" type="password" placeholder="password" required class="form-control"><br>
<input id ="first" name="first" type="text" placeholder="first name" required class="form-control"><br>
<input id ="last" name="last" type="text" placeholder="last name" required class="form-control"><br>
<input id="phone" name="phone" type="text" placeholder="phone" required class="form-control"><br>
<input type="Submit" value="Register" class="btn btn-sm btn-primary register-button-div"><a href="index.php" class="btn btn-sm btn-danger">Cancel</a><br>
</form>
</div>
</body>
</html>
