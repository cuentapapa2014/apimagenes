<?php

require '../require/comun.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:../index.php');
    exit();
}
$usuario = $_SESSION['id'];

$id = Peticion::get('id');
$nombre = Peticion::get('nombre');
$bd = new BaseDatos();
$modelo = new ModeloImagen($bd);
$imagen = $modelo->getPorId($id);
$imagen->setNombre($nombre);
$modelo->edit($imagen);
header('Location:edicion.php');

