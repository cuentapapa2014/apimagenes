<?php

/**
 * Description of Mensaje
 *
 * @author MARTIN
 */
class Mensaje {
    //put your code here
    public static function registro($param) {
        switch ($param){
            case -3:
                return "<div style='color:white; background-color:red'>Debes rellenar todos los campos</div>";
                break;
            case -2:
                return "<div style='color:white; background-color:red'>El usuario ya existe</div>";
                break;
            case -1:
                return "<div style='color:white; background-color:red'>Revisa la contraseña</div>";
                break;
            case 0:
                return "<div style='color:white; background-color:red'>No ha podido insertarse el usuario</div>";
                break;
            case 1:
                return "<div style='color:white; background-color:green'>Usuario registrado</div>";
                break;
            case 2:
                return "<div style='color:white; background-color:red'>Usuario o contraseña incorrectos</div>";
                break;
        }
    }
}
