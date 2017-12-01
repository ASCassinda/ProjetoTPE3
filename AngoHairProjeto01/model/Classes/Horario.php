<?php

class Horario{
    private $idHorario;
    private $horario;
    
    function getIdHorio() {
        return $this->idHorario;
    }

    function getHorario() {
        return $this->horario;
    }

    function setIdHorario($idHorario) {
        $this->idHorario = $idHorario;
    }

    function setHorario($horario) {
        $this->horario = $horario;
    }
 
}

