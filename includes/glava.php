<?php 
include 'funkcije/funkcije.php'; 
include 'database/povezava.php';
include 'funkcije/init.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Turistična agencija</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<meta charset="utf-8">
</head>
<body>
<div class="glava">
	<img src="http://placehold.it/270x100">
	<span>
		<b>Pomoč in informacije:</b><br>
		01 2004 104<br>
		<b>Pišite nam:</b><br>
		info@agencija.si
	</span>

	<?php
	if(prijavljen() == false) {
		?>
	<nav class="desno">
		<a href="prijava.php">Prijava</a>
		<a href="registracija.php">Registracija</a>
	</nav>
	<?php 
	} else {
		?>
	<nav class="desno">
		<a href="profil.php?uporabnikID=<?php echo $session_uporabnikID; ?>">Profil</a>
		<a href="odjava.php">Odjava</a>
	</nav>
		<?php
	}
	?>
</div>
<?php 
		if($currentFile == 'registracija.php' || $currentFile == 'prijava.php') {
		include 'includes/navigacija1.php';
	}
	else {
		include 'includes/navigacija.php';
	}
	?>
<div class="index">