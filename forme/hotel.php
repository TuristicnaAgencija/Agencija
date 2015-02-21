<div class="dodajHotel">
	<form method="post">
		<div class="form-group">
			<label>Naziv</label>
			<input type="text" name="naziv" class="form-field"><br/>
			<label>Kraj</label>
			<input type="text" name="kraj" class="form-field"><br/>
			<label>Ulica</label>
			<input type="text" name="ulica" class="form-field"><br/>
			<label>Pošta</label>
			<input type="number" name="posta" class="form-field"><br/>
			<label>Država</label>
			<select name="drzava" class="form-field">
				<?php
					$drzave = array();
					$drzave = drzave();
					foreach ($drzave as $k => $drzava) {
						echo '<option value="'.$drzava["drzavaID"].'" class="form-field">'.$drzava["naziv"].'</option>';
					}
				?>
			</select><br/>
			<label>Število zvezdic</label>
			<input type="radio" name="zvezdice" value="1" class="form-field">1 
			<input type="radio" name="zvezdice" value="2" class="form-field">2 
			<input type="radio" name="zvezdice" value="3" class="form-field">3 
			<input type="radio" name="zvezdice" value="4" class="form-field">4 
			<input type="radio" name="zvezdice" value="5" class="form-field">5 <br/>
			<label>E-mail</label>
			<input type="email" name="email" class="form-field"><br/>
			<label>Telefonska številka</label>
			<input type="text" name="telefon" class="form-field"><br/>
			<label>Internetni naslov</label>
			<input type="text" name="url" class="form-field"><br/>
			<label>Plačilo</label>
			<input type="text" name="placilo" class="form-field"><br/>
			<label>Valuta</label>
			<input type="text" name="valuta" class="form-field"><br/>
			<label>Lastnik</label>
			<input type="number" name="lastnik" class="form-field"><br/>
		</div>
		
	</form>
</div>