<?php
$ruta="../../";
include($ruta.'config/Precarga.php');
include($ruta.'dao/Clasificacion.php');
$libro = new Libro($_GET["clave_clasi"],'');
$libro->setConexion($bd);
if ( $libro->deleteLibro() ){
	header("Location: index_clasificacion.php");
}else{
	echo "Error";
}
?>