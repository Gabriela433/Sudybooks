<?php
$ruta="../../";
$menu="administrador";
include($ruta.'menu-lateral/menu-lateral.php');
include($ruta.'config/Precarga.php');
include($ruta.'header/header.php');
include("../../dao/Administrador.php");
$administrador = new Administrador('','','','','','');
$administrador->setConexion($bd);
if(isset($_GET["id"])){
  $administrador->setIdAdmin($_GET["id"]);
  $administrador->readAdminId();
  echo $administrador;
}
$administradores=$administrador->readAdmin();
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
          <h3> <font color="teal">Tabla de administradores</font> </h3>
          
          <br>
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido paterno</th>
              <th scope="col">Apellido materno</th>
              <th scope="col">Correo</th>
              <th scope="col">Password</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            foreach ($administradores as $administrador) {?>
              <tr>
                <td><?=$administrador->getIdAdmin()?></td>
                <td><?=$administrador->getNombre()?></td>
                <td><?=$administrador->getApellido_pa()?></td>
                <td><?=$administrador->getApellido_ma()?></td>
                <td><?=$administrador->getCorreo()?></td>
                <td><?=$administrador->getPassword()?></td>
                <td><a class="btn btn-primary" href="formAdministrador.php?id_admin=<?=$administrador->getIdAdmin()?>">Editar</a></td>
               
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
include($ruta.'footer/footer.php');
?>