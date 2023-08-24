<?php
class DataBase{
	public $host    =DB_HOST;
	public $usuario =DB_USER;
	public $pass    =DB_PASS;
	public $dbname  =DB_NAME;

	public $link; //variable de lectura
	public $error; //variable para el error

	public function __construct(){//constructor de la funcion
         $this->connectDB();
	}

	private function connectDB(){
		$this->link=new mysqli($this->host,$this->usuario,$this->pass,$this->dbname);
		if(!$this->link){//si no existe una conexion, genera un mensaje de error;
			$this->error="Conexion fallida".$this->link->connect_error;
			return false;

		}
	}
	//============MOSTRAR DATOS DE LA TABLA================*/
	public function select($query){
		$result = $this->link->query($query) or die ($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}
		else{
			header("Location:../index.php?msg=El dato no existe!!");
			exit();
		}
	}
/*=======================Ejecutar la consulta================*/
   public function signIn($query, $rol_sesion){
    	$sign_row= $this->link->query($query) or die($this->link->error.__LINE__);
    	if($sign_row){
    		header("Location:../vista/public/resultado.php?rol_sesion".urlencode($rol_sesion));
    		exit();
    	}else{
    		die("error:(".$this->link->errno.")".$this->link-error);
    	}
    }
    //====================REGISTRAR DATOS A LA TABLA ==============
    public function registerUser($query)
    {
    	$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
    	if($sign_row){
    		header("Location:../../vista/public/resultado.php?msg=Los datos han sido registrados exitosamente!!!");
    		exit();
    	}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }
        //====================REGISTRAR_PRODUCTOS DATOS A LA TABLA ==============
    public function registerprod($query)
    {
    	$sign_row = $this->link->query($query) or die ($this->link->error.__LINE__);
    	if($sign_row){
    		header("Location:../../vista/public/resultado_producto.php?msg=Los datos han sido registrados exitosamente!!!");
    		exit();
    	}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }

 //=================ACTUALIZAR productos===========
    public function updateProducto($query)
    {
    	$update_row=$this->link->query($query) or die ($this->link->error.__LINE__);
    		if($update_row){
    		header("Location:../../vista/public/resultado_producto.php?msg=Los datos han sido actualizados exitosamente!!!");
    		exit();
    	}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }

 ////////===========ELIMINAR productos===========//////
 public function deleteProducto($query){
 $delete_row=$this->link->query($query) or die ($this->link->error.__LINE__);
    		if($delete_row){
    		header("Location:../../vista/public/resultado_producto.php?msg=Los datos han sido eliminados exitosamente!!!");
    		exit();
    		}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }
    //=================ACTUALIZAR DATOS===========
    public function updateUsuario($query)
    {
    	$update_row=$this->link->query($query) or die ($this->link->error.__LINE__);
    		if($update_row){
    		header("Location:../../vista/public/resultado.php?msg=Los datos han sido actualizados exitosamente!!!");
    		exit();
    	}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }

 ////////===========ELIMINAR DATOS===========//////
 public function deleteUsuario($query){
 $delete_row=$this->link->query($query) or die ($this->link->error.__LINE__);
    		if($delete_row){
    		header("Location:../../vista/public/resultado.php?msg=Los datos han sido eliminados exitosamente!!!");
    		exit();
    		}else{
    		die("Error:(".$this->link->errno.")".$this->link->error);
    	}
    }
 } 

?>