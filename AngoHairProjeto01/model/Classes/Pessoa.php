<?php

abstract class Pessoa{
    private $id;
    private $nome;
    private $email;
    private $telemovel;
    
    /*public function __construct($id, $nome, $email, $telemovel) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telemovel = $telemovel;
    }*/
    
    public function getId() {
        return $this->id;
    }
    
    public function getNome() {
        return $this->nome;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getTelemovel() {
        return $this->telemovel;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setTelemovel($telemovel) {
        $this->telemovel = $telemovel;
    }
    
}
