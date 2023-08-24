<?php
include "../../controlador/sesion.php";
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";

$rol_sesion=$_GET['rol_sesion'];/*obteniendo el id enviado desde signIn*/
$dbname=new DataBase();
/*************************************/
/*obteniendo el apellido del usuario*/
$rol_query="SELECT apaterno
            FROM usuario
            WHERE id_usuario='$rol_sesion'";

 $read = $dbname->select($rol_query);
 foreach ($read as $row) {
 $apaterno=($row['apaterno']);
 }
/*******************************************************/
/*******************************************************/
/*OBTENER EL ROL DEL USUARIO*/
$rol_grado="SELECT nombre_cargo
            FROM cargo
            WHERE id_cargo_fk='$rol_sesion'";
$read2= $dbname->select($rol_grado);
foreach ($read2 as $rows) {
$roles=($rows['nombre_cargo']);
}
/*******************************************************/
$titulo="Curso DPW-II, Proyecto SEGUNDA ETAPA";
$subtitulo1="Nomre del proyecto: ";
$Parrafo="Debes de colocar el titulo qu ellevara tu proyecto final, evidentemente el titulo empezara a mejorar seun vayas avanzando tu propuesta. ";
$subtitulo2="Objetivo General del Proyecto: ";
$Parrafo2="Debe de colocar el objetivo general de tu propuesta qu estas enmarcando en taller de grado";
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
	<section class="container-fluid bg-light mt-5 p-4 rounded fade-in">
	<nav class="navbar navbar-expand-lg bg-light border border-info border rounded mb-3">
   <div class="container-fluid">
	<a class="navbar-brand fs-3 text-dark fw-semibold" href="presentacion.php?rol_sesion=<?php echo $rol_sesion;?>">Nombre Sistema</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
     	<span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarText">
     	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
     	<li class="nav-item boton"><a class="nav-link active text-dark lead" aria-current="page" href="presentacion.php?rol_sesion=<?php echo $rol_sesion;?>">INICIO</a></li>
<li class="nav-item boton"><a class="nav-link text-dark lead" href="registrar.php?rol_sesion=<?php echo $rol_sesion;?>">REGISTRAR</a></li>
<li class="nav-item boton"><a class="nav-link text-dark lead" href="resultado.php?rol_sesion=<?php echo $rol_sesion;?>">MOSTRAR LISTA</a></li>
     	<li class="nav-item boton"><a class="nav-link text-dark lead" href="../../logout.php">SALIR DE SISTEMA</a></li>
     	</ul>
     	<span class="navbar-text">
     		<a class="navbar-brand" href="presentacion.php?rol_sesion=<?php echo $rol_sesion;?>">
     			<img src="../assets/img/ESTRELLITA.jpg" class="img-fluid align-content-md-around" alt="" width="40" height="40"/> 
     			<span class="px-2 text-light text-dark fst-italic">Bienvenido: <?php echo $apaterno." - ".$roles; ?></span>
     		</a>
     	</span>
     </div>
	</div>
</nav>
<main class="row">
	<div class="col-sm-12 col-md-12 col-lg-6"> 
		<article class="mt-5" style="text-align: justify;">
			<h3 class="display-4 text-uppercase text-center font-weight-bold"><?php echo $titulo; ?></h3>
            <hr class="mb-5">
			<h4 class="text-uppercase text-danger font-italic"><?php echo $subtitulo1; ?></h4>
			<p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo;  ?></p>
			<h4 class="text-uppercase text-danger font-italic"><?php echo $subtitulo2; ?></h4>
			<ul class="list-group list-group-flush">
	<li class="list-group-item bg-transparent"><p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo2; ?></p></li>
	<li class="list-group-item bg-transparent"><p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo2; ?></p></li>
	<li class="list-group-item bg-transparent"><p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo2; ?></p></li>
	<li class="list-group-item bg-transparent"><p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo2; ?></p></li>
	<li class="list-group-item bg-transparent"><p class="lead text-justify font-weight-bold font-italic"><?php echo $Parrafo2; ?></p></li>
</ul>
</article>
</div>
<div class="col-sm-12 col-md-12 col-lg-6">
	<center>
		<figure class="figure">
			<img src="../assets/img/ESTRELLITA.jpg" class="figure-img img-fluid rounded img-thumbnail" alt="...">
			<figcaption class="figure-caption text-end">...</figcaption>
			
		</figure>
		
	</center>
	
</div>
	
</main>
		
	</section>
	
</body>
