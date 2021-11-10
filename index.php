<?php session_start(); ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
  
    <title>CRUD, MONGODB</title>
<script type="text/javascript">
  var TableProductos = document.querySelector("#TableProductos");
	var dataTable = new DataTable(TableProductos,{
		labels: {
    placeholder: "Buscar Producto...",
    perPage: "Mostrar {select} productos por página",
    noRows: "No hay productos para mostrar",
    info: "Mostrando {start} al {end} de {rows} productos (Página {page} de {pages} páginas)",
		},
	});
</script>
  </head>
  <body>
  	<div class="text-center text-white bg-primary">
  		<h1>CRUD, PHP & MONGODB</h1>
  	</div>
    
    <div class="container">
        <div class="card">
		      <div class="card-body">
		      	<a href="create.php" class="btn btn-success">AGREGAR</a>
		        <div class="table-responsive">
		        	<table class="table table-striped" style="font-family: bellota; font-size: 14px;" id="TableProductos">
		        	  <caption>Lista de Medicamentos</caption>
		        	  <thead class="thead-dark">
		        	    <tr>
		        	      <!-- <th>#</th> -->
		        	      <th>Codigo</th>
		        	      <th>Nombre</th>
		        	      <th>Concent</th>
		        	      <th>Forma</th>
		        	      <th>Forma Simplif</th>
		        	      <th>Presentacion</th>
		        	      <th>Vcto. Reg. Sant</th>
		        	      <th>RegSant</th>
		        	      <th>Titular</th>
		        	      <th></th>
		        	    </tr>
		        	  </thead>
		        	  <tbody>
		        	    <?php 
		        	    	require 'config.php';
		        	    	$collection = $database->productos; //Selección de colección

		        	    	$result = $collection->find();
		        	    	foreach ($result as $producto){ ?>

		        	    		<tr>
		        	    			<td><?php echo $producto['Cod_Prod']; ?></td>
		        	    			<td><?php echo $producto['Nom_Prod']; ?></td>
		        	    			<td><?php echo $producto['Concent']; ?></td>
		        	    			<td><?php echo $producto['Nom_Form_Farm']; ?></td>
		        	    			<td><?php echo $producto['Nom_Form_Farm_Simplif']; ?></td>
		        	    			<td><?php echo $producto['Presentac']; ?></td>
		        	    			<td><?php echo $producto['Fec_Vcto_Reg_Sanitario']; ?></td>
		        	    			<td><?php echo $producto['Num_RegSan']; ?></td>
		        	    			<td><?php echo $producto['Nom_Titular']; ?></td>
		        	    			<td nowrap>
		        	    				<a href="edit.php?id=<?php echo $producto["_id"];?>" class="waves-effect"><i class="bi bi-pencil-square"></i></a>
						      				<a href="delete.php?id=<?php echo $producto["_id"];?>" class="waves-effect EliminarProd"><i class="bi bi-trash text-danger"></i></a>
		        	    			</td>	
		        	    		</tr>

		        	    	<?php } 
		        	    ?>
		        	  </tbody>
		        	</table>
		        </div>
		      </div>
	    </div>
    </div>
    
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>


