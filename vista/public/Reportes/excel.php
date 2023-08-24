<?php
include "../../../modelo/BD/config.php";
include "../../../modelo/BD/dataBase.php";

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");

header("Content-Disposition: attachment; filename=lista-usuarios.xls");

$dbname=new DataBase();
$query="SELECT * FROM tbl_producto";
$read =$dbname->select($query);
?>

<table class="table table-hover table-striped"  border='1' id="tabla">

	 <h2 class="text-light bg-dark text-center">REPORTE DE LISTA DE PRODUCTOS FARMACIA ELYSIUM</h2>
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
     
              <?php } ?>
            </tr>
              
            </tbody>
          </table>  

