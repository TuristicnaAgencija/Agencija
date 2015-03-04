<?php 
include 'includes/glava.php';
zasciteno();

if(isset($_GET['sobaID']) && isset($_GET['userID'])) {
	$sobaID = $_GET['sobaID'];
	$uporabnikID = $_GET['userID'];
	$cenaSobe = cenaSobe($sobaID);
}

else {
	echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
?>
<div class="rezerviraj">
<div class="slike">
	<img src="https://placekitten.com/g/150/180">
</div>
	<div class="forma">
	<h3 style="text-align:center;">Izberi datum</h3>
		<form method="post">
			<div class="form-group">
				<label>Od</label>
				<input type="date" name="od" class="form-field" style="margin-left:50%;transform: translate(-50%, 0);" required>
			</div>
			<div class="form-group">
				<label>Do</label>
				<input type="date" name="do" class="form-field" style="margin-left:50%;transform: translate(-50%, 0);" required>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Dokončaj">
			</div>
		</form>
	</div>
</div>

<?php
if(isset($_POST['submit'])) {

	$od = $_POST['od'];
	$do = $_POST['do'];

	$od1 = strtotime($od);
	$do1 = strtotime($do);

	$dni = $do1 - $od1;

	$dni = floor($dni/(60*60*24));

	$cena = $cenaSobe * $dni;


$podatki = array('uporabnikID'=>$uporabnikID, 'sobaID'=>$sobaID, 'hotelID'=>$_SESSION['hotelID'], 'od'=>$od, 'do'=>$do, 'cena'=>$cena);
if(rezerviraj($podatki) == true) {
	header("Location: profil.php?uporabnikID=$session_uporabnikID");
}

}

?>

<?php
include 'includes/noga.php';
?>
