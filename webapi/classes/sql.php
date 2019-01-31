<?php

	$host = 'sql208.epizy.com';
	$user = 'epiz_21860388';
	$db = 'epiz_21860388_login';
	$pass = 'KaranJ94';

	$connect = @mysql_connect($host, $user, $pass) or die('Database could not connect');
	$select = @mysql_select_db($db, $connect) or die('Database could not select');
?>