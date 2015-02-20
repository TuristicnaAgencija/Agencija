<?php
function stetjeUporabnikov() {
	return (mysql_result(mysql_query("SELECT COUNT(uporabnikID FROM uporabnik WHERE acitve = 1"), 0));
}

function zasciteno() {
	if(prijavljen() === false) {
		echo '<h1>Z ogled te strani morate biti prijavljeni</h1><p><a href="prijava.php">Prijavna stran</a></p>';
		exit();
	}
}

function prijavljen() {
	return (isset($_SESSION['uporabnikID'])) ? true : false;
}

function registracija($podatki) {
	$ime = $podatki['ime'];
	$priimek = $podatki['priimek'];
	$email = $podatki['email'];
	$geslo = $podatki['geslo'];
	$emailCode = $podatki['emailCode'];

	echo 'mysql_query("INSERT INTO uporabnik (ime, priimek, email, geslo, emailCode) VALUES ('.$ime.', '.$priimek.', '.$email.', '.$geslo.', '.$emailCode.')")';

	if(mysql_query("INSERT INTO uporabnik (ime, priimek, email, geslo, emailCode) VALUES ('$ime', '$priimek', '$email', '$geslo', '$emailCode')")) {
		return true;
	}
	else {
		return false;
	}
}

function emailObstaja($email) {
	return (mysql_result(mysql_query("SELECT COUNT(uporabnikID) FROM uporabnik WHERE email = '$email'"), 0) == 1) ? true : false;
}

function vpis($email, $geslo) {
	$uporabnikID = uporabnikID_Email($email);
	return (mysql_result(mysql_query("SELECT uporabnikID FROM uporabnik WHERE email = '$email' AND geslo = '$geslo'"), 0)) ? $uporabnikID : false;
}

function uporabnikID_Email($email){
	return (mysql_result(mysql_query("SELECT uporabnikID FROM uporabnik WHERE email = '$email'"), 0));
}