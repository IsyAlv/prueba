<?php
session_start();//inicia una nueva sesion o reanuda la existente
session_destroy();//Destruye toda la informacion registrada  de una sesion
header("Location:index.php");//Redirecciona a la pagina de inicio
exit();
?>