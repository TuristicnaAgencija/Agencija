<!--Cigale-->
<?php include 'includes/glava.php'; 
if(isset($_GET['agencijaID'])) {
	$data = podatkiAgencija($_GET['agencijaID']);
	$agentje = podatkiAgentje($_GET['agencijaID']);
}
else {
	echo '<h1>Napaka, prosimo vrnite se na prejšnjo stran</h1>';
	die();
}
?>
<div class="agencija">
	<div class="informacij">
	<h2>Informacije</h2>
	<?php
	echo $data['naziv'].'<br>';
	echo $data['ulica'].'<br>';
	echo $data['kraj'].'<br>';
	echo $data['postnaStevilka'].'<br>';
	echo $data['posta'].'<br>';
	echo $data['drzava'].'<br>';
	echo $data['email'].'<br>';
	echo $data['telefon'].'<br>';
	echo $data['fax'];
	echo $data['url'].'<br>';
	echo $data['davcna'];
	?>
		
	</div>
	<div class="agentje">
		<h2>Naši agentje</h2>
		<div class="content">
			<?php
			foreach($agentje as $el) {
				echo $el['ime'].' '.$el['priimek']. '<br>';
				echo $el['email'].'<br>';
				echo $el['telefon'].'<br>';
				echo $el['ocenaAgenta'].'<br><br>';
			}

			?>
		</div>
	</div>
</div>

<?php include 'includes/noga.php'; ?>