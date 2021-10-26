<?php 

	  require_once 'config.php';
	  $collection = $database->productos;

	  if (isset($_GET['id'])) {
	    $producto = $collection->findOne(['_id' => new MongoDB\BSON\ObjectId($_GET['id'])]);
	  }
	
	    $collection->deleteOne(
	      ['_id' => new MongoDB\BSON\ObjectId($_GET['id'])]);
	    $_SESSION['success'] = "Producto actualizado correctamente";
	    header("Location: index.php");
	  


?>