<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";
/*======REGISTRAR PRODUCTOS======*/
$dbname=new DataBase();
if(isset($_POST['submit'])){
  $nombre =mysqli_real_escape_string($dbname->link, $_POST['nombre']);
  $cantidad =mysqli_real_escape_string($dbname->link, $_POST['cantidad']); 
  $precio =mysqli_real_escape_string($dbname->link, $_POST['precio']);
  $id_categoria =mysqli_real_escape_string($dbname->link, $_POST['id_categoria']);
  $id_proveedor =mysqli_real_escape_string($dbname->link, $_POST['id_proveedor']);

  if($nombre==''|| $cantidad==''|| $precio==''|| $id_categoria==''|| $id_proveedor==''){
    header('Location:registrar_producto.php?msg='.urldecode('Debe llenar los campos'));
  } else{
    /*ENCRIPTADO LA CONTRASEÑA*/
    $pass_cifrado=password_hash($password, PASSWORD_DEFAULT);/*encriptado contraseña*/
    $fecha = new DateTime();

 $query="INSERT INTO tbl_producto(nombre, cantidad, precio, id_categoria,id_proveedor)
    VALUES('$nombre', '$cantidad', '$precio', '$id_categoria','$id_proveedor')";
    $create=mysqli_insert_id($dbname->registerprod($query));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="registro">
  <title>Formulario para registrar</title>
 <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vista/assets/css/fondo.css">
  <link rel="stylesheet" href="vista/assets/css/animaciones.css">
</head>
<body>
 <!--Estructura de la pagina-->
 <main class="container mt-5 fade-in">
  <!--Columnas para Bootstrap-->
  <div class="row bg-ligt rouded p-3">
    <!--NAMBAR-->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="registrar.php"><img src="../assets/img/ESTRELLITA.jpg" alt="" width="40" height="40"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar nav">
            <li class="nav-icon"><a class="nav-link active" aria-current="page" href="../../index.php">SALIR</a></li>
            <li class="nav-icon"><a class="nav-link "href="resultado_producto.php">MOSTRAR LISTA</a></li>
          </ul>
        </div>
      </div>
    </nav>
<!--FIN NAVBAR-->
<!--PRESENTACION DEL TEMA DE PROYECTO-->
<div class="col-sm-12 col-md-12 col-lg-6 float-left my-5">
  <img src="../svg/xcomputadora.svg" class="img-fluid" alt="">
</div>
<!--FIN DE PRESENTACION DE PROYECTO-->
<!--COLUMNA DEL FORMULARIO REGISTRO DATOS-->

  <p class="display-5 fw-semibold text-uppercase text-center">FORMULARIO DE REGISTRO DE PRODUCTOS</p>
  <!--FORMULARIO DE REGISTRO-->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 p-3 rounded needs-validation" novalidate method="POST" enctype="multipart/form-data"> <!--atributo que permite trabajar con archivos-->
    <?php
    if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
      echo"<center><div class='alert alert-danger fw-bold fst-italic'><span>" .$_GET['msg'] ."</span></div></center>";
    }
    ?>
    <div class="col-md-6">
       <p class="form-label">Nombre del producto</p>
      <input type="text" class="form-control" id="nombre" name="nombre" required placeholder="Nombre del producto">
    </div>
      <div class="col-md-3">
       <p class="form-label">Cantidad de Producto</p>
      <input type="text" class="form-control" id="cantidad" name="cantidad" required placeholder="Cantidad del producto">
    </div>
      <div class="col-md-3">
         <p class="form-label">Precio del producto</p>
      <input type="text" class="form-control" id="precio" name="precio" required placeholder="Precio del producto">
    </div>

     <div class="col-md-3">
      <label class="mb-1">Seleccionar la categoria</label>
    <select class="form-select has-validation" aria-label="default select example" id="id_categoria" name="id_categoria" required>
         <option selected></option>
         <option value="1" class="lead">Inyectables</option>
         <option value="2" class="lead">Anticepticos</option>
         <option value="3" class="lead">Sueros</option>
       </select>
      </div>

   <div class="col-md-3">
      <label class="mb-1">Seleccionar el Proveedor</label>
    <select class="form-select has-validation" aria-label="default select example" id="id_proveedor" name="id_proveedor" required>
         <option selected></option>
         <option value="1" class="lead">INTI</option>
         <option value="2" class="lead">BAGO</option>
         <option value="3" class="lead">COFAR</option>
       </select>
      </div>
      <div class="col-12">
      <button type="submit" name="submit" id="submit" class="btn btn-dark">Registrar</button>
      <span><a class="btn btn-success" href="registrar_producto.php">Limpiar Datos </a></span>
      </div>
  </form>
  <!--end FORMULARIO DE REGISTRO-->
</div>
  </div>
   
 </main>
 <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
