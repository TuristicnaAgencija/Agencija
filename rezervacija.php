<?php include 'includes/glava.php'; 
zasciteno();
if(isset($_GET['steviloPostelj']) && !empty($_GET['steviloPostelj']) && isset($_GET['kvaliteta']) && !empty($_GET['kvaliteta'])){
	$sobe = iskanjePoSteviluPosteljInKvaliteti($_SESSION['hotelID'], $_GET['steviloPostelj'], $_GET['kvaliteta']);
}
else if(isset($_GET['kvaliteta']) && !empty($_GET['kvaliteta'])) {
	$sobe = iskanjePoKvaliteti($_SESSION['hotelID'], $_GET['kvaliteta']);
}
else if(isset($_GET['steviloPostelj']) && !empty($_GET['steviloPostelj'])) {
	$sobe = iskanjePoSteviluPostelj($_SESSION['hotelID'], $_GET['steviloPostelj']);
}

else {

if(isset($_GET['hotelID'])) {
	$hotel = podatkiHotel($_GET['hotelID']);
	$data = podatkiUporabnik($session_uporabnikID);
	$sobe = sobePoHotelih($_GET['hotelID']);
	$_SESSION['hotelID'] = $_GET['hotelID'];
}
else if (isset($_SESSION['hotelID'])) {
	$hotel = podatkiHotel($_SESSION['hotelID']);
	$data = podatkiUporabnik($session_uporabnikID);
}
else {
	echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
}
$hotel = podatkiHotel($_SESSION['hotelID']);
$data = podatkiUporabnik($session_uporabnikID);
?>
<div class="hotel">
	<div class="galerija">
		<h1 style="left:50%; transform:translate(-50%,0); font-size:2em;color:#fff;position:absolute;"><?php echo $hotel['naziv'].' ';?>
		<?php foreach(range(1, $hotel['zvezdice']) as $i):?>
		<i class="fa fa-star" style="font-size:0.5em;vertical-align:top;"></i>
	<?php endforeach; ?>
		</h1>
		<img src="http://placekitten.com/g/1170/400">
	</div>
	<div class="moznosti">
	<h3 style="text-align:center;">Možnosti iskanja</h3>
	<hr>
	<form method="get">
		<div class="form-group">
		<label>Število postelj</label>
		<select name="steviloPostelj" class="form-field" style="height:auto;">
			<option value="">Izberi</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
		</select>
		</div>
		<div class="form-group">
		<label>Kvaliteta</label>
		<select name="kvaliteta" class="form-field" style="height:auto;">
			<option value="">Izberi</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select>
		</div>
		<input type="submit" value="Išči">
		<input type="button" name="cancel" value="Reset" onclick="location.href='rezervacija.php?hotelID=<?php echo $_SESSION['hotelID']; ?>'">
	</form>

	</div>
	<div class="prosteSobe">
	<h3 style="text-align:center;">Proste sobe</h3>
		<hr>
		<div class="content">
		<?php
		foreach($sobe as $el) {
		?>
		<div class="box">
			<img src="http://placekitten.com/g/80/110">
			<span class="row1">
			Število postelj: <?php echo $el['st_postelj']; ?><br>
			Številka sobe: <?php echo $el['stevilka']; ?><br>
			Nadstropje: <?php echo $el['nadstropje']; ?><br><br><br>
			</span>
			<span class="row2">
			Klima: <?php echo $el['klima']; ?><br>
			Minibar: <?php echo $el['minibar']; ?><br>
			Balkon: <?php echo $el['balkon']; ?><br><br>
			<b>Kvaliteta: </b><?php echo $el['kvaliteta']; ?>
			</span>
			<a href="rezerviraj.php?userID=<?php echo $session_uporabnikID?>&sobaID=<?php echo $el['sobaID']; ?>">Rezerviraj</a>
		</div>
		<?php } ?>
		</div>
	</div>
	
</div>

<?php include 'includes/noga.php'; ?>