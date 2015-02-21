<div class="dodajLastnik">
	<form method="post">
		<div class="form-group">
			<label>Ime</label>
			<input type="text" name="ime" class="form-field">
		</div>
		<div class="form-group">
			<label>Priimek</label>
			<input type="text" name="priimek" class="form-field">
		</div>
		<div class="form-group">
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-field">
		</div>
		<div class="form-group">
			<label>Ulica</label>
			<input type="text" name="ulica" class="form-field">
		</div>
		<div class="form-group">
			<label>Pošta</label>
			<input type="number" name="posta" class="form-field">
		</div>
		<div class="form-group">
			<label>Telefonska številka</label>
			<input type="text" name="telefon" class="form-field">
		</div>
		<div class="form-group">
			<label>Internetni naslov</label>
			<input type="text" name="url" class="form-field">
		</div>
		<div class="form-group">
			<label>Država</label>
			<select name="drzavaID" class="form-field">
				<?php
					$drzave = array();
					$drzave = drzave();
					foreach ($drzave as $k => $drzava) {
						echo '<option value="'.$drzava["drzavaID"].'" class="form-field">'.$drzava["naziv"].'</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Dodaj lastnika" class="form-field">
		</div>
	</form>
</div>

<?php
	$napake = array();
	if(empty($_POST['ime'] && $_POST['priimek'] && $_POST['kraj'] && $_POST['ulica'] && $_POST['posta'] && $_POST['telefon'] && 
		$_POST['url'] && $_POST['drzavaID'])) {
		$napake[] = 'Izpolnite vsa polja.';
	}
	if(empty($napake)) {
		$podatki = array();
		$podatki['ime'] = $_POST['ime'];
		$podatki['priimek'] = $_POST['priimek'];
		$podatki['kraj'] = $_POST['kraj'];
		$podatki['ulica'] = $_POST['ulica'];
		$podatki['posta'] = $_POST['posta'];
		$podatki['telefon'] = $_POST['telefon'];
		$podatki['url'] = $_POST['url'];
		$podatki['drzavaID'] = $_POST['drzavaID'];
		if(dodajLastnik($podatki) == true) {
			echo 'Lastnik je uspešno dodan.';
		}
		else {
			echo 'Oprostite, pojavila se je napaka.';
		}
	}
	else {
		foreach ($napake as $k => $napaka) {
			echo $napaka;
		}
	}
?>