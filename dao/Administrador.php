<?php
 class Administrador{
	private $conexion;
 	private $id_admin;
 	private $nombre;
 	private $apellido_pa;
  	private $apellido_ma;
 	private $correo;
 	private $password;

 	function __construct($id_admin,$nombre,$apellido_pa,$apellido_ma,$correo,$password){
 		$this->id_admin = $id_admin;
 		$this->nombre = $nombre;
 		$this->apellido_pa = $apellido_pa;
 		$this->apellido_ma = $apellido_ma;
 		$this->correo = $correo;
 		$this->password = $password;
 	}

 	public function setIdAdmin($id_admin){
 		$this->id_admin = $id_admin;
 	}

 	public function setNombre($nombre){
 		$this->nombre = $nombre;
 	}

 	public function setApellido_pa($apellido_pa){
 		$this->apellido_pa = $apellido_pa;
 	}

 	public function setApellido_ma($apellido_ma){
 		$this->apellido_ma = $apellido_ma;
 	}

 	public function setCorreo($correo){
 		$this->correo = $correo;
 	}

 	public function setPassword($password){
 		$this->password = $password;
 	}

 	public function getIdAdmin(){
 		return $this->id_admin;
 	}

 	public function getNombre(){
 		return $this->nombre;
 	}

 	public function getApellido_pa(){
 		return $this->apellido_pa;
 	}

	public function getApellido_ma(){
 		return $this->apellido_ma;
 	}

 	public function getCorreo(){
 		return $this->correo;
 	}

 	public function getPassword(){
 		return $this->password;
 	}

 	public function __toString(){
 		return "Administrador{ id:".$this->id_admin." nombre:".$this->nombre." apellido_pa:".$this->apellido_pa." apellido_ma:".$this->apellido_ma."correo:".$this->correo." password:".$this->password."}";
 	}

 	public function setConexion($conexion){
 		$this->conexion = $conexion;
 	}

 	public  function getConexion(){
        return $this->$conexion; 
    }

	// Inicio CRUD

 	public function createAdmin(){
 		$query = "INSERT INTO administradores SET nombre=:nombre, apellido_pa=:apellido_pa, apellido_ma=:apellido_ma, correo=:correo, password=md5(:password)";
 		$stmt = $this->conexion->prepare($query);
 		$this->nombre=htmlspecialchars($this->nombre);
 		$this->apellido_pa=htmlspecialchars($this->apellido_pa);
 		$this->apellido_ma=htmlspecialchars($this->apellido_ma);
 		$this->correo=htmlspecialchars($this->correo);
 		$this->password=htmlspecialchars($this->password);

 		$stmt->bindParam(":nombre", $this->nombre);
 		$stmt->bindParam(":apellido_pa", $this->apellido_pa);
 		$stmt->bindParam(":apellido_ma", $this->apellido_ma);
		$stmt->bindParam(":correo", $this->correo);
		$stmt->bindParam(":password", $this->password);

 		if($stmt->execute()){
 			//echo "Agregado exitosamente <br>"; 
 			return true;
 		}else{
 			echo "No ha sido agregado exitosamente <br>";
 			echo "Error occurred: ".implode(":",$stmt->errorInfo());
 			echo "<br>";
 			return false;
 		}
 	}

 	public function readAdmin(){

 		$administradores = array();
 		$query = "SELECT * FROM administradores";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 				extract($row);
 				array_push($administradores, new Administrador($id_admin,$nombre,$apellido_pa,$apellido_ma,$correo,$password));
 			}
 			return $administradores;
 		}else{
 			print_r ($stmt->errorInfo());
 			return false;
 		}
 	}

 	public function readAdminId(){
 		$query = "SELECT * FROM administradores WHERE  id_admin = $this->id_admin";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			$row=$stmt->fetch(PDO::FETCH_ASSOC);
 			extract($row);
 			$this->nombre = $nombre;
  			$this->apellido_pa = $apellido_pa;
  			$this->apellido_ma = $apellido_ma;
 			$this->correo = $correo;
 			$this->password = $password;
 			return true;
 		}else{
 			echo $stmt->errorInfo();
 			return false;
 		}
 	}


 public function updateAdmin(){
 		$query = "UPDATE administradores SET nombre=:nombre, apellido_pa=:apellido_pa, apellido_ma=:apellido_ma, correo=:correo, password=:password WHERE id_admin = $this->id_admin";
 		$stmt = $this->conexion->prepare($query);
 		$this->nombre=htmlspecialchars($this->nombre);
 		$this->apellido_pa=htmlspecialchars($this->apellido_pa);
 		$this->apellido_ma=htmlspecialchars($this->apellido_ma);
 		$this->correo=htmlspecialchars($this->correo);
 		$this->password=htmlspecialchars($this->password);
 		$stmt->bindParam(":nombre", $this->nombre);
 		$stmt->bindParam(":apellido_pa", $this->apellido_pa);
 		$stmt->bindParam(":apellido_ma", $this->apellido_ma);
 		$stmt->bindParam(":correo", $this->correo);
 		$stmt->bindParam(":password", $this->password);
 		if($stmt->execute()){
 			
 			return true;
 		}else{
 			echo "Lo sentimos no se pudo agregar <br>";
 			echo "Error occurred: ".implode(":",$stmt->errorInfo());
 			echo "<br>";
 			return false;
 		}
 	}

 	public function deleteAdmin(){
 		$query = "DELETE FROM administradores WHERE id_admin = $this->id_admin";
 		$stmt = $this->conexion->prepare($query);
 		if($stmt->execute()){
 		
 			return true;
 		}else{
 			echo "No agregado exitosamente <br>";
 			echo "Error occurred: ".implode(":",$stmt->errorInfo());
 			echo "<br>";
 			return false;
 		}
 	}
 }
 ?>