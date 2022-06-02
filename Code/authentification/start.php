<?php
	session_start();
    if (!isset($_SESSION["login"])) {
		header('Location: signin.php?goto=page1.php');
		exit();
	}
    $login = $_SESSION["login"];

?>