<?php

header('Content-Type: application/json');

if(!isset($_GET['query'])) {
	echo json_encode([]);
	exit();
}

$db = new PDO('mysql:host=127.0.0.1;dbname=agencija', 'root', '');

$hotel = $db->prepare(
	" SELECT hotelID, naziv, kraj
	  FROM hotel
	  WHERE kraj LIKE :query ");

$hotel ->execute([
	'query' => "{$_GET['query']}%"
	]);

echo json_encode($hotel->fetchAll());
?>