<?php

/**
 * Description of ModeloUser
 *
 * @author MARTIN
 */
class ModeloUser {

    //put your code here
    private $bd;
    private $tabla = "usuarios";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(User $objeto) {
        $sql = "INSERT INTO $this->tabla VALUES(null,:login,:password);";
        $params["login"] = $objeto->getLogin();
        $params["password"] = sha1($objeto->getPassword());
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $r;
    }

    function get($login) {
        $sql = "select * from $this->tabla where login=:login;";
        $parametros["login"] = $login;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $usuario = new User();
            $usuario->set($this->bd->getFila());
            return $usuario;
        }
        return NULL;
    }
    
    function getPorId($param) {
        $sql = "select * from $this->tabla where id=:id;";
        $parametros["id"] = $param;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $usuario = new User();
            $usuario->set($this->bd->getFila());
            return $usuario;
        }
        return NULL;
    }
    
    function login($param1, $param2) {
        $sql = "select * from $this->tabla where login=:login AND password=:password;";
        $parametros["login"] = $param1;
        $parametros["password"] = sha1($param2);
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $usuario = new User();
            $usuario->set($this->bd->getFila());
            return $usuario;
        }
        return NULL;
    }

    function delete(Usuario $objeto) {
        $sql = "DELETE from $this->tabla where login=:login;";
        $params["login"] = $objeto->getLogin();
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumFilas(); //0
    }

}
