<?php
set_time_limit(999999);

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$db = new PDO('mysql:host=localhost;dbname=agencija', 'root', '');
/* DODAJANJE SOB*/
/*
$db->query("DELETE FROM soba");

foreach(range(1, 10000) as $x) {
	$rando = rand(1,100);
	if($rando > 50)
		$bool1 = 'Da';
	else 
		$bool1 = 'Ne';

	$rando = rand(1,100);
	if($rando > 50)
		$bool2 = 'Da';
	else 
		$bool2 = 'Ne';

	$rando = rand(1,100);
	if($rando > 50)
		$bool3 = 'Da';
	else 
		$bool3 = 'Ne';

	$db -> query("
		INSERT INTO soba (nadstropje, stevilka, st_postelj, klima, minibar, balkon, kvaliteta, cenaNaDan, hotelID)
		VALUES ('{$faker->numberBetween($min = 1, $max = 13)}', '{$faker->numberBetween($min = 100, $max = 1300)}', '{$faker->numberBetween($min = 2, $max = 6)}', 
			'$bool1', '$bool2', '$bool3', '{$faker->numberBetween($min = 1, $max = 5)}', '{$faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 200)}', '{$faker->numberBetween(100,200)}')");
}

*/

/*POPRAVEK CEN SOB*/
/*
foreach(range(3276, 13275) as $x) {
$db->query("
	UPDATE soba SET cenaNaDan = '{$faker->randomFloat(2, 30, 250)}' WHERE sobaID = '$x'");

}
*/
/*DODAJANJE HOTELOV*/
/*
$db -> query("DELETE FROM hotel");

$naziv = array(1=>'Hotel Jezero', 'Hotel Rimski dvor', 'Depandansa Korala - San Simon', 'Grand Hotel Rogaška', 'Hotel Park - Sava Hotels & Resorts', 'Hotel Golf - Sava Hotels & Resorts', 'Hotel Maestoso', 'Hotel Casino Kongo', 'Garni hotel Milena', 'Hotel Emonec', 'Hotel Stare', 'Hotel Barbara Fiesa', 'Hotel Oleander', 'Metropol Resort - Hotel Roža', 'Hotel Arena', 'Hotel Veter', 'Terme Olimia - Hotel Breza', 'Grand Hotel Sava', 'Sončni park Vivat-Hotel Vivat', 'Hotel Stela', 'Hotel Bohinj', 'Hotel Atrij', 'Hotel Slovenija', 'Hotel Admiral', 'Hotel Orel', 'Hotel Svoboda - TALASO STRUNJAN', 'Hotel Vita', 'Hotel Meksiko', 'Hotel Krvavec', 'Dvor Jezeršek - Brnik', 'Hotel Grad Otočec', 'Kempinski Palace Portorož', 'Skipass Hotel', 'Hotel Casino Poetovio', 'Hotel Fiesa', 'Hotel Kras', 'Salinera - Bioenergijski Resort - Hotel', 'Hotel Vital', 'Hotel Pri Mraku', 'Park Hotel Ptuj', 'Hotel Kanu', 'City Hotel Ljubljana', 'Metropol Resort - Grand Hotel Metropol', 'Hotel Tabor', 'Vila Park - TALASO STRUNJAN', 'Hotel Venko', 'Hotel Park Terme Dobrna', 'Hotel Planja', 'Hotel Krka', 'Hotel Zdraviliški dvor', 'Hotel Aleksander', 'Hotel Sport', 'Hotel Radin A - Sava Hotels & Resorts', 'Hotel Vile Park', 'Hotel Termal - Sava Hotels & Resorts', 'Hotel Betnava', 'Hotel Vitarium - Superior', 'Harmonija Wellness športni hotel', 'Hotel Casino Safir', 'Hotel Vital', 'Ljubljana Resort Hotel', 'Plaza Hotel Ljubljana', 'Hotel Trst - Sava Hotels & Resorts', 'Hotel Leonardo', 'Hotel Alp', 'Hotel Kozana', 'Hotel Bau', 'Hotel Histrion', 'Hotel Malovec', 'Vila Bor', 'Hotel Bellevue', 'Salinera-Bioenergijski resort-Vila Maia', 'Hotel Convent', 'Hotel Silvester', 'Hotel Jelka', 'Terme Olimia - Wellness Hotel Sotelia', 'Hotel Lipa - Sava Hotels & Resorts', 'Hotel Ajda - Sava Hotels & Resorts', 'Salinera - Bioenergijski resort - Apartma', 'Vila Higiea', 'Hotel Toplice', 'Hotel Rogla', 'Hotel Mangart Bovec', 'Hotel Belvedere', 'Hotel Haliaetum - San Simon', 'Bohinj Park ECO Hotel', 'Turistično naselje - BGW', 'Hotel Tabor', 'Hotel Lucija', '	Grand Hotel Toplice - Sava Hotels & Resorts', 'Depandansa Park - San Simon', 'Hotel Bolfenk', '	Hotel Bor', 'Hotel Videc', 'Hotel Kristal', 'Hotel Žalec', 'Best Western Plus Hotel Piramida', 'Vile Terme Zreče', 'Hotel Habakuk', 'Hotel Lent');

foreach(range(1, 100) as $x) {
	$rando = rand(1, 100);
	if($rando < 50)
		$placilo = 'Vsak dan posebej';
	else 
		$placilo = 'Ob odhodu';

	$rando = rand(1, 150);
	if($rando < 50)
		$valuta = 'Evro (€)';
	else 
		$valuta = 'Dolar ($)';

	$rando = rand(1, 100);
	if($rando < 50)
		$bool1 = 'Ne';
	else if($rando > 100)
		$bool1 = 'Brezplačen';
	else 
		$bool1 = 'Z doplačilom';

	$zajtrk = 'Vklučen v ceno';
	$vecerja = 'Vlkjučena v ceno';

	$rando = rand(1, 100);
	if($rando < 50)
		$kosilo = 'Vključen v ceno';
	else 
		$kosilo = 'Možnost doplačila v restavraciji';

	$rando = rand(1, 100);
	if($rando < 70)
		$bar = 'Da, odprt vsak dan od 11:00 - 21:00';
	else 
		$bar = 'Ne';

	$rando = rand(1, 100);
	if($rando < 70)
		$terasa = 'Da, odprta vsak dan v času kosila in večerje';
	else 
		$terasa = 'Ne';

	$rando = rand(1, 100);
	if($rando < 40)
		$igralnica = 'Da, odprta vsak dan od 0:00 - 24:00';
	else 
		$igralnica = 'Ne';

	$db -> query("
		INSERT INTO hotel (naziv, slika, kraj, ulica, posta, postnaStevilka, drzava, zvezdice, email, telefon, url, lastnikID, placilo, steviloNadstropji, valuta, wifi, zajtrk, kosilo, vecerja, promet, bar, terasa, igralnica)
		VALUES ('$naziv[$x]', 'https://placekitten.com/g/1170/400', '{$faker->state}', '{$faker->streetAddress}', '{$faker->city}' ,'{$faker->postCode}', '{$faker->numberBetween(1,250)}', '{$faker->numberBetween(1,5)}', '{$faker->companyEmail}', '{$faker->phoneNumber}', '{$faker->domainName}', '{$faker->numberBetween(1,50)}', '$placilo',
			'{$faker->numberBetween(1,13)}', '$valuta', '$bool1', '$zajtrk', '$kosilo', '$vecerja', '{$faker->sentence(10)}', '$bar', '$terasa', '$igralnica')");
}

*/
/*DODAJANJE AGENCIJ*/
/*
$db -> query("DELETE FROM agencija");

foreach(range(1, 100) as $x) {
	$db -> query("
		INSERT INTO agencija (naziv, ulica, kraj, posta, postnaStevilka, drzava, email, telefon, url, fax, davcna) 
		VALUES ('{$faker->company}', '{$faker->streetName}', '{$faker->city}', '{$faker->state}', '{$faker->postCode}', '{$faker->numberBetween(1,250)}', '{$faker->email}', '{$faker->phoneNumber}', '{$faker->domainName}', '{$faker->phoneNumber}', '{$faker->randomNumber(8)}')");
}
*/

/*DODAJANJE AGENTOV*/
/*
$db -> query("DELETE FROM agent");

foreach(range(1, 250) as $x) {
	$rando = rand(1, 100);
	if($rando < 50)
		$spol = 'Moški';
	else
		$spol = 'Ženski';
	$geslo = sha1('miha2255');
	$db -> query("
		INSERT INTO agent (ime, priimek, email, geslo, slika, telefon, spol, drzava, ocenaAgenta, agencijaID)
		VALUES ('{$faker->firstName}', '{$faker->lastName}', '{$faker->email}', '$geslo', 'https://placekitten.com/g/130/180', '{$faker->phoneNumber}', '$spol', '{$faker->numberBetween(1,250)}', '{$faker->numberBetween(1,5)}', '{$faker->numberBetween(19,119)}')");
}
*/

/*DODAJANJE UPORABNIKOV*/
//$db -> query("DELETE FROM uporabnik WHERE uporabnikID > 10");
/*
foreach(range(1, 1000) as $x) {

	$geslo = sha1('miha2255');

if($x%2 == 0){
	$db -> query("
		INSERT INTO uporabnik (ime, priimek, email, geslo, emailCode, slika, kraj, ulica, posta, postnaStevilka, telefon, spol)
		VALUES ('{$faker->firstName('male')}', '{$faker->lastName}', '{$faker->email}', '$geslo', '{$faker->sha1}', 'https://placekitten.com/g/300/300', '{$faker->city}', '{$faker->streetAddress}', '{$faker->state}', '{$faker->postCode}', '{$faker->phoneNumber}', 'Moški')");
}
else
$db -> query("
		INSERT INTO uporabnik (ime, priimek, email, geslo, emailCode, slika, kraj, ulica, posta, postnaStevilka, telefon, spol)
		VALUES ('{$faker->firstName('female')}', '{$faker->lastName}', '{$faker->email}', '$geslo', '{$faker->sha1}', 'https://placekitten.com/g/300/300', '{$faker->city}', '{$faker->streetAddress}', '{$faker->state}', '{$faker->postCode}', '{$faker->phoneNumber}', 'Ženski')");

}
*/
/*DODAJANJE REZERVACIJI*//*
$db -> query("DELETE FROM rezervacija");
foreach(range(1, 10) as $x) {

}
*/

/*DODAJANJE REZERVACIJ*/

$db -> query("DELETE FROM rezervacija1 WHERE rezervacijaID > 10");

foreach(range(1, 1000) as $x) {

	$dan =  $faker->dateTimeThisDecade('now');
	$dan = (array) $dan;
	$odstr = strtotime($dan['date']);
	$od = date("Y-m-d", $odstr);
	$dostr = $odstr + $faker->dayOfMonth()*60*60*24;
	$do =  date("Y-m-d", $dostr);

	$db -> query("
		INSERT INTO rezervacija1 (uporabnikID, sobaID, od, do, cena)
		VALUES ('{$faker->numberBetween(1, 250)}', '{$faker->numberBetween(1, 10000)}', '$od', '$do', '{$faker->numberBetween(100, 10000)}')
		");
}