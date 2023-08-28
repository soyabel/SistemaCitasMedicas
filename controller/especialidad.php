<?php

require_once("../config/conexion.php");
require_once("../models/Especialidad.php");

$especialidad = new Especialidad();

switch ($_GET["op"]) {
    case "guardar":
        if(empty($_POST["especialidad_id"])){      
            $especialidad->insert_especialidad($_POST["nombre"],$_POST["descripcion"]);
            
        }else{
            echo "Error";
        }
    break;
   case "listar":
    $datos=$especialidad->get_especialidad_todo();
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["nombre"];
        $sub_array[] = $row["descripcion"];
        $sub_array[] = $row["fecha_creacion"];
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["especialidad_id"].');"  id="'.$row["especialidad_id"].'" class="btn  btn-danger p-1"><i class="fa-solid fa-trash-can"></i></button>';
        $data[] = $sub_array;
    }

    $results = array(
        "sEcho"=>1,
        "iTotalRecords"=>count($data),
        "iTotalDisplayRecords"=>count($data),
        "aaData"=>$data);
    echo json_encode($results);
    break;
    case "eliminar":
        $especialidad->delete_especialidad($_POST["especialidad_id"]);
    break;
    
}

?>