<?php
session_start();

include "../sql.php";

if (isset($_POST['register_btn'])) { // ($_SERVER['REQUEST_METHOD']=='POST') {

	$USER = array(
		"fname" => $con->real_escape_string($_POST['fname']),
		"lname" => $con->real_escape_string($_POST['lname']),
		"user" => $con->real_escape_string($_POST['username']),
		"pass" => $_POST['password'],
		"passRep" => $_POST['password-repeat'],
		"dob" => $con->real_escape_string($_POST['bday']),
		"type" => "basic",
		"email" => $con->real_escape_string($_POST['email']),
		"lastActive" => NULL
		);

		// echo $USER['fname'].$USER['lname'].$USER['user'].$USER['pass'].$USER['dob'].$USER['type'].$USER['email'].$USER['lastActive'];

		$errors = array();
		if(
			userNotExists($USER['user'])===TRUE && // username does not already exist
			validateEmail($USER['email'])===TRUE && // email formatted correctly i.e. abc@xyz.com
			validateDOB($USER['dob'],date_default_timezone_get())===TRUE && // date of birth does not occur in the future
			matchPass($USER['pass'],$USER['passRep'])===TRUE && // passwords will match
			validatePass($USER['pass'],$errors)===TRUE // passwords are as per secure standards
		) {

			// no errors -- the data will be passed to the database
			$USER['pass'] = password_hash($USER['pass'], PASSWORD_BCRYPT, array('cost' => 12));

			$insert_sql = "INSERT INTO usrLogin (fname, lname, user, pass, dob, accType, email, lastActive) VALUES ('"
			.$USER['fname']."','".$USER['lname']."','".$USER['user']."','".$USER['pass']."','"
			.$USER['dob']."','".$USER['type']."','".$USER['email']."','".$USER['lastActive']."')";
			if ($con->query($insert_sql) === TRUE) {
				// echo "<div id='registerMsg'>New user created successfully</div>";
				header("Location: https://www.karanrjhaveri.com/projects/login/");
			} else {
				echo "<div id='registerMsg'>Error: " . $insert_sql . "<br></div>" . $con->error;
			}
		}
}

		// check date-of-birth format

	function matchPass($pass_1,$pass_2) {
		if($pass_1 != $pass_2)  { echo "<div id='registerMsg'>Passwords do not Match</div>"; return false; } else return true;
	}

	function validatePass($pass, &$errors) {
		$errors_init = $errors;

		if (strlen($pass) < 8) { $errors[] = "Password too short!"; }

		if (!preg_match("#[0-9]+#", $pass)) { $errors[] = "Password must include at least one number!"; }

		if (!preg_match("#[a-zA-Z]+#", $pass)) { $errors[] = "Password must include at least one letter!"; }

		foreach($errors as $e) { echo "<div id='registerMsg'>".$e."<br></div>"; }
		return ($errors == $errors_init);
	}

	function userNotExists($user) {
		include_once $DB_CONNECT_URL;
		$query = mysql_query("SELECT Count(*) FROM usrLogin WHERE user='".$USER["user"]."'",$DB_CONNECT_URL);

		if (mysql_num_rows($query) != 0) { echo "<div id='registerMsg'>Username already exists. Please pick a new one.</div>"; return false; }
		else return true;

	}

	function validateEmail($email) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) { return true; }
		else { echo "<div id='registerMsg'>Invalid email format</div>"; return false; }
	}

	function validateDOB($dob, $curr) {
		if (strtotime($dob) < strtotime($curr)) return true;
		else {
			echo "<div id='registerMsg'>Invalid date of birth!<br>(Unless you are a time-traveller from the future)</div>";
			return false;
		}
	}
?>