<?php
require_once("../config/conexion.php");
class Home extends Conectar{    
    public function get_cantidad_cita(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_cantidad_total_citas()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll(); 
        $cantidad = $resulado[0]["cantidad"];       
        return $cantidad;
    }

    public function get_cantidad_cita_pagadas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_cantidad_citas_pagadas();";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll(); 
        $cantidad = $resulado[0]["cantidad"];    
        return $cantidad;
    }

    public function get_cantidad_cita_no_pagadas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_cantidad_citas_no_pagadas();";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll(); 
        $cantidad = $resulado[0]["cantidad"];    
        return $cantidad;
    }

    public function get_medicos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_cantidad_medicos();";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll(); 
        $cantidad = $resulado[0]["cantidad"];    
        return $cantidad;
    }
    public function get_pacientes(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_cantidad_pacientes();";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll(); 
        $cantidad = $resulado[0]["cantidad"];    
        return $cantidad;
    }
}