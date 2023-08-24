<?php
include "../../modelo/BD/config.php";
include "../../modelo/BD/dataBase.php";

$id =$_GET['id_usuario'];
$dbname=new DataBase();
$query="SELECT * FROM usuario WHERE id_usuario=$id";
$getData=$dbname->select($query)->fetch_assoc();

if(isset($_POST['submit'])){
  $nombres =mysqli_real_escape_string($dbname->link, $_POST['nombres']);
  $apaterno =mysqli_real_escape_string($dbname->link, $_POST['apaterno']); 
  $amaterno =mysqli_real_escape_string($dbname->link, $_POST['amaterno']);
  $usuario =mysqli_real_escape_string($dbname->link, $_POST['usuario']);
  $password =mysqli_real_escape_string($dbname->link, $_POST['pass']);
  if ($_FILES['foto']['size']!=0 && $_FILES['foto'] ['type']==='image/jpeg'||$_FILES['foto']['type']==='image/png')
  {
    $foto=addslashes(file_get_contents($_FILES['foto']['tmp_name']));
  }
  $id_cargo_fk =mysqli_real_escape_string($dbname->link, $_POST['id_cargo_fk']);

  if( $nombres==''|| $apaterno==''|| $amaterno=='' || $usuario=='' || $password=='' || $foto==''|| $id_cargo_fk=='')
  {
    header('Location:actualizaPersonal.php?msg='.urlencode('Debe llenar los campos').'&id_usuario='.$id);
  } 
  else
  {
    /*===================ACTUALIZAR LOS DATOS ===============*/

    if($foto=='')
    {
    header("Location:resultado.php?msg=Los datos han sido actualizados exitosamente!!!");

  }
    
    else{
      unlink("../assets/img/foto/".$getData['foto']);
    $pass_cifrado=password_hash($password, PASSWORD_DEFAULT);/*encriptado contraseña*/
    $fecha = new DateTime();
    $nomArchivo =($foto!="")?$fecha->getTimestamp()."_".$_FILES["foto"]["name"]:"";
    $tmp_foto=$_FILES["foto"]["tmp_name"];

    $query ="UPDATE usuario

              SET 
                  apaterno ='$apaterno',
                  amaterno ='$amaterno',
                  nombres ='$nombres',
                  usuario ='$usuario',
                  password ='$pass_cifrado',
                  foto ='$nomArchivo',
                  id_cargo_fk ='$id_cargo_fk'

                  WHERE id_usuario=$id";

    if($tmp_foto !=""){
      unlink("../assets/img/foto/".$getData['foto']);
      move_uploaded_file($tmp_foto, "../assets/img/foto/".$nomArchivo);/*mover la imagen hacia la ruta especificada en este caso lleva la imagen a la carpeta img*/
    }
   $update=$dbname->updateUsuario($query);
  }
}
  /*==============END ACTUALIZAR LOS DATOS===============*/
}
 /*============ELIMINAR DATOS==================*/
 if(isset($_POST['delete'])){
 	$query="DELETE FROM usuario WHERE id_usuario=$id";
 unlink("../assets/img/foto/".$getData['foto']);

 	$delete_Data = $dbname->deleteUsuario($query);
 }
 /*==============END ELIMINAR LOS DATOS============*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="registro">
  <title>Formulario para registrar</title>
<  <link rel="stylesheet" type="text/css" href="../assets/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vista/assets/css/fondo.css">
  <link rel="stylesheet" href="vista/assets/css/animaciones.css">
</head>
<body oncopy="return false" oncopaste="return false">
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
  <h2 class="display-5 fw-semibold text-uppercase text-center">FORMULARIO ACTUALIZACION DE DATOS</h2>
  <!--FORMULARIO DE REGISTRO-->
  <form action=" actualizaPersonal.php?id_usuario=<?php echo $id;?>" class="row g-3 p-3 rounded needs-validation" novalidate method="POST" enctype="multipart/form-data"> 
    <?php
    if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
      echo"<center class='alert alert-danger fw-bold fst-italic'>" .$_GET['msg'] ."</center>";
    }
    ?>
    <div class="mb-3">
      <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="nombres" name="nombres" required value="<?php echo $getData['nombres'];?>">
    </div>
      <div class="mb-3">
  <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="apaterno" name="apaterno" required value="<?php echo $getData['apaterno'];?>">
    </div>
      <div class="mb-3">
  <input type="text" class="form-control text-primary text-opacity-75 fw-semibold" id="amaterno" name="amaterno" required value="<?php echo $getData['amaterno'];?>">
    </div>
    <div class="mb-3">
      <div class="input-group has-validation">
        <span class="input-group-text">@</span>
        <input type="email" class="form-control text-primary text-opacity-75 fw-semibold" id="usuario" name="usuario" aria-describedby="inputGroupPrepend" required value="<?php echo $getData['usuario'];?>">
      </div>
    </div>
    <div class="mb-3">
      <div class="input-group has-validation">
       <span class="input-group-text">&#x1F512;</span> 
<input type="password" class="form-control text-primary text-opacity-75 fw-semibold" id="pass" name="pass" value="" required pattern="(?=.*\d)(?=.*[a-z]) (?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayuscula y minuscula, y al menos 8 o mas caracteres">
      </div>
    </div>
<center>
     <td class="bg-light">
      <?php if($getData['foto']!=NULL){?>
              
              <img class="img-thumbnail" width="100px" src="../assets/img/foto/<?php echo $getData['foto'];?>"><?php

              }else{
                    echo "<img src='../assets/img/ESTRELLITA.jpg' class='img-fluid img-thumbnail' width=100>";

                    }?></td>
</center>
    <div class="mb-3">
       <div class="input-group has-validation">
       <span class="input-group-text">&#128247;</span> 
        <input type="file" class="form-control" id="foto" name="foto" value="<?php echo $getData['foto'];?>" required>
      </div>
    </div>
    <div class="mb-3 mt-0">
      <label class="mb-1 lead fs-6">Seleccionar el Cargo</label>
       <select class="form-select has-validation text-primary text-opacity-75 fw-semibold" aria-label="default select example" id="id_cargo_fk" name="id_cargo_fk" required>
         			<option selected value="<?php echo $getData['id_cargo_fk'];?>"><?php
              switch ($getData['id_cargo_fk']) {
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
            ?></option>
            <option value="1" class="lead">Administrador</option>
            <option value="2" class="lead">Desarrollador</option>
            <option value="3" class="lead">Invitado</option>
       </select>
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-center">
      <button type="submit" name="submit" id="submit" class="btn btn-dark">Guardar Cambios</button>
      <button type="submit" name="delete" id="delete" class="btn btn-danger">Eliminar dato</button>
      <span><a class="btn btn-success" href="resultado.php">Cancelar Cambio </a></span>
      </div>
  </form>
  <!--end FORMULARIO DE REGISTRO-->
</div>
  </div>
   
 </main>
 <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>


