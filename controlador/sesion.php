<?php
session_start();
if(!$_SESSION['s_usuario']){/*la variable de sesion NO esta activada*/
	header("Location:../../logout.php");/*direccionar al destructor de sesiones*/
}
?>