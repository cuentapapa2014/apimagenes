<?php
/**
 * Description of Imagen
 *
 * @author MARTIN
 */
class Imagen {
    
    //put your code here
    private $id;
    private $fichero;
    private $nombre;
    private $id_carpeta;
    
    function __construct($id=NULL, $fichero=NULL ,$nombre=NULL, $id_carpeta=NULL) {
        $this->id = $id;
        $this->fichero = $fichero;
        $this->nombre = $nombre;
        $this->id_carpeta = $id_carpeta;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getFichero() {
        return $this->fichero;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId_carpeta() {
        return $this->id_carpeta;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setFichero($fichero){
        $this->fichero = $fichero;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setId_carpeta($id_carpeta) {
        $this->id_carpeta = $id_carpeta;
    }

    function set($param) {
        $this->id = $param[0];
        $this->fichero = $param[1];
        $this->nombre = $param[2];
        $this->id_carpeta = $param[3];
    }

}
