<!DOCTYPE html>

<html lang="es"> <!--Estaremos diciendo que el contenido de HTML esta en español con el atributo "lang"-->
    <head>
        <meta charset="UTF-8"> <!-- Para que reconozca los caracteres raros -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge"><!-- para Internet explorer-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- atributo name para hacer referencia a la forma en que se presenta a la vista
        y content para adaptar la pagina al ancho del dispositivo e iniciando de vista normal-->
        <?php
        if (!isset($titulo) || empty('')){
            $titulo='JimmyBlog';
        }
        echo"<title>$titulo</title>"
        ?> <!-- Para poner un titulo a la pestaña-->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">

    </head>
    <body>
