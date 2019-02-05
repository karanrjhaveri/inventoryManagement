<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<link rel="stylesheet" type="text/css" href="_profile.css">
</head>
<body>
	<?php
	session_start();
	include "../sql.php";

	if (isset($_SESSION['user'])) {
		// $curr = date_default_timezone_get(); // current time
		// $update_sql = "UPDATE usrLogin SET lastActive=".$curr."WHERE user=".$_SESSION['user'];
		// 	if ($con->query($update_sql) === TRUE) {
		// 			echo "<div id='loginMsg'>Update successfully</div>";
		// 	}
		// 	else {echo "<div id='loginMsg'>Update fail</div>";}

		echo 	"<div class='loginBox'>"."Welcome, ".$_SESSION['fname']." ".$_SESSION['lname']."<br><br><br>".
				"Your profile details: <br><br>".
				"User Name: ".$_SESSION['user']."<br>".
				"Date of Birth: ".$_SESSION['dob']."<br>".
				"Last Active:".$_SESSION['lastActive']."<br></div>";
	}
	else {
		header('location: https://www.karanrjhaveri.com/projects/login/index.php');
	}
	?>

	<div class="logOut">
		<input id="button" type="button" value="Sign Out" onclick="window.location.href='https://karanrjhaveri.com/projects/login/'" />
	</div>
</body>
</html>
