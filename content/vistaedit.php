<?php
require '../require/comun.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../index.php');
    exit();
}
$usuario = $_SESSION['id'];
$id = Peticion::get('id');
$bd = new BaseDatos();
$modeloUser = new ModeloUser($bd);
$user = $modeloUser->getPorId($usuario);
$modeloCarpera = new ModeloCarpeta($bd);
$modeloImagen = new ModeloImagen($bd);
$imagen = $modeloImagen->getPorId($id);
$carpeta = $modeloCarpera->getPorId($imagen->getId_carpeta());
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
        <h2>Editar imagen</h2>
        <div class="center">
            <img src="<?php echo $carpeta->getRuta().$carpeta->getNombre()."/".$imagen->getFichero();?>" class="grande bloque"/>
            <form method="GET" action="edita.php?">
                <input type="text" value="<?php echo $imagen->getNombre();?>" name="nombre" class="bloque"/><br/>
                <input type="hidden" value="<?php echo $imagen->getId();?>" name="id" class="bloque"/>
                <input type="submit" value="Actualizar" class="bloque"/>
            </form>
        </div>
    </body>
</html>
