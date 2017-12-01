<?php

class Profissional{
    private $horario;
    private $nomeProfissional;
    private $idServico;
    private $email;
    private $telemovel;
    private $idProfissional;
    
    
    function getHorario() {
        return $this->horario;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }

     function getNomeProfissional() {
        return $this->nomeProfissional;
    }

    function setNomeProfissional($nomeProfissional) {
        $this->nomeProfissional = $nomeProfissional;
    }
    
    
     function getIdServico() {
        return $this->idServico;
    }

    function setIdServico($idServico) {
        $this->idServico = $idServico;
    }
    
     function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
     function getTelemovel() {
        return $this->telemovel;
    }

    function setTelemovel($telemovel) {
        $this->telemovel = $telemovel;
    }
    
      function getIdProfissional() {
        return $this->idProfissional;
    }

    function setIdProfissional($idProfissional) {
        $this->idProfissional = $idProfissional;
    }
    
    
    


}

