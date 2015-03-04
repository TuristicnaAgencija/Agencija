<?php include 'includes/glava.php';
zasciteno();
if($session_uporabnikID != $_GET['uporabnikID']) {
	echo '<h1>Za ogled te strani nimate pravic, prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
if(isset($_GET['uporabnikID'])) {
	$data = podatkiUporabnik($_GET['uporabnikID']);
	$rezervacije = rezervacijeUporabnik($session_uporabnikID);
	$rezervacijaZgodovina = rezervacijeUporabnikZgodovina($session_uporabnikID);
		if(empty($data)) {
		echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
		die();
	}
}
else {
	echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
?>
<div class="profil">
<h1 style="text-align:center;"><?php echo $data['ime'].' '.$data['priimek'];?></h1>
	<div class="podatki">

		<img src="https://placekitten.com/g/300/370">
		<div class="neki">
		<a href="nastavitve.php">Uredi podatke</a><br>
			<b>Ime</b><br>
			<?php echo $data['ime']; ?><br>
			<b>Priimek</b><br>
			<?php echo $data['priimek']; ?><br>
			<b>Emai</b><br>
			<?php echo $data['email']; ?><br>
			<b>Ulica</b><br>
			<?php echo $data['ulica']; ?><br>
			<b>Kraj</b><br>
			<?php echo $data['kraj']; ?><br>
			<b>Posta</b><br>
			<?php echo $data['posta']; ?><br>
			<b>Poštna številka</b><br>
			<?php echo $data['postnaStevilka']; ?><br>
			<b>Telefon</b><br>
			0<?php echo $data['telefon']; ?><br>
		</div>
	</div>
	<div class="rezarvacije">
		<h2>Oglejte si svoje rezarvacije</h2>
		<h4>Odprte rezarvacije</h4>
		<?php
		print_r($rezervacije);

		?>
		<hr>
		<h4>Zgodovina</h4>
		<?php
		print_r($rezervacijaZgodovina);
		?>
	</div>
</div>
<?php include 'includes/noga.php';?>

