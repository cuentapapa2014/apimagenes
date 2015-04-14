<?php
/**
 * Description of Sesion
 *
 * @author MARTIN
 */
class Sesion {
    function __construct($id) {
        if(session_id() == ''){
        session_start();
        session_id($id);
        }
    }
    
    function set($param, $value) {
        $_SESSION[param] = $value;
    }
    
    function get($param){
        if (isset($_SESSION[$param])){
            return $_SESSION[$param];
        }
        return NULL;
    }
    
    function destroy(){
        session_destroy();
    }

}
