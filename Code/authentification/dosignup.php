<?php
	$users = file("users.csv",FILE_IGNORE_NEW_LINES);
	$login = $_POST[ "login" ];
	$mdp1 = $_POST[ "password1" ];
	$mdp2 = $_POST[ "password2" ];
	
	if ( ! preg_match("/^[a-zA-Z]+$/", $login) ){
		header("Location: signup.php?badsignup=1");
		die();
	}
	$found = false;
	
	foreach ( $users as $line ){
		$a = explode(",",$line);
		if ( $login == $a[0] )
		{
			$found = true;
			break;
		}
	}
	
	if($found){
		header("Location: signup.php?badsignup=2");
		die();
	}
	
	if(strlen($mdp1) < 4){
		header("Location: signup.php?badsignup=3");
		die();
	}
	
	if ($mdp1 != $mdp2){
		header("Location: signup.php?badsignup=4");
		die();
	}
	
	$users[] = "$login," . md5($mdp1);
	$newcontent = join("\n", $users) . "\n";
	file_put_contents("users.csv", $newcontent);
	header("Location: signin.php");
?>