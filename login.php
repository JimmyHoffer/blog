<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/repositorio_usuarios.inc.php';
include_once 'app/ValidadorLogin.inc.php';
// si el usuario ha pulsado el boton de login sino hará la comprobacion 
// si pulsa el login abro la conexion 
if(isset($_POST['login'])){
Conexion::abrir_conexion();

$validador =new ValidadorLogin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());
    if($validador->obtener_error() ==='' && is_null($validador->obtener_usuario())){
        //iniciar sesión
        //redirir al index
    }
    Conexion::cerrar_conexion();
}
$titulo = "Login";

include_once 'plantillas/Documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>

<div class='container'>
    <div class='row'>
        <div class='col-md-3'>       
        </div>
        <div class='col-md-6'>
            <div  class='panel panel-default'>
                <div class='panel-heading text-center'>
                    <h4>Iniciar Sesión</h4>
                </div>
                <div class='panel-body'>
                    <form role='form'  method='POST' action="<?php echo $_SERVER['PHP_SELF']?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required autofocus>
                        <br>
                        <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">
                            Iniciar sesión
                        </button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>