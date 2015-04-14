<?php

require './require/comun.php';

$user = Peticion::post('login');
$password = Peticion::post('password');

$bd = new BaseDatos();
$modelo = new ModeloUser($bd);
$usuario = $modelo->login($user, $password);

if($usuario->getId()>-1){
    session_start();
    $_SESSION['id']=$usuario->getId();
    header("Location:content/principal.php");
}
else{
    header("Location:index.php?u=2");
}



