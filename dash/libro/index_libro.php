<?php
$ruta="../../";
$menu="libro";
include($ruta.'menu-lateral/menu-lateral.php');
include($ruta.'config/Precarga.php');
include($ruta.'header/header.php');
include("../../dao/Libro.php");
$libro = new Libro('','','','','','');
$libro->setConexion($bd);
if(isset($_GET["id"])){
  $libro->setIdLibro($_GET["id"]);
  $libro->readLibroId();
  echo $libro;
}
$libros=$libro->readLibro();
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
          <h3> <font color="teal">Tabla Libros</font> </h3>
           <div class="container" align="center"> 
        <a href="formLibro.php" class="btn btn-success" style="float: right;"> Agregar Libro</a>
      </div>
          <br>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Clasificacion</th>
              <th scope="col">Titulo</th>
              <th scope="col">Autor</th>
              <th scope="col">Numero de paginas</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Acciones</th>

            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($libros as $libro) {?>
              <tr>
                <td><?=$libro->getIdLibro()?></td>
                <td><?=$libro->getClave_clasi()?></td>
                <td><?=$libro->getTitulo()?></td>
                <td><?=$libro->getAutor()?></td>
                <td><?=$libro->getNumPaginas()?></td>
                <td><?=$libro->getDescripcion()?></td>
                <td><a class="btn btn-primary" href="formLibro.php?id_libro=<?=$libro->getIdLibro()?>">Editar</a></td>
                <td><a class="btn btn-danger" href="eliminarLibro.php.php?id_libro=<?=$libro->getIdLibro()?>">Eliminar</a></td>
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