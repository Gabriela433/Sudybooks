 <?php
 class Clasificacion{
	private $conexion;
 	private $clave_clasi;
 	private $clasifica;
 	


 	function __construct($clave_clasi,$clasifica){
 		$this->clave_clasi = $clave_clasi;
 		$this->clasifica = $clasifica;
 	}

 	public function setIdClasificacion($clave_clasi){
 		$this->clave_clasi = $clave_clasi;
 	}

 	public function setClave($clasifica){
 		$this->clasifica = $clasifica;
 	}

 	
 	public function getIdClasificacion(){
 		return $this->clave_clasi;
 	}

 	public function getClave(){
 		return $this->clasifica;
 	}


 	public function __toString(){
 		return "clasificacion{ id:".$this->clave_clasi." clasifica:".$this->clasifica. "}";
 	}

	//Controlador

 	public function setConexion($conexion){
 		$this->conexion = $conexion;
 	}

 	public  function getConexion(){
        return $this->$conexion; 
    }

 //CRUD-------------------------------------------------------------------

 	public function createClasificacion(){
 		$query = "INSERT INTO clasificaciones SET clasifica=:clasifica";
 		$stmt = $this->conexion->prepare($query);
 		$this->clasifica=htmlspecialchars($this->clasifica);
 		$stmt->bindParam(":clasifica", $this->clasifica);
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
//-------------------------------------------------------------------
 	//Leer usuarios (Lista)
 	public function readClasificacion(){

 		$clasificaciones = array();
 		$query = "SELECT * FROM clasificaciones";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 				extract($row);
 				array_push($clasificaciones, new Clasificacion($clave_clasi,$clasifica));
 			}
 			return $clasificaciones;
 		}else{
 			print_r ($stmt->errorInfo());
 			return false;
 		}
 	}

//-------------------------------------------------------------------
 	//Leer usuario por ID
 	
 	public function readClasificacionId(){
 		$query = "SELECT * FROM clasificaciones WHERE  clave_clasi = $this->clave_clasi";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			$row=$stmt->fetch(PDO::FETCH_ASSOC);
 			extract($row);
 			$this->clasifica = $clasifica;
 			return true;
 		}else{
 			echo $stmt->errorInfo();
 			return false;
 		}
 	}

 	//Editar Usuario

 	public function updateClasificacion(){
 		$query = "UPDATE clasificaciones SET clasifica=:clasifica  WHERE clave_clasi = $this->clave_clasi";
 		$stmt = $this->conexion->prepare($query);
 		$this->clasifica=htmlspecialchars($this->clasifica);
		$stmt->bindParam(":clasifica", $this->clasifica);
 		if($stmt->execute()){
 			return true;
 		}else{
 			echo "No agregado exitosamente <br>";
 			echo "Error occurred: ".implode(":",$stmt->errorInfo());
 			echo "<br>";
 			return false;
 		}
 	}

 	public function deleteClasificacion(){
 		$query = "DELETE FROM clasificaciones WHERE clave_clasi = $this->clave_clasi";
 		$stmt = $this->conexion->prepare($query);
 		if($stmt->execute()){
 			//echo "Eliminado exitosamente <br>"; **aquiiiiii*
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