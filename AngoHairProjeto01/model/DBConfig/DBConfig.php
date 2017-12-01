<?php

class DBConfig{
        public $pdo;
        public $baseDados;
        public $servidor;
        public $usuario;
        public $senha;
    
    public function __construct() {
        
        $this->baseDados = "bd_angohairsv02";
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
    }


    public function conexao(){
        try{
            
            $this->pdo = new PDO("mysql:host=$this->servidor;dbname=$this->baseDados", $this->usuario, $this->senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->pdo;

        } catch (PDOException $ex) {
        echo 'Erro: '.$ex->getMessage();
           return false;
        }
    }
  
}

