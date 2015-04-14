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
$carpeta = Peticion::post('destino');
$ficheros = Peticion::getFiles('ficheros');

if (!is_numeric($carpeta) && !file_exists(Config::DIR . $user->getLogin() . "/" . $carpeta)) {
    $cpt = new Carpeta(NULL, $carpeta, Config::DIR . $user->getLogin() . "/", $user->getId());
    if (mkdir($cpt->getRuta() . $cpt->getNombre(), 777, true)) {
        $id = $modeloCarpeta->add($cpt);
        $carpeta = $modeloCarpeta->getPorId($id);}
    } else if (!is_numeric($carpeta) && file_exists(Config::DIR . $user->getLogin() . "/" . $carpeta)) {
        $carpeta = $modeloCarpeta->get($carpeta, $user->getId());
    }
 else {
    $carpeta = $modeloCarpeta->getPorId($carpeta);
}
$subir = new SubirArchivo($ficheros);
$subir->setCarpetaDestino($carpeta->getRuta() . $carpeta->getNombre() . "/");
$errores = $subir->subir();
$mensajes = insertaFicheros($errores, $carpeta, $bd);
header('Location:principal.php');
exit();

//echo "Usuario ".$user->getLogin()."<br/>";
//echo $carpeta->getNombre()." para ".$carpeta->getId_user();


function mensajes($param) {
    $mensaje = "";
    foreach ($param as $key => $value) {
        /*if ($value[0] == -1) {
            $mensaje = $mensaje . utf8_decode("<p>Fichero $key no subido porque no es imagen</p>");
        } else if ($value[0] == 0) {
            $mensaje = $mensaje . utf8_decode("<p>Fichero $key subido</p>");
        } else {*/
            $mensaje = $mensaje . utf8_decode("<p>Fichero $key no subido $value[0]</p>");
        //}
    }
    return $mensaje;
}

function insertaFicheros($param1, $param2, $bd) {
    $listado = array();
 
    foreach ($param1 as $key => $value) {
        if($value[0]===0){
        $imagen = new Imagen(null, $value[1],$key, $param2->getId());
        //echo $imagen->getId()." y ".$imagen->getNombre()." y ".$param2->getId();
        //if($value === 0){
        $modeloImagen = new ModeloImagen($bd);
        
        $res = $modeloImagen->add($imagen);
        echo "$res";
            if($res>-1){
                $listado[$key] = 10;
            }
            else{
                $listado[$key] = -10;
            }
        }else{
            $listado[$key] = $value[0];
        }
    }
    return $listado;
}
