<?php
include('../modelo/BD/config.php');/*include, es la funcion para llamar archivos externos*/
include('../modelo/BD/dataBase.php');/*include, es la funcion que sirve para llamar archivos externos*/
$dbname=new DataBase();/*instancciando al objeto-la clase padre DataBase();*/
if(isset($_POST['enviar']) && $_SERVER['REQUEST_METHOD']=='POST') 
{
  /*La funcion d elas variables nos permiten evitar SQL-injection*/
  $usuario=mysqli_real_escape_string($dbname->link, $_POST['usuario']);
  $pass=mysqli_real_escape_string($dbname->link, $_POST['password']);

  if(empty($usuario) || empty($pass)){

    header('Location:../index.php?msg='.urlencode('Debe llenar los campos'));
  }
  else
  {
    $query="SELECT * FROM usuario WHERE usuario ='$usuario'";/*consulta SQL*/
    $result=$dbname->select($query);/*llamando a la funcion select de la clase padre*/
    if(mysqli_num_rows($result))
      {/*funcion que me permite obtener la fila de la tabla*/
      while ($row=mysqli_fetch_array($result))
        {/*recorrer array obtenido*/
        if(password_verify($pass, $row['password']))
          {
          /**********************************************************/
            /*para crear sesiones */
          session_start();
          $_SESSION['s_usuario']     =$row["usuario"];
          $_SESSION['s_id_usuario']  =$row["id_usuario"];
          $login                     = $dbname->signIn($query,$_SESSION['s_id_usuario']);
          /************************************************************/
          }
        else
        {
          header('Location:../index.php?msg2='.urlencode('!Opps los datos son erroneos'));
        }

      }

    }/*end del if*/

  }/*end del else*/
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="curso de php Segundo año">
  <meta name="keywords" content="Introduccion al lenguaje Php">
  <title>Introduccion al lenguaje PHP-2022</title>
  <link rel="stylesheet" href="vista/bootstrap/bootstrap.min.css">
</head>
<body class="bg-dark bg-opacity-75">
  <script type="vista/bootstrap/js/bootstrap.min.css"></script>
</body>   
</html>