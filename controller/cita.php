<?php

require_once("../config/conexion.php");
require_once("../models/Cita.php");

$usuario = new Cita();

switch ($_GET["op"]) {
    case "guardar":
        if(empty($_POST["cita_id"])){       
            $usuario->insert_cita($_POST["nombre"],$_POST["apellido"],$_POST["correo"],$_POST["celular"],$_POST["especialidad"],$_POST["fechacita"]);     
        }
    break;
    case "editar":     
            $usuario->update_cita($_POST["cita_id"],$_POST["especialidad"],$_POST["estadocita"],$_POST["fechacita"]);
    break;
    break;
   case "listar":
    $datos=$usuario->get_cita();
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["nombre"];
        $sub_array[] = $row["apellido"];
        $sub_array[] = $row["correo"];
        $sub_array[] = $row["celular"];
        $sub_array[] = $row["especialidad"];
        $sub_array[] = $row["fechacita"];
        if ($row["estadocita"]==1){
            $sub_array[] = '<span class="badge bg-success">Cancelo</span>';
        }else{
            $sub_array[] = '<span class="badge bg-danger">No Cancelo</span>';
        }
        $sub_array[] = '<button type="button" onClick="editar('.$row["cita_id"].');"  id="'.$row["cita_id"].'"  class="btn btn-primary p-1 "><i class="fa-solid fa-user-pen"></i></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["cita_id"].');"  id="'.$row["cita_id"].'" class="btn  btn-danger p-1"><i class="fa-solid fa-trash-can"></i></button>';
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
        $usuario->delete_cita($_POST["cita_id"]);
    break;
    case "mostrar";
    $datos=$usuario->get_cita_id($_POST["cita_id"]);  
    if(is_array($datos)==true and count($datos)>0){
        foreach($datos as $row)
        {
            $output["cita_id"] = $row["cita_id"];
            $output["especialidad"] = $row["especialidad"];
            $output["fechacita"] = $row["fechacita"];
            $output["estadocita"] = $row["estadocita"];
        }
        echo json_encode($output);
    }   
break;
}

?>