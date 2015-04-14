<?php
require '../require/comun.php';
session_start();
if(!isset($_SESSION['id'])){
    header('Location:../index.php');
    exit();
}
$error = Peticion::get('e');
$usuario = $_SESSION['id'];
$bd = new BaseDatos();
$modeloUser = new ModeloUser($bd);
$user = $modeloUser->getPorId($usuario);
$modeloCarpeta = new ModeloCarpeta($bd);
$carpetas = $modeloCarpeta->getList($usuario);
$bd->closeConexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="../estilo/divisiones.css"/>
        <script src="../js/vistagestion.js"></script>
    </head>
    <body>
        <div class="cabecera">
            Estas logueado como <?php echo $user->getLogin(); ?>
            <a href="principal.php" class="alineader divboton">Volver</a>
        </div>
        <div class="botonera">
            <input type="button" value="Subir Ficheros" id="btsubir" class="bt"/>
        <input type="submit" value="Editar/Borrar" id="btborrar" class="bt"/>
        </div>
        <?php
        if ($error==-1) {
            echo '<div>Hay ficheros no subidos porque son imagenes</div>';
        }
        ?>
        <div class="nodisplay" id="subir">
            <p>Subir ficheros</p>
            <form method="POST" action="subeficheros.php" enctype="multipart/form-data" id="subida">
                <input type="file" name="ficheros[]" value="" multiple=""/><br/>
                <label>destino</label>
                <select name="destino" id="selectcarpeta">
                    <?php
                    foreach ($carpetas as $value) {
                        echo "<option value='".$value->getId()."'>".$value->getNombre()."</option>";    
                    }
                    ?>
                </select><br/>
                <img src="../img/folder_add.png" class="icon" title="Crear carpeta" id="btcarpeta"/><br/>
                <input type="submit" value="Aceptar" id="btaceptar"/>
            </form>
        </div>
    </body>
</html>
