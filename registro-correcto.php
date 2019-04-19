<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/repositorio_usuarios.inc.php';
include_once 'app/Redireccion.inc.php';

//verifico si la variable nombre está iniciada y que no esté vacia.

if (isset($_GET['nombre']) && !empty($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    //si no existe ningún parametro de $nombre redirigir al inicio
} else {
    Redireccion::redirigir(SERVIDOR);
}

$titulo = '¡Registro correcto!'; //asigno titulo de la pagina nuevamente.

include_once 'plantillas/Documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
//cualquier redireccion que quiera hacer debe ser antes de escribir un documento de tipo html
?>

<div class='container'>
    <div class="row">
        <div class="col-md-12">
            <div class="panel pane-defaul">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Registro correcto
                </div>
                <div class="panel-body text-center">
                    <p>¡Gracias por registrarte! <b><?php echo $nombre ?></b></p>
                    <br>
                    <p><a href="<?php echo RUTA_LOGIN ?>"></a></p>
                </div>
            </div>
        </div>
    </div>
</div>


