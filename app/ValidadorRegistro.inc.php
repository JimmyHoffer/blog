<?php
include_once 'repositorio_usuarios.inc.php';
class ValidadorRegistro {

    private $aviso_inicio;
    private $aviso_cierre;
    private $nombre;
    private $email;
    private $clave;
    private $error_nombre;
    private $error_email;
    private $error_clave1;
    private $error_clave2;

    public function __construct($nombre, $email, $clave1, $clave2, $conexion) {
        $this->aviso_inicio = "<br><div class='alert alert-danger' rol='alert'>";
        $this->aviso_cierre = "</div>";

        $this->nombre = "";
        $this->email = "";
        $this->clave = "";

        $this->error_nombre = $this->validar_nombre($conexion, $nombre);
        $this->error_email = $this->validar_email($conexion, $email);
        $this->error_clave1 = $this->validar_clave1($clave1);
        $this->error_clave2 = $this->validar_clave2($clave1, $clave2);

        if ($this->error_clave1 === "" && $this->error_clave2 === "") {
            $this->clave = $clave1;
        }
    }

    private function variable_iniciada($variable) {
        // verifico si la variable esta iniciada y si no esta vacia
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    private function validar_nombre( $conexion, $nombre) {
        if (!$this->variable_iniciada($nombre)) {
            return "Debes escribir un nombre de usuario.";
        } else {
            $this->nombre = $nombre;
        }
        if (strlen($nombre) < 6) {
            return " El nombre debe tener  más de 6 caracteres.";
        }
        if (strlen($nombre) > 24) {
            return " El nombre no debe tener más de  24 caracteres.";
        }
       
        if (repositorio_usuarios::existe_nombre($conexion, $nombre)){
            return "Este nombre de usuario ya está en uso. Por favor intente con otro nombre.";
        }
         return "";
    }


    private function validar_email($conexion, $email) {
        if (!$this->variable_iniciada($email)) {
            return "Debes introducir un email valido.";
        } else {
            $this->email = $email;
        }
        
        if (repositorio_usuarios::existe_email($conexion, $email)){
            return "Este email  ya está en uso. Por favor pruebe con otro email ó <a href='#'>Intente recuperar su contraseña</a>.";
        }
        return "";
    }

    private function validar_clave1($clave1) {
        if (!$this->variable_iniciada($clave1)) {
            return "Debes introducir una contraseña";
        } else {
            $this->clave1 = $clave1;
        }
        return "";
    }

    private function validar_clave2($clave2, $clave1) {
        if (!$this->variable_iniciada($clave1)) {
            return " Primero debes rellenar el primer campo de contraseña.";
        }
        if (!$this->variable_iniciada($clave2)) {
            return " Repetir la contraseña.";
        }
        if ($clave1 !== $clave2) {
            return " Ambas contraseñas deben coincidir.";
        }

        return "";
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getClave() {
        return $this->clave;
    } 

    public function getError_nombre() {
        return $this->error_nombre;
    }

    public function getError_email() {
        return $this->error_email;
    }

    public function getError_clave1() {
        return $this->error_clave1;
    }

    public function getError_clave2() {
        return $this->error_clave2;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setError_nombre($error_nombre) {
        $this->error_nombre = $error_nombre;
    }

    public function setError_email($error_email) {
        $this->error_email = $error_email;
    }

    public function setError_clave1($error_clave1) {
        $this->error_clave1 = $error_clave1;
    }

    public function setError_clave2($error_clave2) {
        $this->error_clave2 = $error_clave2;
    }

    public function mostrar_nombre() {
        if ($this->nombre !== "") {
            echo 'value="' . $this->nombre . '"';
        }
    }

    public function mostrar_error_nombre() {
        //si error de nombre es igual a vacio lo muestro
        if ($this->error_nombre !== "") {
            //muestro un cuadro de dialogo de bootstrap para ver el error
            echo $this->aviso_inicio . $this->error_nombre . $this->aviso_cierre;
        }
    }

    public function mostrar_email() {
        if ($this->email !== "") {
            echo 'value="' . $this->email . '"';
        }
    }

    public function mostrar_error_email() {
        //si el campo del email esta vacio
        if ($this->error_email !== "") {
            //muestro un cuadro de dialogo de bootstrap para  ver el error
            echo $this->aviso_inicio . $this->error_email . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave1() {
        //si el campo de la clave1  esta vacio
        if ($this->error_clave1 !== "") {
            //muestro un cuadro de dialogo de bootstrap para ver el error
            echo $this->aviso_inicio . $this->error_clave1 . $this->aviso_cierre;
        }
    }

    public function mostrar_error_clave2() {
        //si el campo de la clave2 esta vacio
        if ($this->error_clave2 !== "") {
            //muestro un cuadro de dialogo de bootstrap para ver el error
            echo $this->aviso_inicio . $this->error_clave2 . $this->aviso_cierre;
        }
    }

    public function registro_valido() {
        // el === es la comprobación estricta para verificaciion de variables
        if ($this->error_nombre === "" &&
                $this->error_email === "" &&
                $this->error_clave1 === "" &&
                $this->error_clave2 === "") {
            return true;
        } else {
            return false;
        }
    }

}
