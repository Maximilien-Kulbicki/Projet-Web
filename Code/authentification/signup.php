<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 3 - Exo 4</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="../css/tp3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>On s'inscrit ici ! </h1>
		<hr>
	
		<h2>Inscription</h2>
		<br><br>

		<form action="dosignup.php" method="post">
			Choisissez votre login (lettres minuscules et/ou majuscules)
			<br>
			<input type="text" name="login">
			<br><br>
			Choisissez votre mot de passe (4 caractères min)
			<br>
			<input type="password" name="password1">
			<br>
			Répétez votre mot de passe
			<br>
			<input type="password" name="password2">
			<br><br>
			<input type="submit" value="S'inscrire">
			<input type="reset" value="Annuler">
		</form>
<?php
	if ( isset( $_GET[ "badsignup" ] ) )
	{
		switch ( $_GET[ "badsignup" ] )
		{
			case "1": $msg = "le login ne contient pas que des lettres"; break;
			case "2": $msg = "le login est déjà utilisé"; break;
			case "3": $msg = "le mot de passe a moins de 4 caractères"; break;
			default:  $msg = "le mot de passe et la vérification sont différents";
		}
		echo "<h2>$msg</h2>";
	}
?>
	</body>
</html>
