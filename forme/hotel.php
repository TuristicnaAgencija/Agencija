<div class="dodajHotel">
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Naziv</label>
			<input type="text" name="naziv" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Slika</label>
			<input type="file" name="slika" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Ulica</label>
			<input type="text" name="ulica" class="form-field" required>
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
				<?php
					$drzave = array();
					$drzave = drzave();
					foreach ($drzave as $k => $drzava) {
						echo '<option value="'.$drzava["drzavaID"].'">'.$drzava["naziv"].'</option>';
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Število zvezdic</label>
			<input type="radio" name="zvezdice" value="1" required>1 
			<input type="radio" name="zvezdice" value="2" required>2 
			<input type="radio" name="zvezdice" value="3" required>3 
			<input type="radio" name="zvezdice" value="4" required>4 
			<input type="radio" name="zvezdice" value="5" required>5
		</div>
		<div class="form-group">
			<label>E-mail</label>
			<input type="email" name="email" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Telefonska številka</label>
			<input type="text" name="telefon" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Internetni naslov</label>
			<input type="text" name="url" class="form-field" required>
		</div>
		<div class="form-group">
			<label>Plačilo</label>
			<select name="pacilo" class="form-field" reqired>
				<option value="Vsak dan posebej">Vsak dan posebej</option>
				<option value="Ob odhodu">Ob odhodu</option>
			</select>
		</div>
		<div class="form-group">
			<label>Valuta</label>
			<select name="valuta" class="form-field" required>
				<option value="Evro (€)">Evro (€)</option>
				<option value="Dolar ($)">Dolar ($)</option>
			</select>
		</div>
		<div class="form-group">
			<label>Lastnik</label>
			<select name="lastnik" class="form-field" required>
				<?php
					$lastniki = array();
					$lastniki = lastniki();
						foreach ($lastniki as $k => $lastnik) {
							echo '<option value="'.$lastnik["lastnikID"].'">'.$lastnik["ime"].' '.$lastnik["priimek"].'</option>';
						}
				?>
			</select>
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
	
	else {
		if(!preg_match("#[a-zA-Z]+#", $_POST['naziv'])) {
			$napake[] = 'Naziv mora vsebovati samo črke';
		}

		if(!preg_match("#[a-zA-Z]+#", $_POST['kraj'])) {
			$napake[] = 'Kraj mora vsebovati samo črke';
		}

		if(!preg_match("#[a-zA-Z]+#", $_POST['posta'])) {
			$napake[] = 'Pošta mora vsebovati samo črke';
		}

		if(!preg_match("#[0-9]+#", $_POST['postnaStevilka']) {
			$napake[] = 'Poštna številka mora vsebovati samo številke';
		}

		if(!preg_match("#[0-9]+#", $_POST['ulica'])) {
			$napake[] = 'Manjka hišna številka';
		}

		if (strlen($_POST['telefon'])!=9) {
			$napake[] = 'Vnešena telefonska številka ni veljavna';
		}
	}
	
	if(empty($napake)) {
		$podatki = array();
		$podatki['naziv'] = $_POST['naziv'];
		$podatki['slika'] = $_POST['slika'];
		$podatki['kraj'] = $_POST['kraj'];
		$podatki['ulica'] = $_POST['ulica'];
		$podatki['posta'] = $_POST['posta'];
		$podatki['postnaStevilka'] = $_POST['postnaStevilka'];
		$podatki['drzava'] = $_POST['drzava'];
		$podatki['zvezdice'] = $_POST['zvezdice'];
		$podatki['email'] = $_POST['email'];
		$podatki['telefon'] = $_POST['telefon'];
		$podatki['url'] = $_POST['url'];
		$podatki['placilo'] = $_POST['placilo'];
		$podatki['valuta'] = $_POST['valuta'];
		$podatki['lastnik'] = $_POST['lastnik'];
		if(dodajHotel($podatki) == true) {
			echo 'Vaš hotel je uspešno dodan.';
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
