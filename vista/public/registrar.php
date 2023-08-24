<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";
/*======REGISTRAR USUARIO======*/
$dbname=new DataBase();
if(isset($_POST['submit'])){
  $nombres =mysqli_real_escape_string($dbname->link, $_POST['nombres']);
  $apaterno =mysqli_real_escape_string($dbname->link, $_POST['apaterno']); 
  $amaterno =mysqli_real_escape_string($dbname->link, $_POST['amaterno']);
  $usuario =mysqli_real_escape_string($dbname->link, $_POST['usuario']);
  $password =mysqli_real_escape_string($dbname->link, $_POST['password']);
  $foto=addslashes(file_get_contents($_FILES['foto']['tmp_name']));
  $id_cargo_fk =mysqli_real_escape_string($dbname->link, $_POST['id_cargo_fk']);

  if($nombres==''|| $apaterno==''|| $amaterno==''|| $usuario=='' || $password=='' || $foto==''|| $id_cargo_fk==''){
    header('Location:registrar.php?msg='.urldecode('Debe llenar los campos'));
  } else{
    /*ENCRIPTADO LA CONTRASEÑA*/
    $pass_cifrado=password_hash($password, PASSWORD_DEFAULT);/*encriptado contraseña*/
    $fecha = new DateTime();
    $nomArchivo =($foto!="")?$fecha->getTimestamp()."_".$_FILES['foto']['name']:"";
    $tmp_foto=$_FILES["foto"]["tmp_name"];
    $query="INSERT INTO usuario(nombres,apaterno, amaterno, usuario, password, foto, id_cargo_fk)
    VALUES('$nombres', '$apaterno', '$amaterno', '$usuario', '$pass_cifrado', '$nomArchivo', '$id_cargo_fk')";

    if($tmp_foto !=""){
      move_uploaded_file($tmp_foto, "../assets/img/foto/".$nomArchivo);/*mover la imagen hacia la ruta especificada en este caso lleva la imagen a la carpeta img*/
    }
    $create=mysqli_insert_id($dbname->registerUser($query));
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
        <a class="navbar-brand" href="registrar.php"><img src="../assets/img/estrellita.jpg" alt="" width="40" height="40"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar nav">
            <li class="nav-icon"><a class="nav-link active" aria-current="page" href="../../index.php">SALIR</a></li>
               <li class="nav-icon"><a class="nav-link "href="registrar_producto.php">REGISTRAR PRODUCTOS</a></li>
            <li class="nav-icon"><a class="nav-link "href="resultado.php">MOSTRAR LISTA</a></li>

          </ul>
        </div>
      </div>
    </nav>
<!--FIN NAVBAR-->
<!--PRESENTACION DEL TEMA DE PROYECTO-->
<div class="col-sm-12 col-md-12 col-lg-6 float-left my-5">
  <img src="../assets/svg/xcomputadora.svg" class="img-fluid" alt="">
</div>
<!--FIN DE PRESENTACION DE PROYECTO-->
<!--COLUMNA DEL FORMULARIO REGISTRO DATOS-->
<div class="col-sm-12 col-md-12 col-lg-6">
  <h2 class="display-5 fw-semibold text-uppercase text-center">FORMULARIO DE REGISTRO</h2>
  <!--FORMULARIO DE REGISTRO-->
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="row g-3 p-3 rounded needs-validation" novalidate method="POST" enctype="multipart/form-data"> <!--atributo que permite trabajar con archivos-->
    <?php
    if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
      echo"<center><div class='alert alert-danger fw-bold fst-italic'><span>" .$_GET['msg'] ."</span></div></center>";
    }
    ?>
    <div class="mb-3">
      <input type="text" class="form-control" id="nombres" name="nombres" required placeholder="Introducir nombres">
    </div>
      <div class="mb-3">
      <input type="text" class="form-control" id="apaterno" name="apaterno" required placeholder="Introducir apellido Paterno">
    </div>
      <div class="mb-3">
      <input type="text" class="form-control" id="amaterno" name="amaterno" required placeholder="Introducir apellido Materno">
    </div>
    <div class="mb-3">
      <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control" id="usuario" name="usuario" aria-describedby="inputGroupPrepend" required>
      </div>
    </div>
    <div class="mb-3">
      <div class="input-group has-validation">
       <span class="input-group-text">&#x1F512;</span> 
        <input type="pass" class="form-control" id="password" name="password"required>
      </div>
    </div>
    <div class="mb-3">
      <div class="input-group has-validation">
       <span class="input-group-text">&#128247;</span> 
        <input type="file" class="form-control" id="foto" name="foto"required>
      </div>
    </div>
    <div class="mb-3 mt-0">
      <label class="mb-1">Seleccionar el Cargo</label>
    <select class="form-select has-validation" aria-label="default select example" id="id_cargo_fk" name="id_cargo_fk" required>
         <option selected></option>
         <option value="1" class="lead">Administrador</option>
         <option value="2" class="lead">Desarrollador</option>
         <option value="3" class="lead">Colaborador</option>
       </select>
      </div>
      <div class="col-12">
      <button type="submit" name="submit" id="submit" class="btn btn-dark">Registrar</button>
      <span><a class="btn btn-success" href="registrar.php">Limpiar Datos </a></span>
      </div>
  </form>
  <!--end FORMULARIO DE REGISTRO-->
</div>
  </div>
   
 </main>
 <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
