<?php

class repositorio_usuarios {

    public static function obtener_todos($conexion) {
        $usuarios = array();
        if (isset($conexion)) {

            try {               
                include_once 'usuario.inc.php.php';
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']);
                    }
                } else {
                    print " No hay usuarios ";
                }
            } catch (PDOException $exc) {
                print "ERROR " . $exc->getMessage();
            }
        }
        return $usuarios;
    }

//para contar el total de usuarios en la tabla 
    public static function obtener_nro_usuarios($conexion) {
        $total_usuarios = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarios";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();
                $total_usuarios = $resultado['total'];
            } catch (PDOException $exc) {
                print "ERROR" . $exc->getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuarios($conexion, $usuario) {

        $usuario_insertado=false;

        if (isset($conexion)) {
            try {
                include_once 'app/usuario.inc.php.php';
                $sql = "INSERT INTO usuarios(nombre, email, password, fecha_registro, activo) VALUES( :nombre, :email, :password, NOW(), 0)"; 

                $sentencia = $conexion -> prepare($sql);
                
                //paso los datos del usuario que fue insertado desde el formulario
                $nombre = $usuario->getNombre();
                $email = $usuario->getEmail();
                $password = $usuario->getPassword(); 
                /*
                Error al introducir  el password dentro de 
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia -> bindParam(':password', $password, PDO::PARAM_STR);﻿*/
                
               $usuario_insertado = $sentencia->execute(array(":nombre"=>$nombre,":email"=>$email,":password"=>$password));;
                
            } catch (PDOException $exc) {
                print "ERROR " . $exc->getMessage();
            }
        }
        return $usuario_insertado;
    }
    public static function existe_nombre($conexion, $nombre){
        $nombre_existe=true;
        if(isset($conexion)){
            try{

                $sql="SELECT * FROM usuarios WHERE nombre = :nombre";
                $sentencia=$conexion-> prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado=$sentencia->fetchAll();

                if(count($resultado)){

                    $nombre_existe=true; 
                }else{
                    $nombre_existe=false;
                }
            }catch(PDOException $exc){

                print "ERROR ".$exc->getMessage();
            }
        }
        return $nombre_existe;
    }
    public static function existe_email($conexion, $email){
        $email_existe=true;
        if(isset($conexion)){
            try{

                $sql="SELECT * FROM usuarios WHERE email = :email";
                $sentencia=$conexion-> prepare($sql);
                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado=$sentencia->fetchAll();

                if(count($resultado)){

                    $email_existe = true; 
                }else{
                    $email_existe = false;
                }
            }catch(PDOException $exc){

                print "ERROR ".$exc->getMessage();
            }
        }
        return $email_existe;
    }
    public static function obtener_usuario_por_email($conexion, $email){
        $usuario=null;

        if (isset($conexion)){
            try {
               include_once 'usuario.inc.php.php';
               $sql= " SELECT * FROM usuarios WHERE email= :email"; 
               $sentencia=$conexion->prepare($sql);
               $sentencia->bindParam(':email', $email, PDO::PARAM_STR);
               $sentencia->execute();
               $resultado = $sentencia->fetch(); 
               if (!empty($resultado)){
                    $usuario = new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['fecha_registro'], $resultado['activo']);
               }

            } catch (PDOException $ex) {
                print "ERROR ".$ex->getMessage();
            }

        }
        return $usuario; //si isuario esta vacio lo retorno como null

    }

}
