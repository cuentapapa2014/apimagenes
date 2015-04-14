<?php

class SubirArchivo {

    private $archivos, $carpeta, $tamanho, $error;

    function __construct($archivos) {
        $this->archivos = $archivos;
        $this->carpeta = "./";
        $this->tamanho = 4096;
        $this->error = array();
    }

    public function setCarpetaDestino($carpeta) {
        $this->carpeta = $carpeta;
    }

    private function setTamanhoMaximo($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function numeroArchivos() {
        return count($this->archivos);
    }

    public function subir() {
        //if (is_array($this->archivos['name'])) {
            foreach ($this->archivos['error'] as $key => $value) {
                $n = pathinfo($this->archivos['name'][$key]);
                if ($value === 0) {
                    if(strpos($this->archivos['type'][$key],"image")!== FALSE){                  
                    $nombre = count(scandir($this->carpeta));
                    //$fichero = $nombre . "." . $n['extension'];
                    while (file_exists($this->carpeta . $nombre)) {
                        $nombre++;
                    }
                    if (!move_uploaded_file($this->archivos['tmp_name'][$key], $this->carpeta . $nombre)) {
                        $this->error[$n['filename']] = $this->archivos['error'];
                        
                    }
                    else{
                        $this->error[$n['filename']][0] = 0;
                        $this->error[$n['filename']][1] = $nombre;
                    }
                    }
                }              
            }
        return $this->error;
    }

}
