<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="_login.css">
</head>
<body>
	<center>
		<form action="#" method="post">
			<div class="loginBox">
				<div id="h1">Hello there!</div>
				<?php include 'login.php'; ?>
				<input type="text" name="username" placeholder="Username"/><br>
				<input type="password" name="password" placeholder="Password"/><br>
				<input type="submit" value="Login" name="login_btn" id="button" action="login.php"/>
				<input type="submit" value="Sign Up" name="register_btn" id="button" action="login.php"/><br>
			</div>
		</form>
	</center>

</body>
</html>