<?php 
require_once("../../config/conexion.php") ;
if(isset($_SESSION["usuario_id"])){
?>


<!DOCTYPE html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../public/" data-template="vertical-menu-template-free">

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
            <div class="row">
              <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h5 class="card-title text-primary">Felicidades <?php echo $_SESSION["nombre"].' '.$_SESSION["apellido"]?>! 🎉</h5>
                        <p class="mb-4">
                          Hay un <span id="totalCitas" class="fw-bold"></span> citas médicas.
                        </p>

                        <a href="../MntCitas/" class="btn btn-sm btn-outline-primary">Ver Citas</a>
                      </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../../public/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../../public/img/icons/unicons/cc-primary.png" alt="chart success" class="rounded" />
                          </div>

                        </div>
                        <span class="fw-semibold d-block mb-1">N° Citas Canceladas</span>
                        <h3 id="totalCitasPagadas" class="card-title mb-2 text-success text-center"></h3>
                        <!-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <img src="../../public/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                          </div>

                        </div>
                        <span>N° Citas No Canceladas</span>
                        <h3 id="totalCitasNoPagadas" class="card-title  mb-1 text-danger fw-semibold text-center"></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                              <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                              <path d="M4.085 1H3.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1h-.585c.055.156.085.325.085.5V2a1.5 1.5 0 0 1-1.5 1.5h-5A1.5 1.5 0 0 1 4 2v-.5c0-.175.03-.344.085-.5ZM9.98 5.356 11.372 10h.128a.5.5 0 0 1 0 1H11a.5.5 0 0 1-.479-.356l-.94-3.135-1.092 5.096a.5.5 0 0 1-.968.039L6.383 8.85l-.936 1.873A.5.5 0 0 1 5 11h-.5a.5.5 0 0 1 0-1h.191l1.362-2.724a.5.5 0 0 1 .926.08l.94 3.135 1.092-5.096a.5.5 0 0 1 .968-.039Z" />
                            </svg>
                          </div>

                        </div>
                        <span class="d-block mb-1">N° de Médicos</span>
                        <h3 id="totalMedicos" class="card-title text-nowrap mb-2 text-success text-center"></h3>
                      </div>
                    </div>
                  </div>
                  <div class="col-6 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                          <div class="avatar flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z" />
                            </svg>
                          </div>

                        </div>
                        <span class="fw-semibold d-block mb-1">N° de Pacientes</span>
                        <h3 id="totalPacientes" class="card-title mb-2 text-success text-center"></h3>
                      </div>
                    </div>
                  </div>
                  <!-- </div>
    <div class="row"> -->

                </div>
              </div>
            </div>
            <div class="row">

            </div>
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
  <?php require_once("../MainJs/js.php") ?>
  <script type="text/javascript" src="home.js"></script>
</body>

</html>
<?php
}else{
  header("Location:".Conectar::ruta()."index.php");
}
?>