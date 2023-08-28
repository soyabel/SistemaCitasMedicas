<?php
class Especialidad extends Conectar{ 

    public function insert_especialidad($nombre,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_i_especialidad(?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$descripcion);       
        $sql->execute();
        return $resulado=$sql->fetchAll();  
        
    }

    public function get_especialidad_todo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_especialidad()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    } 
    public function get_especialidad(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_nombre_especialidad";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }

    public function delete_especialidad($especialidad_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_d_especialidad(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$especialidad_id);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }
}
?>