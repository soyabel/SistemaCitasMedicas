<?php
    session_start();
    class Conectar{
        protected  $dbh;
         protected function conexion(){
             try {
                 $this->dbh=new PDO("mysql:local=localhost;dbname=salutechdb","root","");
                 $conectar=$this->dbh;
                 return $conectar;
             } catch (Exception $e) {
                print("Error".$e->getMessage()."</br>");
                 die(); //para que termine la session de nuestra conexion
             }
         }
 
         public function set_names(){
             return $this->conexion()->query("SET NAMES 'utf8'"); //para que en la base de datos nos acepte la ñ y las tiltes
         }
 
         //Rura principal de nuestro proyecto
         public static function ruta(){
             return "http://localhost/PROYECTOS/AdminCitasMedicas/";
         }
     }
?>