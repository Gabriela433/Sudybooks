<?php
$ruta="../../";
$menu="libro";
include($ruta.'menu-lateral/menu-lateral.php');
include($ruta.'config/Precarga.php');
include($ruta.'header/header.php');
include($ruta.'dao/Libro.php');
$libro = new Libro("","","","","");
$libro->setConexion($bd);
if (isset($_GET["id_libro"])) {
  $libro->setIdLibro($_GET["id_libro"]);
}
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
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title"><?=isset($_GET["id_libro"])?"Editar":"Agregar"?> Libro</h5>
          </div>
          <div class="card-body">
            <form action="<?=isset($_GET['id_libro'])?'editarLibro.php':'agregarLibro.php'?>" method="post">
              <div class="row">

                <?php if(isset($_GET["id_libro"])){ ?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>ID Libro</label>
                      <input type="text" class="form-control" placeholder="ID libro" name="id_libro" value=" <?=$libro->getIdLibro();?> " required readonly>
                    </div>
                  </div>

                <?php }?>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Titulo</label>
                    <input type="text" class="form-control" placeholder="Titulo" name="titulo" value="<?=isset($_GET['id_libro'])?$libro->getTitulo():""?>" required>
                </div><br>

               

                <div class="form-group">
                    <label>Clasificacion</label>
                <select rows="10" cols="40" class="form-control" name="clasificacion" required>
                      <option value="">Seleccione la clasificacion</option>
                      <?php 
                          foreach ($clasificaciones as $clasificacion) {?>
                             <option value="<?=$clasificacion->getIdClasificacion()?>"><?=$clasificacion->getClave()?></option>
                          <?php } ?>
                    </select>
                </div><br>
                
                  <div class="form-group">
                    <label>Autor</label>
                    <input type="text" class="form-control" placeholder="Autor" name="autor" value="<?=isset($_GET['id_libro'])?$libro->getAutor():""?>" required>

                  </div><br>
                
                <div class="form-group">
                    <label>Numero de paginas</label>
                    <input type="text" class="form-control" placeholder="Numero de paginas" name="num_pag" value="<?=isset($_GET['id_libro'])?$libro->getNumPaginas():""?>" required>

                  </div><br>
                </div>

                   <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" placeholder="Breve descripcion" name="descripcion" value="<?=isset($_GET['id_libro'])?$libro->getDescripcion():""?>" required>

                  </div><br>


              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round"><?=isset($_GET["id_libro"])?"Editar Libro":"Agregar Libro"?></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer-black  footer-white ">
    
  </footer>
</div>

<?php
include($ruta.'footer/footer.php');
?>