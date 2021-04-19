<?php
$ruta="../../";
include($ruta.'config/Precarga.php');
include($ruta.'dao/Clasificacion.php');
$libro = new Libro('',$_POST["clasifica"]);
$libro->setConexion($bd);
if ( $libro->createClasificacion() ){
	header("Location: index_clasificacion.php");
}else{
	echo "Error";
}
?>
