<!--Cigale-->
<?php include 'includes/glava.php'; 
if(isset($_GET['agencijaID']) && !empty($_GET['agencijaID'])) {
	$data = podatkiAgencija($_GET['agencijaID']);
	$agentje = podatkiAgentje($_GET['agencijaID']);
	if(empty($data)) {
		echo '<h1>Napaka, prosimo vrnite se na prejšnjo stran</h1>';
		die();
}
}
else {
	echo '<h1>Napaka, prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
?>
<div class="agencija">
<h1 style="text-align:center">Agencija - <?php echo $data['naziv']; ?></h1>
<hr>
	<div class="informacije">
	<h2 style="text-align:center">Informacije</h2>
	<hr>
	<?php
	echo $data['naziv'].'<br>';
	echo $data['ulica'].'<br>';
	echo $data['kraj'].'<br>';
	echo $data['postnaStevilka'].'<br>';
	echo $data['posta'].'<br>';
	echo $data['drzava'].'<br>';
	echo $data['email'].'<br>';
	echo $data['telefon'].'<br>';
	echo $data['fax'].'<br>';
	echo $data['url'].'<br>';
	echo $data['davcna'];
	?>
		
	</div>
	<div class="agentje">
		<h2 style="text-align:center">Naši agentje</h2>
		<hr>
		<div class="content" style="height:400px;">
			<?php
			foreach($agentje as $el) {
				echo '<div class="box">';
				echo '<img src="'.$el['slika'].'"><span class="row1">';
				echo $el['ime'].' '.$el['priimek']. '<br>';
				echo $el['email'].'<br>';
				echo $el['telefon'].'<br>';
				echo $el['ocenaAgenta'].'<br><br>';
				echo '</span></div>';
			}

			?>
		</div>
	</div>
</div>

<?php include 'includes/noga.php'; ?>