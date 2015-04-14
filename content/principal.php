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
        <link rel="stylesheet" href="../estilo/divisiones.css"/>
    </head>
    <body>
        <div class="cabecera">
            Estas logueado como <?php echo $user->getLogin(); ?>
            <div class="alineader divboton"><a href="salir.php">Salir</a></div>
            <div class="alineader divboton"><a href="vistagestion.php">Gestionar ficheros</a></div>
            
        </div>
        <?php
        if (count($carpetas) > 0) {
            foreach ($carpetas as $key => $value) {
                echo'<div class="encabezado"><p>';
                echo $value->getNombre();
                echo "</p></div>";
                echo $modeloImagen->renderiza($value);
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
