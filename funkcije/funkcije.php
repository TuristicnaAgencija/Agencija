<?php
function blaz() {
	
}

function dodajLastnik($podatki) {
	$ime = $podatki['ime'];
	$priimek = $podatki['priimek'];
	$kraj = $podatki['kraj'];
	$ulica = $podatki['ulica'];
	$posta = $podatki['posta'];
	$telefon = $podatki['podatki'];
	$url = $podatki['url'];
	$drzavaID = $podatki['drzavaID'];

	if(mysql_query("INSERT INTO lastnik (ime, priimek, kraj, ulica, posta, telefon, url, drzavaID) 
		VALUES ('$ime', '$priimek', '$kraj', '$ulica', '$posta', '$telefon', '$url', '$drzavaID')"))
		return true;
	else
		return false;
}

function stetjeHotelov(){
	return (mysql_result(mysql_query("SELECT COUNT(hotelID) FROM hotel"), 0));
}

function dodajHotel($podatki) {
	$naziv = $podatki['naziv'];
	$kraj = $podatki['kraj'];
	$ulica = $podatki['ulica'];
	$posta = $podatki['posta'];
	$drzava = $podatki['drzava'];
	$zvezdice = $podatki['zvezdice'];
	$email = $podatki['email'];
	$telefon = $podatki['telefon'];
	$url = $podatki['url'];
	$placilo = $podatki['placilo'];
	$valuta = $podatki['valuta'];
	$lastnikID = $podatki['lastnik'];

	if(mysql_query("INSERT INTO hotel (naziv, kraj, ulica, posta, drzava, zvezdice, email, telefon, url, placilo, valuta, lastnikID) 
		VALUES ('$naziv', '$kraj', '$ulica', '$posta', '$drzava', '$zvezdice', '$email', '$telefon', '$url', '$placilo', '$valuta', '$lastnikID')")) 
		
		return true;

	else 
		return false;	
}

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

function drzave() {
	$drzave = array();
	$query = mysql_query("SELECT drzavaID, naziv FROM drzava");
	while($temp = mysql_fetch_assoc($query)) {
		$drzave[] = $temp;
	}
	return $drzave;
}