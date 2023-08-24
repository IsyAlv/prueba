<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";
$dbname=new DataBase();
$query="SELECT * FROM usuario";
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
 <link rel="stylesheet" href="../assets/css/animaciones.css">
 <link rel="stylesheet" href="../assets/css/fondo.css">
</head>
<body>
  <section class="container bg-light mt-5 p-4 rounded fade-in">
 <main class="row my-4">
 		<div class="col-lg-12">
 			<nav class="navbar navbar-expand-lg">
 				<div class="container-fluid">
 					<a class="navbar-brand text-danger fw-semibold fs-4" href="resultado.php">Lista de usuarios</a>
 					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"> 
 						<span class="navbar-toggler-icon"></span>
 					</button>
 					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
 					<a class="nav-link active" aria-current="page" href="registrar.php">Registrar Usuarios</a>
          <a class="nav-link" href="../../index.php">Cerrar Cuenta</a>
 					</div>
 				</div>
 			</div>
 		</nav>
 		<?php 
 		if(isset($_GET['msg'])){
      date_default_timezone_set('America/La_Paz');
      echo "<div class='alert alert-primary fw-bold fst-italic text-end'><span>".$_GET['msg']."<br>Fecha:".date("d-m-Y")." Hora: ".date("h:i:s")."</span></div>";
         }
         ?>
         	<table class="table table-hover">
         		<thead>
         			<tr class="text-light bg-dark text-center">
         				<th scope="col">id_usuario</th>
         				<th scope="col">Apellidos Paterno</th>
         				<th scope="col">Apellidos materno</th>
         				<th scope="col">Nombres</th>
         				<th scope="col">Correo</th>
         				<th scope="col">Cargo</th>
                <th scope="col">Foto</th>
                <th scope="col">Accion</th>	
         			</tr>
         		</thead>
         		<tbody class="text-center">
         			<?php foreach ($read as $row) {?>
              <tr>
         			<td class="bg-light text-uppercase"><?php echo $row['Id_usuario'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['apaterno'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['amaterno'];?></td>
         			<td class="bg-light text-uppercase"><?php echo $row['nombres'];?></td>
         			<td class="bg-light"><?php echo $row['usuario'];?></td>
         			<td class="bg-light text-success fw-semibold fst-italic"><?php 
              switch ($row['id_cargo_fk']) {
                case 1:
                  echo"Administrador";
                  break;
                  case 2:
                  echo"Colaborador";
                  break; 
                  case 3:
                  echo"Invitado";
                  break;
                default:
                  echo 'No existe dato';
                  break;
              }
            ?></td>
            <td class="bg-light"><?php if($row['foto'] !=NULL){?>
              
              <img class="img-thumbnail" width="100px" src="../assets/img/foto/<?php echo $row['foto']; ?>"><?php

                                        }else{
                                          echo "<img src='../assets/img/ESTRELLITA.jpg' class='img-fluid img-thumbnail' width=100>";

                                        }?></td>
              
         		<td class="bg-light text-uppercase"><a href="actualizaPersonal.php?Id_usuario=<?php echo urlencode($row['Id_usuario']);?>" class="btn btn-primary btn-sm">Editar</a></td>
         			<?php } ?>
         		</tr>
         			
         		</tbody>
         	</table>	
 	</div>
 	
 </main>
 </section>
<script type="../vista/bootstrap/js/bootstrap.min.css"></script>
</body>
</html>

