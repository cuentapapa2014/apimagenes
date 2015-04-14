<?php
/**
 * Description of User
 *
 * @author MARTIN
 */
class User {
    //put your code here
    private $id;
    private $login;
    private $password;
    
    function __construct($id=NULL, $login=NULL, $password=NULL) {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function set($param) {
        $this->id = $param[0];
        $this->login = $param[1];
        $this->password = $param[2];
    }
}
