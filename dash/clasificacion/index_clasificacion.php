<?php
$ruta="../../";
$menu="clasificacion";
include($ruta.'menu-lateral/menu-lateral.php');
include($ruta.'config/Precarga.php');
include($ruta.'header/header.php');
include("../../dao/Clasificacion.php");
$clasificacion = new Clasificacion('','');
$clasificacion->setConexion($bd);
if(isset($_GET["id"])){
  $clasificacion->setIdClasificacion($_GET["id"]);
  $clasificacion->readClasificacionId();
  echo $clasificacion;
}
$clasificaciones=$clasificacion->readClasificacion();
?>

<div class="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="content">
    <div class="container">
         <div class="table-responsive">
        <table class="table table-striped">
           <h3> <font color="teal">Tabla de clasificaciones</font> </h3>

            <div class="container" align="right"> 
             <a href="formClasificacion.php" class="btn btn-success" style="right;"> Agregar clasificacion</a>
            </div>

          <br>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Clasificacion</th>
              <th scope="col">Acciones</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($clasificaciones as $clasificacion) {?>
              <tr>
                <td><?=$clasificacion->getIdClasificacion()?></td>
                <td><?=$clasificacion->getClave()?></td>
                <td><a class="btn btn-primary" href="formClasificacion.php?clave_clasi=<?=$clasificacion->getIdClasificacion()?>">Editar</button></td>


                <td><a class="btn btn-danger" href="eliminarClasificacion.php?clave_clasi=<?=$clasificacion->getIdClasificacion()?>">Eliminar</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>         
      

    </div>

  </div>
</div>
</div>
<?php
?>