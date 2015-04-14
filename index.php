<?php
require './require/comun.php';
$r = Peticion::get('u');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="estilo/divisiones.css"/>
        <script src="js/index.js"></script>
        <script src="js/formulario.js"></script>
    </head>
    <body>
        <div id="header">
            <h2>GESTOR DE IMAGENES</h2>
        </div>
        <div id="body">
            <div class="center">
                <?php
                if($r)
                    echo Mensaje::registro($r);
                ?>
                <h2>Bienvenido</h2>
                <p>Accede a tu cuenta o regístrate</p>
                <a href="#" id="entrar"><img src="img/entrar.gif" class="icono alineaizq"/></a>
                <a href="#" id="nuevo"><img src="img/nuevo.gif" class="icono alineader"/></a>
                <div id="formulario"></div>
            </div>
        </div>
        <div id="footer">

        </div>
    </body>
</html>
