<?php

     require_once __DIR__.'/../DBConfig/DBConfig.php';

class HorarioDAO {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }


    public function visualizarHorario() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM viewvisualizarhorarios");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

}