<?php include 'includes/glava.php'; ?>
<div class="agencije">
<h1>Seznam agencij</h1>
<hr>
<?php 
error_reporting(0);
$a = agencije1();
foreach($a as $el) {
	echo '<div class="agencija">';
	echo '<a href="agencija.php?agencijaID='.$el['agencijaID'].'"><img src="'.$el['slika'].'"></a><br><b>'.$el['naziv'].'</b><br>'.$el['ulica'].'<br>'.$el['kraj'].'<br>'.$el['postnaStevilka'].'<br>'.$el['posta'].'<br><br>';
	echo '</div>';
}
?>
</div>
<?php include 'includes/noga.php'; ?>