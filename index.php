<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORM-LOGIN</title>
	<meta name="description" content="Diseño Programacion Web II">
	<meta name="Keywords" content="Formulario de Logueo">
    <link rel="stylesheet" type="text/css" href="vista/assets/bootstrap/bootstrap.min.css">
     <link rel="stylesheet" href="vista/assets/css/fondo.css">
     <link rel="stylesheet" href="vista/assets/css/animaciones.css">
     <link rel="stylesheet" href="vista/assets/animate/animate.min.css">
</head>
<body class="in-circle-swoop">
  <main class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center aling-items-center h-100">
        <div class="col col-xl-10">
          <!--llamando animacion transicion-->
          <div class="card border-info border border-4 fade-in" style="border-radius: 1rem;">
        <div class="row g-0">
          <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="vista/assets/img/dpw01.png"  alt="login form" class="img-fluid" style="border-radius:0.7rem 0 0 0.7rem;"/>
          </div>
    <div class="col-md-6 col-lg-7 d-flex aling-items-center"> 
      <div class="card-body text-black ">  
       <!--FORMLARIO LOGIN-->
        <form action="controlador/validacion.php" method="POST" class="scale-in-center">
          <?php
          if(isset($_GET['msg'])){/*obtiene el mensaje que manda el checklogin a la url*/
        echo "<center class='alert alert-danger'>".$_GET['msg']."</center>";
          }
          if(isset($_GET['msg2'])){/*obtiene el mensaje que manda el checklogin a la url*/
        echo "<center class='alert alert-warning fw-bold'>".$_GET['msg2']."</center>";
          }
          ?>
          <div class="d-flex aling-items-center mb-1">
            <span class="h1 fw-bold ">LOGIN</span>
          </div>
          <div class="mb-1">
            <input type="email" class="form-control form-control-lg" id="usuario" name="usuario">
            <label class="form-label">Direccion de correo electrónico</label>
          </div>
     <div class="mb-1">
      <input type="password" class="form-control form-control-lg" id="password" name="password" >
      <label class="form-label">Password</label>
     </div>

     <div class="mb-1">
       <button type="submit" class="btn btn-dark btn-lg btn-block" id="enviar" name="enviar">Iniciar</button>
       <a class="btn btn-success btn-lg btn-block" href="index.php">Limpiar</a><br>
       <div class="mt-2"></div>
       <div class="form-check form-switch mt-3 mb-4">
        <input class="form-check-input" type="checkbox" name="recordar" id="recordar" value="recordar"/>
        <label class="form-check-label" for="recordar">Recordar contraseña</label>
       </div>
       <a class="small text-muted" href="#!">¿Has olvidado tu contraseña?</a>
       <span class="mb-3 pb-lg-2">¿No tienes una cuenta? <a href="vista/public/registrar.php">Registrar aqui</a></span>
     </div>
     <a href="#!" class="small text-muted">Condiciones de uso</a>
     <a href="#!" class="small text-muted">Politica de privacidad</a>
   </form>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</main>
<script type="vista/bootstrap/js/bootstrap.min.css"></script>
</body>   
</html>