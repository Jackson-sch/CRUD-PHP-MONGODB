<?php session_start();
  
  if (isset($_POST['submit'])) {
    require_once 'config.php';
    $collection = $database->productos; //Selección de colección
    $insertOneResult = $collection->insertOne([
      'Cod_Prod' => $_POST['Cod_Prod'],
      'Nom_Prod' => $_POST['Nom_Prod'],
      'Concent' => $_POST['Concent'],
      'Nom_Form_Farm' => $_POST['Nom_Form_Farm'],
      'Nom_Form_Farm_Simplif' => $_POST['Nom_Form_Farm_Simplif'],
      'Presentac' => $_POST['Presentac'],
      'Fracciones' => $_POST['Fracciones'],
      'Fec_Vcto_Reg_Sanitario' => $_POST['Fec_Vcto_Reg_Sanitario'],
      'Num_RegSan' => $_POST['Num_RegSan'],
      'Nom_Titular' => $_POST['Nom_Titular'],
    ]);
    $_SESSION['success'] = "Producto ingresado correctamente";
    header("Location: index.php");
  }
  


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--============================
  =            jQuery            =
  =============================-->
  <script src="assets/Jquery/jquery-3.6.0.min.js"></script>
  <!--====  End of jQuery  ====-->
 
<!--=============================
  =            Select2            =
  ==============================-->
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
  
  <!--====  End of Select2  ====-->

    <title>CRUD, MONGODB</title>
  </head>
  <body>
    <div class="text-center text-white bg-primary">
      <h1>CRUD, PHP & MONGODB</h1>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">AGREGAR MEDICAMENTO </h5>

              </div>
              <div class="card-body">
                <form action="" method="POST">
                  <div class="row g-3">
                    <div class="col-md-2">
                      <label for="Cod_Prod" class="form-label">Código</label>
                      <input type="text" class="form-control" name="Cod_Prod" required>
                    </div>
                    <div class="col-md-4">
                      <label for="Nom_Prod" class="form-label">Nombre Producto</label>
                      <input type="text" class="form-control" name="Nom_Prod" required>
                    </div>
                    <div class="col-md-4">
                      <label for="Nom_Form_farm" class="form-label">Forma Farmacéutica</label>
                      <div class="input-group">
                      <select class="form-select form-select-lg" name="Nom_Form_Farm">
                        <option>Seleccionar Opción</option>
                        <?php 
                        require_once "config.php";
                          $collection = $database->FormaFarmac; //Selección de colección
                          $res = $collection->find();
                          foreach ($res as $formaf){ ?>
                            <option value="<?php echo $formaf->FORMA_FARMACEUTICA; ?>"><?php echo $formaf->FORMA_FARMACEUTICA; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-md-2">
                      <label for="Nom_Form_farm_Simpl" class="form-label">F.F. Simplificada</label>
                      <select class="form-select" name="Nom_Form_Farm_Simplif">
                        <option>seleccionar Opción</option>
                        <?php 
                          $collection = $database->FormaFarmac; //Selección de colección
                          $res = $collection->find();
                          foreach ($res as $formas){ ?>
                            <option value="<?php echo $formas->FORMA_SIMPLIFICADA; ?>"><?php echo $formas->FORMA_SIMPLIFICADA; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label for="Concent" class="form-label">Concentración</label>
                      <input type="text" class="form-control" name="Concent" required>
                    </div>
                    <div class="col-md-2">
                      <label for="Presentac" class="form-label">Presentación</label>
                      <input type="text" class="form-control" name="Presentac" required>
                    </div>
                    <div class="col-md-2">
                      <label for="Fec_Vcto_Reg_Sanitario" class="form-label">Fecha V.R Sanitario</label>
                      <input type="date" class="form-control" name="Fec_Vcto_Reg_Sanitario" required>
                    </div>
                    <div class="col-md-2">
                      <label for="Num_RegSan" class="form-label">N° Registro Sanitario</label>
                      <input type="text" class="form-control" name="Num_RegSan" required>
                    </div>
                    <div class="col-md-4">
                      <label for="Nom_Titular" class="form-label">Laboratorio</label>
                      <div class="input-group">
                      <select class="form-select" name="Nom_Titular">
                        <option>Seleccionar Opción</option>
                        <?php 
                          $collection = $database->laboratorio; //Selección de colección
                          $laboratorio = $collection->find();
                          foreach ($laboratorio as $lab){ ?>
                            <option value="<?php echo $lab->LABORATORIO; ?>"><?php echo $lab->LABORATORIO; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="col-auto float-end">
                      <button type="submit" name="submit" class="btn btn-success">Guardar</button>
                      <a href="index.php" class="btn btn-danger">CANCELAR</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      $('.form-select').select2({
        theme: "bootstrap-5",
        placeholder: 'Selecciona una opción'
      });
    </script> 
  </body>
</html>