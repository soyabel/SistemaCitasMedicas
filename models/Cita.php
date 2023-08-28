<?php
require_once("../config/conexion.php");
class Cita extends Conectar{    
    public function get_cita(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_cita()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        $resulado=$sql->fetchAll();
        return $resulado;
    }

    public function insert_cita($nombre,$apellido,$correo,$celular,$especialidad,$fecha){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_i_paciente_cita(?,?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$apellido);
        $sql->bindValue(3,$correo);
        $sql->bindValue(4,$celular);
        $sql->bindValue(5,$especialidad);
        $sql->bindValue(6,$fecha);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
        
    }

    public function update_cita($cita_id,$especialidad,$estadocita,$fechacita){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_a_cita(?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cita_id);
        $sql->bindValue(2,$especialidad);
        $sql->bindValue(3,$estadocita);
        $sql->bindValue(4,$fechacita);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function get_cita_id($cita_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_cita_id(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cita_id);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }
    

    public function delete_cita($cita_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_d_cita(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$cita_id);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

}

?>