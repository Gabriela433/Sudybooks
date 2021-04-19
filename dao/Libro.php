
 <?php
 class Libro{
	private $conexion;
 	private $id_libro;
 	private $clave_clasi;
 	private $titulo;
 	private $autor;
 	private $num_pag;
 	private $descripcion;


 	function __construct($id_libro,$clave_clasi,$titulo,$autor,$num_pag,$descripcion){
 		$this->id_libro = $id_libro;
 		$this->clave_clasi = $clave_clasi;
 		$this->titulo = $titulo;
 		$this->autor = $autor;
 		$this->num_pag = $num_pag;
 		$this->descripcion = $descripcion;
 	
 	}

 	public function setIdLibro($id_libro){
 		$this->id_libro = $id_libro;
 	}

 	public function setClave_clasi($clave_clasi){
 		$this->clave_clasi = $clave_clasi;
 	}


 	public function setTitulo($titulo){
 		$this->titulo = $titulo;
 	}

 	public function setAutor($autor){
 		$this->autor = $autor;
 	}


 	public function setNumPaginas($num_pag){
 		$this->num_pag = $num_pag;
 	}

 	public function setDescripcion($descripcion){
 		$this->descripcion = $descripcion;
 	}


 	public function getIdLibro(){
 		return $this->id_libro;
 	}

 	public function getClave_clasi(){
 		return $this->clave_clasi;
 	}

	public function getTitulo(){
 		return $this->titulo;
 	}

 	public function getAutor(){
 		return $this->autor;
 	}

 	public function getNumPaginas(){
 		return $this->num_pag;
 	}

 	public function getDescripcion(){
 		return $this->descripcion;
 	}

 	public function __toString(){
 		return "Libro{ id:".$this->id_libro." clave_clasi:".$this->clave_clasi." titulo:".$this->titulo." autor:".$this->autor." num_pag:".$this->num_pag." descripcion:".$this->descripcion."}";
 	}

 	public function setConexion($conexion){
 		$this->conexion = $conexion;
 	}

 	public  function getConexion(){
        return $this->$conexion; 
    }

	// Inicio CRUD

 	public function createLibro(){
 		$query = "INSERT INTO libros SET clave_clasi=:clave_clasi, titulo=:titulo, autor=:autor, num_pag=:num_pag, descripcion=:descripcion";
 		$stmt = $this->conexion->prepare($query);
 		$this->clave_clasi=htmlspecialchars($this->clave_clasi);
 		$this->titulo=htmlspecialchars($this->titulo);
 		$this->autor=htmlspecialchars($this->autor);
 		$this->num_pag=htmlspecialchars($this->num_pag);
 		$this->descripcion=htmlspecialchars($this->descripcion);

 		$stmt->bindParam(":clave_clasi", $this->clave_clasi);
 		$stmt->bindParam(":titulo", $this->titulo);
 		$stmt->bindParam(":autor", $this->autor);
 		$stmt->bindParam(":num_pag", $this->num_pag);
		$stmt->bindParam(":descripcion", $this->descripcion);

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

 	public function readLibro(){

 		$libros = array();
 		$query = "SELECT * FROM libros ";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
 				extract($row);
 				array_push($libros, new Libro($id_libro,$clave_clasi,$titulo,$autor,$num_pag,$descripcion));
 			}
 			return $libros;
 		}else{
 			print_r ($stmt->errorInfo());
 			return false;
 		}
 	}

 	public function readLibroId(){
 		$query = "SELECT * FROM libros WHERE  id_libro = $this->id_libro";
 		$stmt=$this->conexion->prepare($query);
 		if($stmt->execute()){
 			$row=$stmt->fetch(PDO::FETCH_ASSOC);
 			extract($row);
 			$this->clave_clasi = $clave_clasi;
  			$this->titulo = $titulo;
 			$this->autor = $autor;
  			$this->num_pag = $num_pag;
 			$this->descripcion = $descripcion;
 			return true;
 		}else{
 			echo $stmt->errorInfo();
 			return false;
 		}
 	}


 public function updateLibro(){
 		$query = "UPDATE libros SET clave_clasi=:clave_clasi, titulo=:titulo, autor=:autor, num_pag=:num_pag,  descripcion=:descripcion WHERE id_proveedor = $this->id_proveedor";
 		$stmt = $this->conexion->prepare($query);
 		$this->clave_clasi=htmlspecialchars($this->clave_clasi);
 		$this->titulo=htmlspecialchars($this->titulo);
 		$this->autor=htmlspecialchars($this->autor);
 		$this->num_pag=htmlspecialchars($this->num_pag);
 		$this->descripcion=htmlspecialchars($this->descripcion);
 		
 		$stmt->bindParam(":clave_clasi", $this->clave_clasi);
 		$stmt->bindParam(":titulo", $this->titulo);
		$stmt->bindParam(":autor", $this->autor);
 		$stmt->bindParam(":num_pag", $this->num_pag);
		$stmt->bindParam(":descripcion", $this->descripcion);
 		if($stmt->execute()){
 			
 			return true;
 		}else{
 			echo "Lo sentimos no se pudo agregar <br>";
 			echo "Error occurred: ".implode(":",$stmt->errorInfo());
 			echo "<br>";
 			return false;
 		}
 	}

 	public function deleteLibro(){
 		$query = "DELETE FROM libros WHERE id_libro = $this->id_libro";
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