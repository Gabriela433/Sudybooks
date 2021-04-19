<?php
$ruta="../../";
include($ruta.'config/Precarga.php');
include($ruta.'dao/Libro.php');
$libro = new Libro($_GET["id_libro"],'','','','','');
$libro->setConexion($bd);
if ( $libro->deleteLibro() ){
	header("Location: index_libro.php");
}else{
	echo "Error";
}
?>