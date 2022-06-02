<?php
	if ( isset( $_GET[ "goto" ] ) )
		$action="dosignin.php?goto=" . $_GET[ "goto" ];
	else {
		$action="dosignin.php";
	}
?>

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
		<h1>DISCORD MAX & SAM</h1>
		<hr>

		<h2>Il faut s'identifier ! (ou s'inscrire)</h2>

		<br><br>
		<div id="presentation"> Bonjour à tous, voici la page d'accueil de notre discord ! </div>
		<br><br>

		<form action="<?php echo $action; ?>" method="post">
			<div id=pres> Votre login </div>
			<br>
			<input type="text" name="login">
			<br><br>
			<div id=pres> Votre mot de passe </div>
			<br>
			<input type="password" name="password">
			<br><br>
			<input type="submit" value="Se connecter">
			<input type="reset" value="Annuler">
		</form>
		<p>
			<h3>Pas encore enregistré ?</h3>
			<a href="signup.php">Enregistrez-vous !</a>
		</p>
<?php
	if ( isset( $_GET[ "badlogin" ] ) )
		echo "<h2>Mauvais login/mot de passe </h2>";
?>
	</body>
</html>
