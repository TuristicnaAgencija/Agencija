<?php include 'includes/glava.php'; 
if(isset($_GET['hotelID'])){
	$data = podatkiHotel($_GET['hotelID']);
	if(empty($data)) {
		echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
		die();
	}
}
else {
	echo '<h1>Napaka prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
?>
<div class="hotel">
	<div class="galerija">
		<h1 style="left:50%; transform:translate(-50%,0); font-size:2em;color:#fff;position:absolute;"><?php echo $data['naziv'].' ';?>
		<?php foreach(range(1, $data['zvezdice']) as $i):?>
		<i class="fa fa-star" style="font-size:0.5em;vertical-align:top;"></i>
	<?php endforeach; ?>
		</h1>
		<img src="http://placekitten.com/g/1170/400">
	</div>
	<div class="slike">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
		<img src="https://placekitten.com/g/150/150">
	</div>
	<div class="podrobnosti">
		<span class="levo">
			<h4 style="margin:0px; padding:0;">Osnovni podatki</h4><hr>	
			<?php echo $data['naziv']. '<br>'.$data['ulica'].'<br>'.$data['postnaStevilka'].' '.$data['posta'].'<br>'. $data['kraj']. '<br>'. $data['email']. '<br>'. $data['telefon'];?>
			<br><br>Število sob<br>
			Število prostih sob<br>
			Valuta<br>
			<br>
			Cena<br>
			select min from sobe<br><br>
			Check-in: 16:00<br>
			Check-out: 10:00
		</span>
		<span class="desno">
			<h4 style="margin:0px;padding:0;">Dodatne informacije</h4>
			<hr>
			<?php 
			echo '<b>Spletna stan:</b> <a href="'.$data['url'].'">'.$data['url'].'</a><br><b>Wi-Fi:</b> '.$data['wifi'].'<br><b>Zajtrk:</b> '.$data['zajtrk'].'<br><b>Kosilo:</b> '.$data['kosilo'].'<br><b>Vecerja:</b> ' .$data['vecerja']
			.'<br><b>Bar:</b> '.$data['bar'].'<br><b>Terasa:</b> '.$data['terasa'].'<br><b>Igralnica:</b> '.$data['igralnica'].'<br><b>Promet:</b> '.$data['promet'];
			?>
			<br>Parkirisče<br>
			Dodatni prostoi<br>
			Prostor<br>
			Prostor<br>
			Prostor<br>
		</span>
	</div>
	<div class="rezerviraj">
		<a href="rezervacija.php?hotelID=<?php echo $data['hotelID'];?>">Rezerviraj</a>
		<a href="" class="kappa">Ali pa se posvetujte z enem izmed agentov</a>
	</div>
</div>

<?php include 'includes/noga.php'; ?>