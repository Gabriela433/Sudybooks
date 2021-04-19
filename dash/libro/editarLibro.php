<?php
$ruta="../../";
include($ruta.'config/Precarga.php');
include($ruta.'dao/Libro.php');

$libro = new Libro($_POST["id_libro"],$_POST["clave_clasi"],$_POST["titulo"],$_POST["autor"],$_POST["num_pag"],$_POST["descripcion"]); 
$libro->setConexion($bd);
if ( $libro->updateLibro() ){
	header("Location: index_libro.php");
}else{
	echo "Error";
}

?>