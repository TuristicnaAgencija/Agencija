<?php include 'includes/glava.php'; 
if(!isset($_GET['success'])) {?>
<div class="registracija">
	<form method="POST">
		<div class="form-div">
			<label>Ime</label>
			<input type="text" name="ime" class="form-field" value="<?php echo $_POST['ime']; ?>" required>
		</div>
		<div class="form-div">
			<label>Priimek</label>
			<input type="text" name="priimek" class="form-field" value="<?php echo $_POST['priimek']; ?>" required>
		</div>
		<div class="form-div">
			<label>E-Naslov</label>
			<input type="email" name="email" class="form-field" value="<?php echo $_POST['email']; ?>" required>
		</div>
		<div class="form-div">
			<label>Geslo</label>
			<input type="password" name="geslo" class="form-field" required>
		</div>
		<div class="form-div">
			<label>Ponovi geslo</label>
			<input type="password" name="ponoviGeslo" class="form-field" required>
		</div>
		<div class="form-div">
			<label>Dokaži da nisi robot</label><span>2 + 5</span>
			<input type="text" name="validacija" min="5" required>
		</div>
		<div class="form-div">
			<input type="submit" name="submit" value="Registracija" class="form-btn">
		</div>
	</form>
</div>
<?php
$errors = array();
if(isset($_POST['submit'])) {
	if(empty($_POST['ime']) == false && empty($_POST['priimek']) == false && 
	empty($_POST['email']) == false && empty($_POST['geslo']) == false && 
	empty($_POST['ponoviGeslo']) == false) {
	if ($_POST['geslo'] !== $_POST['ponoviGeslo']) {
		$errors[] = 'Gesli se ne ujemata';
	}

	if(strlen($_POST['ime']) < 3 && strlen($_POST['priimek']) < 3) {
		$errors[] = 'Ime in priimek morata vsebovati vsaj tri črke';
	}

	if(emailObstaja($_POST['email']) == true){
		$errors[] = 'Ta email že obstaja.';
	}

	if(strlen($_POST['geslo']) < 6){
		$errors[] = 'Geslo mora vsebovati vsaj 6 znakov';
	}

	if (!preg_match("#[0-9]+#", $_POST['geslo'])) {
        $errors[] = "Geslo mora vsebovati vsaj eno številko";
    }

    if (!preg_match("#[a-zA-Z]+#", $_POST['geslo'])) {
        $errors[] = "Geslo mora vsebovati vsaj eno črko";
    } 

    if($_POST['validacija'] != 7) {
    	$errors[] = 'Validacija ni uspela';
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
		$emailCode = md5($_POST['email'] + microtime());
		$validacija = $_POST['validacija'];
		$errors[] = array('ime'=>$ime, 'priimek'=>$priimek, 'email'=>$email, 'geslo'=>$geslo, 'ponoviGeslo'=>$ponoviGeslo, 'emailCode'=>$emailCode, 'validacija'=>$validacija);
		$podatki = array('ime'=>$ime, 'priimek'=>$priimek, 'email'=>$email, 'geslo'=>$geslo, 'ponoviGeslo'=>$ponoviGeslo, 'emailCode'=>$emailCode);
		if(registracija($podatki) == true) {
			header('Location: ?success');
		}
	}

	print_r($errors);
}

}
else {
	if(isset($_GET['success'])) {
		echo '<h1>Ragistracija je bila uspešna</h1><br>
		<h3>Pojdite na prijavno stran, kjer se lahko sedaj prijavite</h3>';
	}
}
?>
<?php include 'includes/noga.php'; ?>