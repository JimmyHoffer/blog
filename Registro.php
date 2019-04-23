<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/usuario.inc.php.php';
include_once 'app/repositorio_usuarios.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';

//VALIDO LOS DATOS DE REGISTRO CON EL BOTON ENVIAR
if (isset($_POST['enviar'])){
    Conexion::abrir_conexion();
   $validador = new ValidadorRegistro($_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'],Conexion::obtener_conexion());
   if ($validador->registro_valido()){
       $usuario = new Usuario('', $validador->getNombre(),
        $validador->getEmail(),
         password_hash($validador->getClave(), PASSWORD_DEFAULT),
            '',
            '');
       $usuario_insertado = repositorio_usuarios::insertar_usuarios(Conexion::obtener_conexion(), $usuario);
       //compruebo si el usuario se insertó
     
       if ($usuario_insertado){
           //redirigir al 
        Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '?nombre='.$usuario->getNombre());
       }
   }
    Conexion::cerrar_conexion();
}
$titulo = 'Registro'; //nombre de la pestaña actual

include_once 'plantillas/Documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';

?>
<div class='container'>
    <div class='jumbotron'>
        <h1 class='text-center'>Formulario de Registro</h1>
    </div>
</div>
<div class='container'>
    <div class='row'>
        <div class='col-md-6 text-center'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>
                        Instrucciones
                    </h3>
                </div>
                <div  class='panel-body'> 
                    <br> <!--salto de linea-->
                    <p class='text-justify'>
                        Para unirte al Jimmy Blog, introduce un nombre de usuario, tu email. El email que
                        escribas debe ser real ya que lo necesitarás para gestionar tu cuenta.
                        Te recomendamos que uses una contraseña que contenga mayúsculas, minúsculas,
                        números y simbolos
                    </p>
                    <a href="#">¿Ya tienes una cuenta?</a>
                    <br> <!--salto de linea-->
                    <br> <!--salto de linea-->
                    <a href="#">¿Olvidaste tu contraseña?</a>
                    <br> <!--salto de linea-->
                    <br> <!--salto de linea-->
                </div>
            </div>
        </div>
        <div class='col-md-6 text-center'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'>
                        Introduce tus datos
                    </h3>
                </div>
                <div  class='panel-body'> 
                    <form role='form' method="POST" action="<?php echo RUTA_REGISTRO ?>">
                        <?php
                        if (isset($_POST['enviar'])){
                            include_once 'plantillas/Registro_validado.inc.php';
                        } else {
                            include_once 'plantillas/Registro_vacio.inc.php';                         
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/Documento_cierre.inc.php';
?>
