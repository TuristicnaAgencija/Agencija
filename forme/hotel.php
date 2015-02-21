<div class="dodajHotel">
	<form method="post">
		<div class="form-group">
			<label>Naziv</label>
			<input type="text" name="naziv" class="form-field">
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
			<label>Država</label>
			<select name="drzava" class="form-field">
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
			<label>Število zvezdic</label>
			<input type="radio" name="zvezdice" value="1">1 
			<input type="radio" name="zvezdice" value="2">2 
			<input type="radio" name="zvezdice" value="3">3 
			<input type="radio" name="zvezdice" value="4">4 
			<input type="radio" name="zvezdice" value="5">5
			</div>
			<div class="form-group">
			<label>E-mail</label>
			<input type="email" name="email" class="form-field">
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
			<label>Plačilo</label>
			<input type="text" name="placilo" class="form-field">
			</div>
			<div class="form-group">
			<label>Valuta</label>
			<input type="text" name="valuta" class="form-field">
			</div>
			<div class="form-group">
			<label>Lastnik</label>
			<input type="number" name="lastnik" class="form-field"><br/>
			</div>
			<div class="form-group">
			<input type="submit" value="Dodaj hotel" class="form-field">
			</div>
	</form>
</div>

<?php
	$napake = array();
	if(empty($_POST['naziv'] && $_POST['kraj'] && $_POST['ulica'] && $_POST['posta'] && $_POST['drzava'] && $_POST['zvezdice'] && 
		$_POST['email'] && $_POST['telefon'] && $_POST['url'] && $_POST['placilo'] && $_POST['valuta'] && $_POST['lastnik'])) {
		$napake[] = 'Izpolnite vsa polja.';
	}
	if(empty($napake)) {
		$podatki = array();
		$podatki['naziv'] = $_POST['naziv'];
		$podatki['kraj'] = $_POST['kraj'];
		$podatki['ulica'] = $_POST['ulica'];
		$podatki['posta'] = $_POST['posta'];
		$podatki['drzava'] = $_POST['drzava'];
		$podatki['zvezdice'] = $_POST['zvezdice'];
		$podatki['email'] = $_POST['email'];
		$podatki['telefon'] = $_POST['telefon'];
		$podatki['url'] = $_POST['url'];
		$podatki['placilo'] = $_POST['placilo'];
		$podatki['valuta'] = $_POST['valuta'];
		$podatki['lastnik'] = $_POST['lastnik'];
		if(dodajHotel($podatki) == true) {
			echo 'Vaš hotel je uspešno dodatn.';
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