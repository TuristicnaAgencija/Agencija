<?php include 'includes/glava.php'; 
?>
<div class="prva">
<div class="iskanje1">
	<form method="get" action="index.php" autocomplete="off">
		<div class="form-group">
			<label>Išči po kraju</label>
			<input type="text" name="kraj" id="kraj" class="form-field" placeholder="Vnesi želen kraj">
		</div>
		<div class="form-group">
			<input type="submit" value="Iskanje">
		</div>
	</form>
	<form method="get">
		<div class="form-group">
			<label>Išči po številu zvezdic</label>
			<select name="zvezdice" class="form-field" style="height:auto">
			<option value="">Izberi</opion>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			</select>
		</div>
		<div class="form-group">
			<input type="submit" value="Iskanje">
		</div>
	</form>
</div>
<div class="hoteli">
	<h3>Vsi hoteli</h3><hr>
	<div class="content">
	<?php
	if(isset($_GET['zvezdice'])) {
		$hotel = vsiHoteliZvezdice($_GET['zvezdice']);
		foreach($hotel as $el){
			echo '<div class="box" style="margin-top:-10px;"><img src="http://placekitten.com/g/150/110">';
			echo '<span class="row1">';
			echo '<b>'.$el['naziv'].'</b><br>'.$el['kraj'].'<br>'.$el['ulica'].'<br>'.$el['posta'].'<br>'.$el['postnaStevilka'];
			echo '</span><a class="gumb" href="hotel.php?naziv='.$el['naziv'].'">Podrobnosti <i class="fa fa-arrow-right"></i></a></div>';
		}
	}
	else if (isset($_GET['kraj'])) {
		$hotel = vsiHoteliKraj($_GET['kraj']);
		foreach($hotel as $el){
			echo '<div class="box" style="margin-top:-10px;"><img src="http://placekitten.com/g/150/110">';
			echo '<span class="row1">';
			echo '<b>'.$el['naziv'].'</b><br>'.$el['kraj'].'<br>'.$el['ulica'].'<br>'.$el['posta'].'<br>'.$el['postnaStevilka'];
			echo '</span><a class="gumb" href="hotel.php?naziv='.$el['naziv'].'">Podrobnosti <i class="fa fa-arrow-right"></i></a></div>';
		}
	}
	else {
		$hotel = vsiHoteli();
		foreach($hotel as $el){
			echo '<div class="box" style="margin-top:-10px;"><img src="http://placekitten.com/g/150/110">';
			echo '<span class="row1">';
			echo '<b>'.$el['naziv'].'</b><br>'.$el['kraj'].'<br>'.$el['ulica'].'<br>'.$el['posta'].'<br>'.$el['postnaStevilka'];
			echo '</span><a class="gumb" href="hotel.php?naziv='.$el['naziv'].'">Podrobnosti <i class="fa fa-arrow-right"></i></a></div>';
		}
	}
	?>
	</div>
</div>
</div>
<script src="js/iskanje1.js" type="text/javascript"></script>
<?php include 'includes/noga.php'; ?>