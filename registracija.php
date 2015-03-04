<?php include 'includes/glava.php';
error_reporting(0); 
if(!isset($_GET['success'])) {?>
<div class="registracija">
<h2>Regstracija</h2>
<p> Vsi podatki, ki jih vnesete na tej strani so varovani pred zlorabo! Podatke, ki nam jih boste posredovali ob prijavi, bomo uporabljali zgolj v namene, za katere so bili dani. Vaših podatkov ne bomo posredovali tretjim osebam.</p>
<h5>Vsa polja so obvezna!</h5>
</div>
<hr>
<div class="registracija">
<h4>E-Naslov in geslo</h4>
<p> Za uporabniško ime vnesite svoj email naslov in določite geslo, s katerim boste dostopali do svojih uporabniških strani.
<br>Geslo lahko vedno spremenite v osebnih nastavitvah.</p>
	<form method="POST">
		<div class="form-group">
			<label>E-Naslov</label>
			<input type="email" name="email" class="form-field" value="<?php echo $_POST['email']; ?>" required>
		</div>
		<div class="form-group">
			<label>Geslo</label>
			<input type="password" name="geslo" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Ponovi geslo</label>
			<input type="password" name="ponoviGeslo" class="form-field" required>
		</div>
</div>
<hr>
<div class="registracija">
<h4>Osebni podatki</h4>
		<div class="form-group">
			<label>Ime</label>
			<input type="text" name="ime" class="form-field" value="<?php echo $_POST['ime']; ?>" required>
		</div>
		<div class="form-group">
			<label>Priimek</label>
			<input type="text" name="priimek" class="form-field" value="<?php echo $_POST['priimek']; ?>" required>
		</div>
		<div class="form-group">
			<label>Ulica</label>
			<input type="text" name="ulica" class="form-field" value="<?php echo $_POST['ulica']; ?>">
		</div>
		<div class="form-group">
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-field" value="<?php echo $_POST['kraj']; ?>">
		</div>
		<div class="form-group">
			<label>Pošta</label>
			<input type="text" name="posta" class="form-field" value="<?php echo $_POST['posta']; ?>">
		</div>
		<div class="form-group">
			<label>Poštna številka</label>
			<input type="text" name="postnaStevilka" class="form-field" style="width:100px;" value="<?php echo $_POST['postnaStevilka']; ?>">
		</div>
		<div class="form-group">
			<label>Telefon</label>
			<input type="text" name="telefon" class="form-field" value="<?php echo $_POST['telefon']; ?>" required>
		</div>
		<div class="form-group">
			<label>Spol</label>
			<br><br>
			<label>
			<input type="radio" name="spol" value="moski">Moški</label><br>
			<label>
			<input type="radio" name="spol" value="zenski">Ženski</label><br>
			<label>
			<input type="radio" name="spol" value="0">Ne želim razkriti</label><br>
		</div>
		<div class="form-group">
			<label>Dokaži da nisi robot</label><br><span>2 + 5 =</span>
			<input type="text" name="validacija" class="form-field" style="width:50px;" required>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Registracija" class="form-btn">
		</div>
	</form>
</div>
<hr>
<div class="prijavaDodatno">
<span class="neki">Že imate račun?</span><br>
<a href="prijava.php">Prijavite se tukaj</a><br>
<span class="neki">Ste pozabili geslo?</span><br>
<a href="">Zahtevajte novo geslo</a>
</div>
<?php
$errors = array();
if(isset($_POST['submit'])) {
	if(empty($_POST['ime']) == false && empty($_POST['priimek']) == false && 
	empty($_POST['email']) == false && empty($_POST['geslo']) == false && 
	empty($_POST['ponoviGeslo']) == false && empty($_POST['spol']) == false) {

	if ($_POST['geslo'] !== $_POST['ponoviGeslo']) {
		$errors[] = 'Gesli se ne ujemata';
	}

	if(strlen($_POST['ime']) < 3 && strlen($_POST['priimek']) < 3) {
		$errors[] = 'Ime in priimek morata vsebovati vsaj tri črke';
	}

	if (preg_match("#[0-9]+#", $_POST['ime']) && preg_match("#[0-9]+#", $_POST['priimek'])) {
        $errors[] = 'Ime in priimek lahko vsebujete samo črke';
    }

	if(emailObstaja($_POST['email']) == true){
		$errors[] = 'Ta email že obstaja';
	}

	if(strlen($_POST['geslo']) < 6){
		$errors[] = 'Geslo mora vsebovati vsaj 6 znakov';
	}

	if (!preg_match("#[0-9]+#", $_POST['geslo'])) {
        $errors[] = 'Geslo mora vsebovati vsaj eno številko';
    }

    if (!preg_match("#[a-zA-Z]+#", $_POST['geslo'])) {
        $errors[] = 'Geslo mora vsebovati vsaj eno črko';
    }

    if (!preg_match("#[0-9]+#", $_POST['ulica'])) {
   	    $errors[] = 'Manjka hišna številka';
   	}

   	if (preg_match("#[0-9]+#", $_POST['posta'])) {
        $errors[] = 'Pošta ne sme vsebovati številk';
    }

    if (!preg_match("#[0-9]+#", $_POST['postnaStevilka'])) {
        $errors[] = 'Poštna številka lahko vsebuje samo številke';
    }

    if (!preg_match("#[0-9]+#", $_POST['telefon'])) {
    	$errors[] = 'Vnešena telefonska številka ni veljavna';
	}

    if($_POST['validacija'] != 7) {
    	$errors[] = 'Validacija ni uspela. Očitno ste robot';
    }

	}

	else {
		$errors[] = 'Vnesi podatke';
	}

	if(empty($errors) === true){
		$ime = $_POST['ime'];
		$priimek = $_POST['priimek'];
		$email = $_POST['email'];
		$geslo = sha1($_POST['geslo']);
		$ponoviGeslo = sha1($_POST['ponoviGeslo']);
		$ulica = $_POST['ulica'];
		$kraj = $_POST['kraj'];
		$posta = $_POST['posta'];
		$postnaStevilka = $_POST['postnaStevilka'];
		$telefon = $_POST['telefon'];
		$spol = $_POST['spol'];
		$emailCode = md5($_POST['email'] + microtime());
		$podatki = array('ime'=>$ime, 'priimek'=>$priimek, 'email'=>$email, 'geslo'=>$geslo, 'ponoviGeslo'=>$ponoviGeslo, 'kraj'=>$kraj, 'ulica'=>$ulica, 'posta'=>$posta, 'postnaStevilka'=>$postnaStevilka, 'telefon'=>$telefon, 'spol'=>$spol, 'emailCode'=>$emailCode);
		if(registracija($podatki) == false) {
			$errors[] = 'Prišlo je do napake.';
		}
	}

	print_r($errors);
}

}
else {
	if(isset($_GET['success'])) {
		echo '<h1>Registracija je bila uspešna</h1><br>
		<h3>Pojdite na prijavno stran, kjer se lahko sedaj prijavite</h3>';
	}
}
?>
<?php include 'includes/noga.php'; ?>