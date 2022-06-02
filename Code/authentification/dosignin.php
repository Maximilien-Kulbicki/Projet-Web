<?php
	session_start();
	
	$passwd = file("users.csv",FILE_IGNORE_NEW_LINES);
	$login = $_POST[ "login" ];
	$found = false;
	foreach ( $passwd as $line ){
		$a = explode(",",$line);
		if ( $login == $a[0] )
		{
			$found = true;
			break;
		}
	}
	
	if ( ! $found || $a[1] != md5($_POST[ "password" ]) ){
		header("Location: signin.php?badlogin=1");
	}
	else {
		$_SESSION[ "login" ] = $login;
		if ( isset( $_GET[ "goto" ] ) )
			header("Location: " . $_GET[ "goto" ]);
		else
			header("Location: ../html/base.html");
		
	}
?>