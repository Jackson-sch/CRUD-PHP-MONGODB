<?php 

	require_once __DIR__ . '/vendor/autoload.php';
	// $collection = (new MongoDB\Client)->interacciones->productos;

	// Conexión especificando host y puerto
	// $connection = new MongoDB\Client('mongodb://localhost:27017');

	$connection = new MongoDB\Client('mongodb+srv://admin:admin123@cluster0.32pgj.mongodb.net/myFirstDatabase?retryWrites=true&w=majority');
	$database = $connection->interacion;
?>