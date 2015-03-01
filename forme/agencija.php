<!--Cigale-->
<div class="dodajAgencijo">
	<form method="post">
		<div class="form-group">
			<label>Naziv</label>
			<input type="text" name="naziv" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Naslov</label>
			<input type="text" name="ulica" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Pošta</label>
			<input type="text" name="posta" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Poštna številka</label>
			<input type="text" name="postnaStevilka" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Država</label>
			<select name="drzava" class="form-field" required>
				<opiton>Foreach</opiton>
			</select>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="email" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Spletna stran</label>
			<input type="url" name="url" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Telefon</label>
			<input type="text" name="telefon" class="form-field" required>
		</div>
		<div class="form-group">
			<label>FAX</label>
			<input type="text" name="fax" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Davčna številka</label>
			<input type="text" name="davcna" class="form-field" required>
		</div>
		<div class="form-group">
			<input type="submit" name="submit">
		</div>
	</form>
</div>

<?php


if(isset($_POST['submit'])) {

	if(empty($_POST['naziv'] && $_POST['ulica'] && $_POST['kraj'] && $_POST['posta'] && $_POST['postnaStevilka'] && $_POST['drzava'] && $_POST['email'] && $_POST['url'] && $_POST['telefon'] && $_POST['fax'] && $_POST['davcna'])) {
		$errors[] = 'Izpolni vsa polja';
	}

	if(strlen($_POST['Naziv']) < 3) {
		$errors[] = 'Naziv mora vsebovati vsaj tri črke';
	}

	if(emailObstajaAgencija($_POST['email']) == true){
		$errors[] = 'Ta email že obstaja.';
	}

    if (!preg_match("#[0-9]+#", $_POST['ulica'])) {
   	    $errors[] = 'Manjka hišna številka';
   	}

	if (!preg_match("#[0-9]+#", $_POST['telefon'])) {
    	$errors[] = 'Vnešena telefonska številka ni veljavna';
	}

	}

	else {
		$errors[] = 'Vnesi podatke';
	}

	if(empty($errors) === true){
		$naziv = $_POST['naziv'];
		$ulica = $_POST['ulica'];
		$kraj = $_POST['kraj'];
		$posta = $_POST['posta'];
		$postnaStevilka = $_POST['postnaStevilka'];
		$telefon = $_POST['telefon'];
		$email = $_POST['email'];
		$drzava = $_POST['drzava'];
		$url = $_POST['url'];
		$fax = $_POST['fax'];
		$davcna = $_POST['davcna'];
		$podatki = array('naziv'=> $naziv, 'email'=>$email, 'kraj'=>$kraj, 'ulica'=>$ulica, 'posta'=>$posta, 'postnaStevilka'=>$postnaStevilka, 'telefon'=>$telefon, 'drzava'=>$drzava, 'url'=>$url, 'fax'=>$fax, 'davcna');
		if(dodajAgencijo($podatki) == false) {
			$errors[] = 'Prišlo je do napake.';
		}
	}

	print_r($errors);
}

}
}