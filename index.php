<?php include 'includes/glava.php'; 
$hotel = vsiHoteli();
?>
<div class="prva">
<div class="iskanje1">
	<form method="get">
		<div class="form-group">
			<label>Išči po kraju</label>
			<input type="text" name="kraj" class="form-field">
		</div>
		<div class="form-group">
			<label>Išči po številu zvezdic</label>
			<input type="text" name="zvezdice" class="form-field">
		</div>
	</form>
</div>
<div class="hoteli">
	<h3>Vsi hoteli</h3><hr>
	<div class="content">
	<?php
	foreach($hotel as $el){
		echo '<div class="box"><img src="http://placekitten.com/g/150/110">';
		echo '</div>';
	}

	?>
	</div>
</div>
</div>
<?php include 'includes/noga.php'; ?>