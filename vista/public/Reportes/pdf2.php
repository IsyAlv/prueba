<?php
include "../../../modelo/BD/config.php";
include "../../../modelo/BD/dataBase.php";

$dbname = new DataBase();
$query = "SELECT * FROM tbl_producto";
$read = $dbname->select($query);

ob_start(); // Iniciar el búfer de salida
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="Introduccion al lenguaje Php">
  <title>Resultado</title>
<link rel="stylesheet" type="text/css" href="../../assets/bootstrap/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="../../assets/dataTableV/jsTables/vanilla-dataTables.min.css">
 <link rel="stylesheet" href="../../assets/css/animaciones.css">
 <link rel="stylesheet" href="../../assets/css/fondo.css">
</head>
<body>

<table class="table table-hover table-striped"  border='1' id="tabla">

	 <h3 class="text-light bg-dark text-center">REPORTE DE LISTA DE PRODUCTOS FARMACIA ELYSIUM</h3>
	  <?php
	   echo $DateAndTime=date('d-m-Y h:i:s',time())
	  ?>
            <thead>
              <tr class="text-light bg-dark text-center">
                <th scope="col">id_producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Categoria</th>
                <th scope="col">Proveedor</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($read as $row) {?>
              <tr>
              <td style="text-align:center;"><?php echo $row['id_producto'];?></td>
              <td class="bg-light text-uppercase"><?php echo $row['nombre'];?></td>
              <td style="text-align:center;"><?php echo $row['cantidad'];?></td>
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
     
              <?php } ?>
            </tr>
            </tbody>
          </table> 
</body>
</html>
<?php
$html = ob_get_clean(); // Obtener el contenido del búfer y limpiarlo

require_once '../../assets/libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$dompdf->loadHtml($html);

$options = $dompdf->getOptions();
$options->set(array('isHtml5ParserEnabled' => true));
$dompdf->setOptions($options);

$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream("archivo.pdf", array("attachment" => true));
?>

