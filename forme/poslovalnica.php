<div class="dodajPoslovalnica">
	<form method="post">
		<div class="form-field">
			<label>Naziv</label>
			<input type="text" name="naziv" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Naslov</label>
			<input type="text" name="ulica" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Pošta</label>
			<input type="text" name="posta" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Poštna številka</label>
			<input type="text" name="postnaStevilka" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Država</label>
			<select name="drzava" class="form-group">
			<option value="foreach">Foreach</option>
			</select>
		</div>
		<div class="form-field">
			<label>Email</label>
			<input type="email" name="email" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Telefon</label>
			<input type="text" name="telefon" class="form-group" required>
		</div>
		<div class="form-field">
			<label>Davcna</label>
			<input type="text" name="davcna" class="form-group" required>
		</div>
		<input type="submit" name="submit">
	</form>
</div>

<?php
	if(isset($_POST['submit'])) {

		if(empty($_POST['naziv']) && empty($_POST['ulica']) && empty($_POST['kraj']) && 
			empty($_POST['posta']) && empty($_POST['postnaStevilka']) && empty($_POST['drzava'])
			&& empty($_POST['email']) && empty($_POST['telefon']) && empty($_POST['davna'])) {

			if(strlen($_POST['naziv']) < 3) {
				$errors[] = 'Naziv mora vsebovati vsaj tri črke';
			}
			
			if (!preg_match("#[a-zA-Z]+#", $_POST['naziv'])) {
				$errors[] = 'V nazivu so dovoljene samo črke';
			}

			if (!preg_match("#[0-9]+#", $_POST['ulica'])) {
				$errors[] = 'Manjka hišna številka';
			}
			
			if (!preg_match("#[a-zA-Z]+#", $_POST['kraj'])) {
				$errors[] = 'Kraj mora vsebovati samo črke';
			}
			
			if (!preg_match("#[0-9]+#", $_POST['postnaStevila'])) {
				$errors[] = 'Pri poštni številki so dovoljene le številke';
			}
			
			if(streln($_POST['postnaStevilka']!=4)) {
				$errors[] = 'Pri poštni številki so dovoljene 4 številke';
			}

			if (!preg_match("#[0-9]+#", $_POST['telefon'])) {
				$errors[] = 'Vnešena telefonska številka ni veljavna';
			}
			
			if (strlen($_POST['telefon'])!=9) {
				$errors[] = 'Vnešena telefonska številka ni veljavna';
			}
			
			if (strlen($_POST['davcna'])!=8) {
				$errors[] = 'Vnešena davčna številka ni veljavna';
			}
			
			if (!preg_match("#[0-9]+#", $_POST['davcna'])) {
				$errors[] = 'Vnešena davčna številka ni veljavna';
			}
			
			else {
				$errors[] = 'Vnesi podatke';
			}
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
			$davcna = $_POST['davcna'];
			$podatki = array('naziv'=> $naziv, 'email'=>$email, 'kraj'=>$kraj, 'ulica'=>$ulica, 'posta'=>$posta, 'postnaStevilka'=>$postnaStevilka, 'telefon'=>$telefon, 'drzava'=>$drzava, 'davcna'=>$davcna);
			if(dodajPoslovalnica($podatki) == false) {
				$errors[] = 'Prišlo je do napake.';
			}
		}

		print_r($errors);	
	}
?>