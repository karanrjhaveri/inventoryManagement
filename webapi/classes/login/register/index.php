<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="_register.css">
</head>
<body>
	<center>
		<form action="#" method="post">
			<div class="registerBox">
				<div id="h1">Join the Club!</div>
				<p>Please fill in this form to create an account.</p>
				<hr>
				<hr>

				<?php include 'register.php'; ?> <!-- This line is W.I.P. -->

				<!-- <label for="fname"><b>First Name</b></label> -->
				<input type="text" placeholder="Enter First Name" name="fname" required>

				<!-- <label for="lname"><b>Last Name</b></label> -->
				<input type="text" placeholder="Enter Last Name" name="lname" required>

				<!-- <label for="username"><b>Username</b></label> -->
				<input type="text" placeholder="Enter Username" name="username" required>

				<!-- <label for="email"><b>Email</b></label> -->
				<input type="text" placeholder="Enter Email" name="email" required>

				<!-- <label for="bday"><b>Date of Birth</b></label> -->
				<!-- Could not get the 'Date of Birth' placeholder to work with the date input type
						Hence, using this method to get the date of birth with the placeholder -->
				<input type="text" placeholder="Date of Birth" name="bday"
				class="textbox-n" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" required>

				<!-- <label for="password"><b>Password</b></label> -->
				<input type="password" placeholder="Enter Password" name="password" required>

				<!-- <label for="password-repeat"><b>Repeat Password</b></label> -->
				<input type="password" placeholder="Repeat Password" name="password-repeat" required>

				<p>By creating an account you agree to our <a href="#"><br>Terms & Privacy</a>.</p>

				<button type="submit" name="register_btn" id="button" action="register.php">Register</button>
			</div>
		</form>
		<div class="signInInstead">
			<?php
			$URL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$URL = str_replace("register/", "", $URL);
			?>
			<p>Already have an account? <a href= <?= $URL ?> >Sign in</a>.</p>
		</div>
	</center>

</body>
</html>

