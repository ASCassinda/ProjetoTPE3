<?php

class Marcacao{
    
    private $idMarcacao; 
    private $idProfissional;
    private $idCategoria;
    private $idServico;
    private $idHorario;
    private $idUtilizador;
    private $dataMarcacao;
    
    function getIdMarcacao() {
        return $this->idMarcacao;
    }

    function getDataMarcacao() {
        return $this->dataMarcacao;
    }

    function getIdHorario() {
        return $this->idHorario;
    }
    
    function getIdServico() {
        return $this->idServico;
    }

    function getIdCategoria() {
        return $this->idCategoria;
    }

     function getIdUtilizador() {
        return $this->idUtilizador;
    }
    
     function getIdProfissional() {
        return $this->idProfissional;
    }
    
    function setIdMarcacao($idMarcacao) {
        $this->idMarcacao = $idMarcacao;
    }

    function setDataMarcacao($dataMarcacao) {
        $this->dataMarcacao = $dataMarcacao;
    }

    function setIdHorario($horario) {
        $this->idHorario= $horario;
        
    }
     function setIdProfissional($idProfissional) {
        $this->idProfissional = $idProfissional;
    }

    function setIdCategoria($idCategoria) {
        $this->idCategoria= $idCategoria;
    }
    
    
    function setIdServico($idServico) {
        $this->idServico= $idServico;
    }
    
    function setIdUtilizador($idUtilizador) {
        $this->idUtilizador= $idUtilizador;
    }


}

