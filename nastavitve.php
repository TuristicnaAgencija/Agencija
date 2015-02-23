<?php include 'includes/glava.php';
zasciteno();
$data = podatkiUporabnik($session_uporabnikID);
?>
<div class="profil">
<h1 style="text-align:center;"><?php echo $data['ime'].' '.$data['priimek'];?></h1>

	<div class="podatki">
		<img src="https://placekitten.com/g/300/370">
		<div class="neki">
		<form method="post">
			<div class="form-group">
			<label>Ime</label>
			<input type="text" name="ime" value="<?php echo $data['ime']; ?>" class="form-field disabled" required readonly>
			</div>
			<div class="form-group">
			<label>Priimek</label>
			<input type="text" name="priimek" value="<?php echo $data['priimek']; ?>" class="form-field disabled" required readonly>
			</div>
			<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-field disabled" required readonly>
			</div>
			<div class="form-group">
			<label>Ulica in hišna številka</label>
			<input type="text" name="ulica" value="<?php echo $data['ulica']; ?>" class="form-field" required>
			</div>
			<div class="form-group">
			<label>Kraj</label>
			<input type="text" name="kraj" value="<?php echo $data['kraj']; ?>" class="form-field" required>
			</div>
			<div class="form-group">
			<label>Pošta</label>
			<input type="text" name="posta" value="<?php echo $data['posta']; ?>" class="form-field" required> 
			</div>
			<div class="form-group">
			<label>Poštna številka</label>
			<input type="text" name="postnaStevilka" value="<?php echo $data['postnaStevilka']; ?>" class="form-field" style="width:100px;" required>
			</div>
			<div class="form-group">
			<label>Telefonska številka</label>
			<input type="text" name="telefon" value="0<?php echo $data['telefon']; ?>" class="form-field" required>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="Posodobi podatke">
				<input type="submit" name="cancel" value="Prekliči">
			</div>
		</div>
	</div>
	<div class="rezarvacije">
		<h2>Oglejte si svoje rezarvacije</h2>
		<h4>Odprte rezarvacije</h4>
		....
		<hr>
		<h4>Zgodovina</h4>
		....
	</div>
</div>
<?php
if(isset($_POST['cancel'])){
	header("Location: profil.php?uporabnikID=$session_uporabnikID");
}
$errors = array();
if(isset($_POST['submit'])) {
	if(empty($_POST['ulica']) == false && empty($_POST['kraj']) == false && 
	empty($_POST['posta']) == false && empty($_POST['postnaStevilka']) == false && 
	empty($_POST['telefon']) == false) {

		if (!preg_match("#[0-9]+#", $_POST['ulica'])) {
   	     $errors[] = 'Manjka hišna številka';
   		}

   		if (!preg_match("#[0-9]+#", $_POST['telefon'])) {
   	     $errors[] = 'Vnešena telefonska številka ni veljavna';
   		}
	}
	else 
		$errors[] = 'Vnesi podatke';

	if(empty($errors) === true){
		$ime = $_POST['ime'];
		$priimek = $_POST['priimek'];
		$email = $_POST['email'];
		$ulica = $_POST['ulica'];
		$kraj = $_POST['kraj'];
		$posta = $_POST['posta'];
		$postnaStevilka = $_POST['postnaStevilka'];
		$telefon = $_POST['telefon'];
		$podatki = array('ime'=>$ime, 'priimek'=>$priimek, 'email'=>$email, 'kraj'=>$kraj, 'ulica'=>$ulica, 'posta'=>$posta, 'postnaStevilka'=>$postnaStevilka, 'telefon'=>$telefon);
		if(posodobitev($podatki) == true) {
			header("Location: profil.php?uporabnikID=$session_uporabnikID");
		}
	}
	print_r($errors);
}
?>
<?php include 'includes/noga.php';?>