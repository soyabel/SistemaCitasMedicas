<?php
class Paciente extends Conectar{    
    public function get_paciente(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_paciente()";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }

    public function update_paciente($paciente_id,$nombre,$apellido,$correo,$celular){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_a_paciente(?,?,?,?,?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$paciente_id);
        $sql->bindValue(2,$nombre);
        $sql->bindValue(3,$apellido);
        $sql->bindValue(4,$correo);
        $sql->bindValue(5,$celular);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function delete_paciente($paciente_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_d_paciente(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$paciente_id);
        $sql->execute();
        return $resulado=$sql->fetchAll();  
    }

    public function get_paciente_id($paciente_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "call sp_ls_paciente_id(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$paciente_id);
        $sql->execute();
        return $resulado=$sql->fetchAll(); 
    }
}

?>