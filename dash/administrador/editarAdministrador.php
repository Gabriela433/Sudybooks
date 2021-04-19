<?php
$ruta="../../";
include($ruta.'config/Precarga.php');
include($ruta.'dao/Administrador.php');

$libro = new Administrador($_POST["id_admin"],$_POST["nombre"],$_POST["apellido_pa"],$_POST["apellido_ma"],$_POST["correo"],$_POST["password"]); 
$libro->setConexion($bd);
if ( $libro->updateLibro() ){
	header("Location: index_administrador.php");
}else{
	echo "Error";
}

?>