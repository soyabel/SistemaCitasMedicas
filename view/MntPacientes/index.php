<?php 
require_once("../../config/conexion.php") ;
if(isset($_SESSION["usuario_id"])){
?>
<!DOCTYPE html>
<html
  lang="es"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../public/"
  data-template="vertical-menu-template-free"
>
  <head>

    <?php require_once("../MainHead/head.php") ?>
    <!-- Helpers -->
    <script src="../../public/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../public/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php require_once("../MainAside/aside.php") ?>       
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php require_once("../MainNav/nav.php") ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Bootstrap Dark Table -->
              <div class="card">                  
                  <h5 class="card-header">Pacientes</h5>                 
                  <div class="table-responsive text-nowrap">
                    <table id="usuario_data" class="table table-dark pt-3">
                      <thead>
                        <tr>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo</th>
                          <th>Celular</th>
                          <th>fecha Creacion</th>
                          <th></th>
                          <th></th>
                         
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                      
                      </tbody>
                    </table>
                  </div>
              </div>
              <!--/ Bootstrap Dark Table -->
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    

    <!-- Core JS -->
    <?php require_once("modalmantenimiento.php") ?>
    <?php require_once("../MainJs/js.php") ?>
    <script type="text/javascript" src="mntpacientes.js"></script>
  </body>
</html>
<?php
}else{
  header("Location:".Conectar::ruta()."index.php");
}
?>