<?php
$ruta="../../";
$menu="clasificacion";
include($ruta.'menu-lateral/menu-lateral.php');
include($ruta.'config/Precarga.php');
include($ruta.'header/header.php');
include($ruta.'dao/Clasificacion.php');
$libro = new Clasificacion("","");
$libro->setConexion($bd);
if (isset($_GET["clave_clasi"])) {
  $libro->setIdClasificacion($_GET["clave_clasi"]);
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
            <h5 class="card-title"><?=isset($_GET["clave_clasi"])?"Editar":"Agregar"?> Libro</h5>
          </div>
          <div class="card-body">
            <form action="<?=isset($_GET['clave_clasi'])?'agregarLibro.php':'agregarLibro.php'?>" method="post">
              <div class="row">

                <?php if(isset($_GET["clave_clasi"])){ ?>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Clave de clasificacion</label>
                      <input type="text" class="form-control" placeholder="Clave clasificacion" name="clave_clasi" value=" <?=$clasificacion->getIdClasificacion();?> " required readonly>
                    </div>
                  </div>

                <?php }?>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Clasificacion</label>
                    <input type="text" class="form-control" placeholder="Clasificacion" name="clasificacion" value="<?=isset($_GET['clave_clasi'])?$clasificacion->getClave():""?>" required>
                </div><br>


              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round"><?=isset($_GET["clave_clasi"])?"Editar Libro":"Agregar Claificacion"?></button>
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