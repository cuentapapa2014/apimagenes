<?php

require './require/comun.php';

$user = Peticion::post('login');
$password = Peticion::post('password');
$rpassword = Peticion::post('rpassword');

if (campos($user) || campos($password) || campos($rpassword)) {
    if (compruebaLogin($user)) {
        if (compara($password, $rpassword)) {
            if (nuevoUser($user, $password)) {
                header('Location:index.php?u=1');
                exit();
            } else {
                header('Location:index.php?u=0');
                exit();
            }
        }else{
            header('Location:index.php?u=-1');
            exit();
        }
    }else{
        header('Location:index.php?u=-2');
    }
}
else{
    header('Location:index.php?u=-3');
}

function campos($param) {
    if ($param === "" || !$param) {
        return false;
    }
    return true;
}

function compara($param1, $param2) {
    return $param1 === $param2;
}

function compruebaLogin($param) {
    $bd = new BaseDatos();
    $modelo = new ModeloUser($bd);
    $usuario = $modelo->get($param);
    if ($usuario->getId()!=NULL) {
        $bd->closeConexion();
        return false;
    }
    $bd->closeConexion();
    return true;
}

function nuevoUser($param1, $param2) {
    $bd = new BaseDatos();
    $modelo = new ModeloUser($bd);
    return $modelo->add(new User(NULL, $param1, $param2)) > 0;
}
