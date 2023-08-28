<?php

require_once("../config/conexion.php");
require_once("../models/Medico.php");

$medico = new Medico();

switch ($_GET["op"]) {
    case "guardaryeditar":
        if(empty($_POST["medico_id"])){       
            $medico->insert_medico($_POST["nombre"],$_POST["apellido"],$_POST["especialidad"]);     
        }
        else {
            $medico->update_medico($_POST["medico_id"],$_POST["nombre"],$_POST["apellido"],$_POST["especialidad"]);
        }
    break;
   case "listar":
    $datos=$medico->get_medico();
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["nombre"];
        $sub_array[] = $row["apellido"];
        $sub_array[] = $row["especialidad"];
        $sub_array[] = $row["fecha_creacion"];
        $sub_array[] = '<button type="button" onClick="editar('.$row["medico_id"].');"  id="'.$row["medico_id"].'"  class="btn btn-primary p-1 "><i class="fa-solid fa-user-pen"></i></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["medico_id"].');"  id="'.$row["medico_id"].'" class="btn  btn-danger p-1"><i class="fa-solid fa-trash-can"></i></button>';
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
        $medico->delete_medico($_POST["medico_id"]);
    break;
    case "mostrar";
    $datos=$medico->get_medico_id($_POST["medico_id"]);  
    if(is_array($datos)==true and count($datos)>0){
        foreach($datos as $row)
        {
            $output["medico_id"] = $row["medico_id"];
            $output["nombre"] = $row["nombre"];
            $output["apellido"] = $row["apellido"];
            $output["especialidad"] = $row["especialidad"];
            $output["fecha_creacion"] = $row["fecha_creacion"];
        }
        echo json_encode($output);
    }   
break;
}

?>