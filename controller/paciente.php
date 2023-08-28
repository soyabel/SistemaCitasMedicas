<?php

require_once("../config/conexion.php");
require_once("../models/Paciente.php");

$paciente = new Paciente();

switch ($_GET["op"]) {
    case "guardar":     
            $paciente->update_paciente($_POST["paciente_id"],$_POST["nombre"],$_POST["apellido"],$_POST["correo"],$_POST["celular"]);
    break;
   case "listar":
    $datos=$paciente->get_paciente();
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["nombre"];
        $sub_array[] = $row["apellido"];
        $sub_array[] = $row["correo"];
        $sub_array[] = $row["celular"];
        $sub_array[] = $row["fecha_creacion"];
        $sub_array[] = '<button type="button" onClick="editar('.$row["paciente_id"].');"  id="'.$row["paciente_id"].'" class="btn btn-primary p-1 "><i class="fa-solid fa-user-pen"></i></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["paciente_id"].');"  id="'.$row["paciente_id"].'" class="btn  btn-danger p-1"><i class="fa-solid fa-trash-can"></i></button>';
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
        $paciente->delete_paciente($_POST["paciente_id"]);
    break;
    case "mostrar";
            $datos=$paciente->get_paciente_id($_POST["paciente_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["paciente_id"] = $row["paciente_id"];
                    $output["nombre"] = $row["nombre"];
                    $output["apellido"] = $row["apellido"];
                    $output["correo"] = $row["correo"];
                    $output["celular"] = $row["celular"];
                }
                echo json_encode($output);
            }   
    break;
}

?>