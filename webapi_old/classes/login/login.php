<?php
session_start();

include "../sql.php";
	if (isset($_POST['login_btn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		checkUserName($username, $password);
	}
	if(isset($_POST['register_btn'])) {
		$URL = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . "register/";
		header("Location: " . $URL);
		// echo $URL;
	}

	function checkUserName($username, $password){
		include_once 'sql.php';
		$check = "SELECT * FROM usrLogin WHERE user='$username'";
		$check_q = mysql_query($check) or die("<div class='loginMsg'>Error on checking Username<div>");

		if (mysql_num_rows($check_q) == 1) {
			checkLogin($username, $password);
		}
		else{
			echo "<div id='loginMsg'>Wrong Username</div>";
		}
	}

	function checkLogin($username, $password){
		$login = "SELECT * FROM usrLogin WHERE user='$username'";
		$login_q = mysql_query($login) or die('Error on checking Username and Password');

		// Mysql_num_row is counting table row
		if ((mysql_num_rows($login_q) == 1) && (password_verify ($password , mysql_fetch_assoc($login_q)['pass'])===TRUE)) {
			echo "<div id='loginMsg'> Logged in as $username </div>";
			$_SESSION['user'] = $username; // mysql_fetch_assoc($login_q)['user'];

			$login_q = mysql_query($login) or die('Error on checking for date of birth');
			$_SESSION['dob'] = mysql_fetch_assoc($login_q)['dob']; // dob
			// echo gettype($_SESSION['dob']);
			// echo $_SESSION['dob'];

			$login_q = mysql_query($login) or die('Error on checking for first name');
			$_SESSION['fname'] = mysql_fetch_assoc($login_q)['fname']; // first

			$login_q = mysql_query($login) or die('Error on checking for last name');
			$_SESSION['lname'] = mysql_fetch_assoc($login_q)['lname']; // last

			$login_q = mysql_query($login) or die('Error on checking for last active');
			$_SESSION['lastActive'] = mysql_fetch_assoc($login_q)['lastActive']; // last

			header('Location: https://www.karanrjhaveri.com/projects/login/profile/index.php');
		}
		else {
			echo "<div id='loginMsg'>Wrong Password </div>";
			//header('Location: login-problem.php');
		}
	}
?>