<?php
/**
 * Description of ModeloCarpeta
 *
 * @author MARTIN
 */
class ModeloCarpeta {
    //put your code here
    private $bd;
    private $tabla = "carpetas";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(Carpeta $objeto) {
        $sql = "INSERT INTO $this->tabla VALUES(null,:nombre,:ruta,:id_user);";
        $params["nombre"] = $objeto->getNombre();
        $params["ruta"] = $objeto->getRuta();
        $params["id_user"] = $objeto->getId_user();
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $r;
    }

    function get($nombre, $id_user) {
        $sql = "select * from $this->tabla where nombre=:nombre AND id_user=:id_user;";
        $parametros["nombre"] = $nombre;
        $parametros["id_user"] = $id_user;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $carpeta = new Carpeta();
            $carpeta->set($this->bd->getFila());
            return $carpeta;
        }
        return NULL;
    }
    
    function getPorId($id) {
        $sql = "select * from $this->tabla where id=:id";
        $parametros["id"] = $id;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $carpeta = new Carpeta();
            $carpeta->set($this->bd->getFila());
            return $carpeta;
        }
        return NULL;
    }

    function delete(Carpeta $objeto) {
        $sql = "DELETE from $this->tabla where nombre=:nombre AND id_user=:id_user;";
        $params["nombre"] = $objeto->getNombre();
        $params["id_user"] = $objeto->getId_user();
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumFilas(); //0
    }
    
    function deletePorId($id) {
        $sql = "DELETE from $this->tabla where id=:id;";
        $params["id"] = $id;
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumFilas(); //0
    }
    
    function getList($param){
        $lista = array();
        $sql = "select * from $this->tabla where id_user=:id_user;";
        $parametros["id_user"] = $param;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($row = $this->bd->getFila()) {
                $carpeta = new Carpeta();
                $carpeta->set($row);
                $lista[] = $carpeta;
            }          
            return $lista;
        }
        return NULL;
    }
}
