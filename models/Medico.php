<?php
class Medico extends Conectar{    
    public function get_medico(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_medico()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }

    public function insert_medico($nombre,$apellido,$especialidad){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_i_medico(?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$nombre);
        $sql->bindValue(2,$apellido);
        $sql->bindValue(3,$especialidad);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function update_medico($medico_id,$nombre,$apellido,$especialidad){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_a_medico(?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$medico_id);
        $sql->bindValue(2,$nombre);
        $sql->bindValue(3,$apellido);
        $sql->bindValue(4,$especialidad);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function delete_medico($medico_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_d_medico(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$medico_id);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function get_medico_id($medico_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_medico_id(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$medico_id);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }
}

?>