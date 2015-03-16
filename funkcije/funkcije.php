<?php
function rezervacijeUporabnikZgodovina($uporabnikID) {
	$date = date("Y-m-d");
	$x = mysql_query("SELECT rezervacija.cena, rezervacija.od, rezervacija.do, hotel.naziv, soba.stevilka, hotel.slika FROM rezervacija LEFT JOIN hotel ON rezervacija.hotelID = hotel.hotelID RIGHT JOIN soba ON soba.sobaID = rezervacija.sobaID WHERE rezervacija.uporabnikID = '$uporabnikID' AND rezervacija.od < '$date'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function rezervacijeUporabnik($uporabnikID) {
	$date = date("Y-m-d");
	$x = mysql_query("SELECT rezervacija.cena, rezervacija.od, rezervacija.do, hotel.naziv, soba.stevilka, hotel.slika FROM rezervacija LEFT JOIN hotel ON rezervacija.hotelID = hotel.hotelID RIGHT JOIN soba ON soba.sobaID = rezervacija.sobaID WHERE rezervacija.uporabnikID = '$uporabnikID' AND rezervacija.od > '$date'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function cenaSobe($sobaID) {
	return mysql_result(mysql_query("SELECT cenaNaDan FROM soba WHERE sobaID = '$sobaID'"), 0);
}

function rezerviraj($podatki) {
	$uporabnikID = $podatki['uporabnikID'];
	$hotelID = $podatki['hotelID'];
	$sobaID = $podatki['sobaID'];
	$od = $podatki['od'];
	$do = $podatki['do'];
	$cena = $podatki['cena'];
	if(mysql_query("INSERT INTO rezervacija (uporabnikID, hotelID, sobaID, od, do, cena) 
		VALUES ('$uporabnikID', '$hotelID', '$sobaID', '$od', '$do', '$cena')"))
		return true;
	else 
		return false;
}

function sobePoHotelih($hotelID) {
	$x = mysql_query("SELECT * FROM soba RIGHT JOIN hotel ON hotel.hotelID = soba.hotelID WHERE hotel.hotelID = '$hotelID'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function vsiHoteliKraj($kraj){
	$x = mysql_query("SELECT * FROM hotel WHERE kraj = '$kraj'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function vsiHoteliZvezdice($zvezdice){
	$x = mysql_query("SELECT * FROM hotel WHERE zvezdice = '$zvezdice'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function vsiHoteli(){
	$x = mysql_query("SELECT * FROM hotel");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function iskanjePoSteviluPosteljInKvaliteti($hotelID, $postelje, $kvaliteta) {
	$x = mysql_query("SELECT * FROM soba RIGHT JOIN hotel ON hotel.hotelID = soba.hotelID WHERE kvaliteta = '$kvaliteta' AND st_postelj = '$postelje' AND hotel.hotelID = '$hotelID'");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function iskanjePoSteviluPostelj($hotelID, $postelje){
	$x = mysql_query("SELECT * FROM soba RIGHT JOIN hotel ON hotel.hotelID = soba.hotelID WHERE hotel.hotelID = '$hotelID' AND st_postelj = '$postelje' ");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
}

function iskanjePoKvaliteti($hotelID, $kvaliteta) {
	$x = mysql_query("SELECT * FROM soba RIGHT JOIN hotel ON hotel.hotelID = soba.hotelID WHERE hotel.hotelID = '$hotelID' AND kvaliteta = '$kvaliteta' ");
	while($a = mysql_fetch_assoc($x)){
		$data[] = $a;
	}
	return $data;
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

function dodajPoslovalnica($podatki) {
	$naziv = $podatki['naziv'];
	$ulica = $podatki['ulica'];
	$kraj = $podatki['kraj'];
	$posta = $podatki['posta'];
	$postnaStevilka = $podatki['postnaStevilka'];
	$telefon = $podatki['telefon'];
	$email = $podatki['email'];
	$drzava = $podatki['drzava'];
	$davcna = $podatki['davcna'];
	
	mysql_query("INSERT INTO poslovalnica (naziv, ulica, kraj, posta, postnaStevilka, telefon, email, drzava, davca
		VALUES ('$naziv', '$ulica', '$kraj', '$posta', '$postnaStevilka', '$telefon', '$email', '$drzava', '$davcna')");
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


function podatkiAgent($agentID) {
	return mysql_fetch_assoc(mysql_query("SELECT * FROM agent WHERE agentID = '$agentID'"));
}

function podatkiAgentje($agencijaID) {
	$query = mysql_query("SELECT * FROM agent RIGHT JOIN agencija ON agent.agencijaID = agencija.agencijaID WHERE agencija.agencijaID = '$agencijaID'");
	while($a = mysql_fetch_assoc($query)){
		$data[] = $a;
	}
	return $data;
}

function podatkiAgencija($agencijaID) {
	return(mysql_fetch_assoc(mysql_query("SELECT * FROM agencija WHERE agencijaID = '$agencijaID'")));
}

function dodajAgenta($podatki) {
	$ime = $podatki['ime'];
	$priimek = $podatki['priimek'];
	$email = $podatki['email'];
	$geslo = $podatki['geslo'];
	$telefon = $podatki['telefon'];
	$spol = $podatki['spol'];
	$agencija = $podatki['agencija'];
	$drzava = $podatki['drzava'];
	if(mysql_query("INSERT INTO agent (ime, priimek, email, geslo, telefon, spol, agencija, drzava)
		VALUES ('$ime', '$priimek', '$email', '$geslo', '$telefon', '$spol', '$agencija', '$drzava')"))
		return true;
	else
		return false;
}

function dodajAgencijo($podaki) {
	$naziv = $podaki['naziv'];
	$ulica = $podaki['ulica'];
	$kraj = $podaki['kraj'];
	$posta = $podaki['posta'];
	$postnaStevilka = $podaki['postnaStevilka'];
	$drzava = $podaki['drzava'];
	$email = $podaki['email'];
	$telefon = $podaki['telefon'];
	$url = $podaki['url'];
	$fax = $podaki['fax'];
	$davcan = $podaki['davcna'];
	if(mysql_query("INSERT INTO agencija (naziv, ulica, kraj, posta, postnaStevilka, drzava, email, telefon, url, fax, davcna) 
		VALUES ('$naziv', '$ulica', '$kraj', '$posta', '$postnaStevilka', '$drzava', '$email', '$telefon', '$url', '$fax', '$davcna')"))
		return true;
	else 
		return false;
}
