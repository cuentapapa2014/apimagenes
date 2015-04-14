<?php
require '../require/comun.php';

session_start();
if(!isset($_SESSION['id'])){
    header('Location:../index.php');
    exit();
}

$bd = new BaseDatos();

$id = Peticion::get('id');
$elemento = Peticion::get('elemento');

if($elemento==1){
    $modelo = new ModeloCarpeta($bd);
    $modeloImagen = new ModeloImagen($bd);
    $imagenes = $modeloImagen->getList($id);
    foreach ($imagenes as $value) {
        $modeloImagen->deletePorId($value->getId());
    }
    $modelo->deletePorId($id);
}else if($elemento==2){
    $modelo = new ModeloImagen($bd);
    $res = $modelo->deletePorId($id);
}
    header('Location:'.$_SERVER['HTTP_REFERER']);


