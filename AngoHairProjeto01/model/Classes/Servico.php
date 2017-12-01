<?php

class ServicoModel{
    private $id;
    private $idCategoria;
    private $servico;
    private $preco;
    
    function getId() {
        return $this->id;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }
    
    function getServico() {
        return $this->servico;
    }
    
    function getPreco() {
        return $this->preco;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setServico($servico) {
        $this->servico = $servico;
    }
   
     function setIdCategoria($idCategoria) {
        $this->idCategoria = $idCategoria;
    }
    
    function setPreco($preco) {
        $this->preco = $preco;
    }
 
}





