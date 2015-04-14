<?php
/**
 * Description of Carpeta
 *
 * @author MARTIN
 */
class Carpeta {
    //put your code here
    private $id;
    private $nombre;
    private $ruta;
    private $id_user;
    
    function __construct($id=NULL, $nombre=NULL, $ruta=NULL, $id_user=NULL) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ruta = $ruta;
        $this->id_user = $id_user;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getRuta() {
        return $this->ruta;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function set($param) {
        $this->id = $param[0];
        $this->nombre = $param[1];
        $this->ruta = $param[2];
        $this->id_user = $param[3];
    }
}
