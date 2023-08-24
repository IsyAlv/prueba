<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";
$dbname=new DataBase();
$query="SELECT * FROM tbl_producto";
$read =$dbname->select($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="Introduccion al lenguaje Php">
  <title>Resultado</title>
<link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../assets/dataTableV/jsTables/vanilla-dataTables.min.css">
  <script src="../assets/dataTableV/jsTables/vanilla-dataTables.min.js"></script>
 <link rel="stylesheet" href="../assets/css/animaciones.css">
 <link rel="stylesheet" href="../assets/css/fondo.css">
</head>
<body>
  <section class="container bg-light mt-5 p-4 rounded fade-in">
 <main class="row my-4">
    <div class="col-lg-12">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand text-danger fw-semibold fs-4" href="../resultado.php">Lista de productos</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="registrar_producto.php">Registrar productos</a>
          <a class="nav-link" href="../../index.php">Cerrar Cuenta</a>
          </div>
        </div>
      </div>
    </nav>
    <a href="Reportes/excel.php" class="btn btn-success mb-3">Reporte excel</a>
     <a href="Reportes/pdf2.php" class="btn btn-primary mb-3">Reporte pdf</a>
    <?php 
    if(isset($_GET['msg'])){
      date_default_timezone_set('America/La_Paz');
      echo "<div class='alert alert-primary fw-bold fst-italic text-end'><span>".$_GET['msg']."<br>Fecha:".date("d-m-Y")." Hora: ".date("h:i:s")."</span></div>";
         }
         ?>
          <table class="table table-hover table-striped" id="tabla">
            <thead>
              <tr class="text-light bg-dark text-center">
                <th scope="col">id_producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Categoria</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Accion</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($read as $row) {?>
              <tr>
              <td class="bg-light text-uppercase"><?php echo $row['id_producto'];?></td>
              <td class="bg-light text-uppercase"><?php echo $row['nombre'];?></td>
              <td class="bg-light text-uppercase"><?php echo $row['cantidad'];?></td>
              <td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_categoria']) {
                case 1:
                  echo"Inyectables";
                  break;
                  case 2:
                  echo"Anticepticos";
                  break; 
                  case 3:
                  echo"Sueros";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>
             <td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_proveedor']) {
                case 1:
                  echo"INTI";
                  break;
                  case 2:
                  echo"BAGO";
                  break; 
                  case 3:
                  echo"COFAR";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>
            <td class="bg-light text-uppercase"><a href="actualizar_producto.php?id_producto=<?php echo urlencode($row['id_producto']);?>" class="btn btn-primary btn-sm">Editar</a></td>
              <?php } ?>
            </tr>
              
            </tbody>
          </table>  
  </div>
  
 </main>
 </section>
  <script>
   var tabla= document.querySelector("#tabla");
   var dataTable=new DataTable(tabla);
 </script>
<script type="../assets/js/bootstrap.min.js"></script>
</body>
</html>
