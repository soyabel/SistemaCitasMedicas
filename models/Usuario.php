<?php
require_once("../config/conexion.php");
     class Usuario extends Conectar{
        public function login($correo,$password){
            $conectar=parent::conexion();
            parent::set_names();
                 if (empty($correo) || empty($password)) {
                    return "Por favor, complete ambos campos.";
                } else {
                    $query = "SELECT * FROM usuario WHERE correo =? AND password =?;";
                    $stmt = $conectar->prepare($query);
                    $stmt->bindValue(1,$correo);
                    $stmt->bindValue(2,$password);
                    $stmt->execute();
                    $resultado= $stmt->fetch();
                    
                    if ($stmt->rowCount() === 1) {                      
                        $_SESSION["usuario_id"]=$resultado["usuario_id"];
                        $_SESSION["nombre"]=$resultado["nombre"];
                        $_SESSION["apellido"]=$resultado["apellido"];
                        $_SESSION["correo"]=$resultado["correo"];
                        return "success";
                    } else {
                        return "Credenciales incorrectas.";
                    }
                }
    
        }
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
    
        $usuario = new Usuario();
        $result = $usuario->login($email, $password);
        echo $result;
    }