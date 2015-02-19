<?php include 'includes/glava.php'; ?>
<div class="prijava">
	<form method="post">
		<div class="form-field">
			<label>Email</label>
			<input type="email" name="email" class="form-field" required>
		</div>
		<div class="form-field">
			<label>Geslo</label>
			<input type="password" name="geslo" class="form-field" required>
		</div>
		<div class="form-field">
			<input type="submit" name="submit" value="Prijava">
		</div>
	</form>
</div>
<?php
$errors = array();
if(isset($_POST['submit'])) {
	if(empty($_POST['email']) == false && empty($_POST['geslo']) == false) {
		$email = $_POST['email'];
		$geslo = sha1($_POST['geslo']);
		if($login = vpis($email, $geslo)) {
			$_SESSION['uporabnikID'] = $login;
			header('Location: index.php');
			exit();
		}
		else {
			$errors[] = 'E-Naslov ali geslo sta napačna';
		}
	}
	else {
		$errors[] = 'Vnesi podatke';
	}
	print_r($errors);
}


?>
<?php include 'includes/noga.php'; ?>