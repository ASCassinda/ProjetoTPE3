<?php


require 'Pessoa.php';

class Usuario extends Pessoa{
    
    private $id;
    private $nomeLogin;
    private $senhaLogin;
    private $tipoUsuario;
    private $estado;


    public function getId() {
        return $this->id;
    }
    
     public function getNomeLogin() {
        return $this->nomeLogin;
    }

    public function getSenhaLogin() {
        return $this->senhaLogin;
    }

    public function getTipoUsuario() {
        return $this->tipoUsuario;
    }
    
     public function getEstado() {
        return $this->estado;
    }
   
    public function setId($id) {
        $this->id = $id;
    }
    
      public function setNomeLogin($nomeLogin) {
        $this->nomeLogin = $nomeLogin;
    }

    public function setSenhaLogin($senhaLogin) {
        $this->senhaLogin = $senhaLogin;
    }

    public function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }
    
    public function setEstado($estado) {
        $this->estado= $estado;
    }
      
}

