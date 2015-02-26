<?php
function vsiHoteli(){
	$x = mysql_query("SELECT * FROM hotel");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function iskanjePoDnevih($hotelID) {
	$hotelID = $_SESSION['hotelID'];
}

function iskanjePoSteviluPostelj($hotelID){
	$hotelID = $_SESSION['hotelID'];
}

function iskanjePoDnevuInSteviluPostelj($hotelID) {

}

function minCena($hotelID) {
	return (mysql_result(mysql_query("SELECT MIN(soba.cenaNaDan) FROM hotel LEFT JOIN soba ON soba.hotelID = hotel.hotelID WHERE hotel.hotelID = '$hotelID'"), 0));
}

function prestejSobe($hotelID) {
	return (mysql_result(mysql_query("SELECT COUNT(soba.sobaID) FROM hotel LEFT JOIN soba ON soba.hotelID = hotel.hotelID WHERE hotel.hotelID = '$hotelID'"), 0));
}

function pridobiHotelID($naziv) {
	$hotelID = mysql_result(mysql_query("SELECT hotelID FROM hotel WHERE naziv = '$naziv'"), 0);
	header("Location: hotel.php?hotelID=$hotelID");
}

function podatkiHotel($hotelID){
	$data = mysql_fetch_assoc(mysql_query("SELECT * FROM hotel WHERE hotelID = '$hotelID'"));
	return $data;
}

function posodobitev($podatki) {
	$uporabnikID = uporabnikID_Email($podatki['email']);
	$ime = $podatki['ime'];
	$priimek = $podatki['priimek'];
	$email = $podatki['email'];
	$ulica = $podatki['ulica'];
	$kraj = $podatki['kraj'];
	$posta = $podatki['posta'];
	$postnaStevilka = $podatki['postnaStevilka'];
	$telefon = $podatki['telefon'];

	if(mysql_query("UPDATE uporabnik SET ime = '$ime', priimek = '$priimek', email = '$email', ulica = '$ulica', kraj = '$kraj', posta = '$posta', postnaStevilka = '$postnaStevilka', telefon = '$telefon' WHERE uporabnikID = '$uporabnikID'")) {
		return true;
	}
	else {
		return false;
	}
}

function podatkiUporabnik($uporabnikID) {
	$data = mysql_fetch_assoc(mysql_query("SELECT ime, priimek, email, kraj, ulica, posta, postnaStevilka, telefon, spol FROM uporabnik WHERE uporabnikID = '$uporabnikID'"));
	return $data;
}

function dodajLastnik($podatki) {
	$ime = $podatki['ime'];
	$priimek = $podatki['priimek'];
	$kraj = $podatki['kraj'];
	$ulica = $podatki['ulica'];
	$posta = $podatki['posta'];
	$telefon = $podatki['telefon'];
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
	$ulica = $podatki['ulica'];
	$kraj = $podatki['kraj'];
	$posta = $podatki['posta'];
	$postnaStevilka = $podatki['postnaStevilka'];
	$telefon = $podatki['telefon'];
	$spol = $podatki['spol'];
	$emailCode = $podatki['emailCode'];

	if(mysql_query("INSERT INTO uporabnik (ime, priimek, email, geslo, emailCode, kraj, ulica, posta, postnaStevilka, telefon, spol) 
		VALUES ('$ime', '$priimek', '$email', '$geslo', '$emailCode', '$kraj', '$ulica', '$posta', '$postnaStevilka', '$telefon', '$spol')") == true) {
		header('Location: ?success');
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