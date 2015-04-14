<?php
require '../require/comun.php';
session_start();
if(!isset($_SESSION['id'])){
    header('Location:../index.php');
    exit();
}
$usuario = $_SESSION['id'];
$bd = new BaseDatos();
$modeloUser = new ModeloUser($bd);
$user = $modeloUser->getPorId($usuario);
$modeloCarpeta = new ModeloCarpeta($bd);
$carpetas = $modeloCarpeta->getList($usuario);
$modeloImagen = new ModeloImagen($bd);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../estilo/estilo.css"/>
    </head>
    <body>
        <div class="cabecera">
            Estas logueado como <?php echo $user->getLogin(); ?>
            <div class="alineader divboton"><a href="vistagestion.php">Volver</a></div>
        </div>
        <?php
        if (count($carpetas) > 0) {
            foreach ($carpetas as $key => $value) {
                echo'<div class="encabezado"><p style="display:inline">';
                echo $value->getNombre();
                echo "</p><a href='borraficheros.php?elemento=1&id=".$value->getId()."' class='alineader blanco'>Eliminar carpeta</p></a></div>";
                $imagenes = $modeloImagen->getList($value->getId());
                foreach ($imagenes as $key => $imagen) {
                    echo $modeloImagen->renderiza2($value, $imagen);
                }          
            }
        }else{
            echo'<div class="encabezado"><p>No hay carpetas</p></div>';
        }
        ?>
    </body>
</html>
<?php
$bd->closeConexion();
?>
