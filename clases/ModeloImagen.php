<?php

/**
 * Description of ModeloImagen
 *
 * @author Usuario
 */
class ModeloImagen {
    //put your code here
    private $bd;
    private $tabla = "imagenes";

    function __construct($bd) {
        $this->bd = $bd;
    }

    function add(Imagen $objeto) {
        $sql = "INSERT INTO $this->tabla VALUES(null,:fichero,:nombre,:id_carpeta);";
        $params["fichero"] = $objeto->getFichero();
        $params["nombre"] = $objeto->getNombre();
        $params["id_carpeta"] = $objeto->getId_carpeta();
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $r;
    }

    function get($nombre, $id_carpeta) {
        $sql = "select * from $this->tabla where nombre=:nombre AND id_user=:id_carpeta;";
        $parametros["nombre"] = $nombre;
        $parametros["id_carpeta"] = $id_carpeta;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $imagen = new Imagen();
            $imagen->set($this->bd->getFila());
            return $imagen;
        }
        return NULL;
    }
    
    function getPorId($id) {
        $sql = "select * from $this->tabla where id=:id;";
        $parametros["id"] = $id;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            $imagen = new Imagen();
            $imagen->set($this->bd->getFila());
            return $imagen;
        }
        return NULL;
    }

    function delete(Imagen $objeto) {
        $sql = "DELETE from $this->tabla where id=:id AND id_carpeta=:id_carpeta;";
        $params["id"] = $objeto->getId();
        $params["id_carpeta"] = $objeto->getId_carpeta();
        $r = $this->bd->setConsulta($sql, $params);
        if (!$r) {
            return -1;
        }
        return $this->bd->getNumFilas(); //0
    }
    
    function edit(Imagen $objeto) {
        $sql = "UPDATE $this->tabla SET nombre=:nombre where id=:id;";
        $params["nombre"] = $objeto->getNombre();
        $params["id"] = $objeto->getId();
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
        $sql = "select * from $this->tabla where id_carpeta=:id_carpeta;";
        $parametros["id_carpeta"] = $param;
        $r = $this->bd->setConsulta($sql, $parametros);
        if ($r) {
            while ($row = $this->bd->getFila()) {
                $imagen = new Imagen();
                $imagen->set($row);
                $lista[] = $imagen;
            }          
            return $lista;
        }
        return NULL;
    }
      
    function renderiza(Carpeta $param){
        $renderizado="";
        $lista = $this->getList($param->getId());
        if(count($lista)>0){
        foreach ($lista as $key=>$value){
            $renderizado = $renderizado."<div class='miniaturas'><a href='".$param->getRuta().$param->getNombre()."/".$value->getFichero()."'><img src='".$param->getRuta().$param->getNombre()."/".$value->getFichero()."' class='mini'''/></a>"
                    . "<br/><label>".$value->getNombre()."</label></div>";
        };
        }
        else{
            $renderizado = $renderizado."<div><p>Esta carpeta esta vacia</p></div>";
        }
        return $renderizado;
    }
    
    function renderiza2(Carpeta $param1, Imagen $param2){
        $renderizado="";
        
        
            $renderizado = $renderizado."<div class='miniaturas'><a href='".$param1->getRuta().$param1->getNombre()."/".$param2->getFichero()."' class='mini'><img src='".$param1->getRuta().$param1->getNombre()."/".$param2->getFichero()."' class='mini'/></a>"
                    . "<label class='mini'>".$param2->getNombre()."</label><br/>"
                    . "<a href='vistaedit.php?id=".$param2->getId()."'>Editar</a><br/><a href='borraficheros.php?elemento=2&id=".$param2->getId()."'>Borrar</a></div>";
       
 
        return $renderizado;
    }
}
