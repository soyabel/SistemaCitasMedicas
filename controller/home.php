<?php

require_once("../config/conexion.php");
require_once("../models/Home.php");

$home = new Home();
switch ($_GET["op"]) {
   
    case "obtenerTotalCitas":
        $total = $home->get_cantidad_cita();
        echo $total;
    break;
    case "obtenerTotalPagadas":
        $total = $home->get_cantidad_cita_pagadas();
        echo $total;
    break;
    case "obtenerTotalNoPagadas":
        $total = $home->get_cantidad_cita_no_pagadas();
        echo $total;
    break;
    case "obtenerMedicos":
        $total = $home->get_medicos();
        echo $total;
    break;
    case "obtenerPacientes":
        $total = $home->get_pacientes();
        echo $total;
    break;
}

?>