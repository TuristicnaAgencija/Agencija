<!--Cigale-->
<div class="dodajAgenta">
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Ime</label>
			<input type="text" name="ime" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Priimek</label>
			<input type="text" name="priimek" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Geslo</label>
			<input type="text" name="geslo" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Telefon</label>
			<input type="text" name="telefon" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Slika</label>
			<input type="file" name="slika" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Agencija</label>
			<select name="agencija" class="form-field" required>
				<?php
					$agencije = array();
					$agencije = agencije();
					foreach ($agencije as $k => $agencija) {
						echo '<option value="'.$agencija["agencijaID"].'">'.$agencija["naziv"].'</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" name="submit">
		</div>
	</form>
</div>

<?php


if(isset($_POST['submit'])) {

	if(empty($_POST['ime'] && $_POST['priimek'] && $_POST['email'] && $_POST['geslo'] && $_POST['telefon'] && $_POST['slika'] && $_POST['agencija'] && $_POST['spol'] && $_POST['drzava'] && $_POST['datumRojstva'])) {
		$errors[] = 'Izpolni vsa polja';
	}

	if(strlen($_POST['ime']) < 3 && strlen($_POST['priimek']) < 3) {
		$errors[] = 'Ime in priimek morata vsebovati vsaj tri črke';
	}

	if(emailObstajaAgent($_POST['email']) == true){
		$errors[] = 'Ta email že obstaja.';
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

	if (!preg_match("#[0-9]+#", $_POST['telefon'])) {
    		$errors[] = 'Vnešena telefonska številka mora vsebovati samo številke';
	}
	
	if(strlen($_POST['telefon'])!=9) {
		$errors[] = 'Vnešena telefonska ptevilka ni veljavna';
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
		$telefon = $_POST['telefon'];
		$spol = $_POST['spol'];
		$agencija = $_POST['agencija'];
		$drazava = $_POST['drazava'];
		$podatki = array('ime'=>$ime, 'priimek'=>$priimek, 'email'=>$email, 'geslo'=>$geslo, 'telefon'=>$telefon, 'spol'=>$spol, 'agencija'=>$agencija, 'drzava'=>$drzava);
		if(dodajAgenta($podatki) == false) {
			$errors[] = 'Prišlo je do napake.';
		}
	}

	print_r($errors);
}

}
}
