<?php include 'includes/glava.php'; 
if(isset($_GET['od']) && isset($_GET['do']) && isset($_GET['steviloPostelj']) &&!empty($_GET['od']) && !empty($_GET['do']) && !empty($_GET['steviloPostelj'])) {
	echo 'iskanjePoDnevuInSteviluPostelj($hotelID)';
}
else if(isset($_GET['steviloPostelj']) && !empty($_GET['steviloPostelj'])) {
	echo 'iskanjePoSteviluPostelj($hotelID)';
}
else if(isset($_GET['od']) && isset($_GET['do']) && !empty($_GET['od']) && !empty($_GET['do'])) {
	echo 'iskanjePoDnevih($hotelID)';
}
else {

if(isset($_GET['hotelID'])) {
	$hotel = podatkiHotel($_GET['hotelID']);
	$data = podatkiUporabnik($session_uporabnikID);
}
else {
	echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
}
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
	<form method="get">
		<div class="form-group">
		<label>Število postelj</label>
		<select name="steviloPostelj" class="form-field" style="height:auto;">
		<option value="2" selected>2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="6">6</option>
		</select>
		</div>
		<div class="form-group">
		<label>Kvaliteta</label>
		</div>
		<div class="form-group">
		<label>Od</label>
		<input type="date" name="od" class="form-field">
		</div>
		<div class="form-group">
		<label>Do</label>
		<input type="date" name="do" class="form-field">
		</div>
		<input type="submit" value="Išči">
	</form>
	</div>
	
</div>

<?php include 'includes/noga.php'; ?>