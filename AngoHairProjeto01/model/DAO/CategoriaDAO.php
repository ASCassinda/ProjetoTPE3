<?php

    require_once __DIR__.'/../DBConfig/DBConfig.php';

class CategoriaDAO {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }


    public function visualizarCategoria() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT *FROM viewvisualizarcategoria");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
}