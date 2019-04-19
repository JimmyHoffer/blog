<?php
include_once 'app/Conexion.inc.php';
include_once 'app/repositorio_usuarios.inc.php';
$titulo = 'JimmyBlog';
include_once 'plantillas/Documento_declaracion.inc.php';
include_once 'plantillas/navbar.inc.php';
?>
<div class="container">
    <div class="jumbotron">
        <h1>Jimmy Blog</h1>
        <p>Prueba de desarrollo de la página</p>
    </div>            
</div> <!-- caja de proposito general-->
<!--Nota un container no debe estar dentro de otro contianer ya que puede causar
conflictos -->
<div class="container">
    <div class="row"><!--creo una fila dentro del contenedor -->
        <div class="col-md-4">  <!--tomo 4 de las 12 columnas disponibles-->
            <div class="row"><!--subdivido la clumna con otra fila-->
                <div class="col-md-12"><!--indico que usaré todo el espacio dentro de la columna-->
                    <div class="panel panel-default"> <!--creo un panel-->
                        <div class="panel-heading"> <!--creo titulo del panel-->
                            <!--agrego iconos personalizados de bootstrap-->
                            <h4>
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Búsqueda                             
                            </h4>
                        </div>
                        <div class="panel-body"><!--aquí ira el contenido del panel-->   
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="¿Qué buscas?">
                            </div>
                            <button class="form-control">Buscar</button>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Flitro
                        </div>
                        <div class="panel-body">

                        </div>   
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Archivo
                        </div>
                        <div class="panel-body">

                        </div>   
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default"> <!--creo un panel-->
                <div class="panel-heading"> <!--creo titulo del panel-->
                    <h4>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span> Últimas entradas
                    </h4>
                </div>
                <div class="panel-body"><!--aquí ira el contenido del panel-->
                    <?php
                    // include_once 'app/Conexion.inc.php';
                    //  Conexion::abrir_conexion();
                    // Conexion::cerrar_conexion();
                    ?>
                    <p>Todavía no hay entradas para mostrar</p>   
                </div>

            </div>
        </div>
    </div>
</div>
<?php
include_once 'plantillas/Documento_cierre.inc.php';
?>
