<?php

    require_once __DIR__.'/../DBConfig/DBConfig.php';
    

class ServicosDAO {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }

    public function insert($servico) {
        $nomeServico = $servico->getServico();
        $idCategoria = $servico->getIdCategoria();
        $preco = $servico->getPreco();
        try { 
                $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirServicos(:snomeServico, :sidCategoria, :spreco);");
            $dado->bindParam(":snomeServico", $nomeServico);
            $dado->bindParam(":sidCategoria", $idCategoria);
            $dado->bindParam(":spreco", $preco);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function update($servico) {

        $idServico = $servico->getId();
        $nomeServico = $servico->getServico();
        $idCategoria = $servico->getIdCategoria();
        $preco = $servico->getPreco();
        
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoAlterarServico(:id,:snomeServico ,:scategoria ,:spreco );");

            $dado->bindParam(":id", $idServico);
            $dado->bindParam(":snomeServico", $nomeServico);
            $dado->bindParam(":scategoria", $idCategoria);
            $dado->bindParam(":spreco", $preco);
           
            $dado->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function delete($servico) {
        
        $idServico= $servico->getId();
        try {
            $dado = $this->db->conexao()->prepare("call procedimentoEliminarServicos(:id) ");
            $dado->bindparam(":id", $idServico);
            return $dado->execute();
            
        } catch (PDOException $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

   public function visualizarServicos() {
        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.viewvisualizarservicos;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
    public function getById($idervico) {
        try {
             $id = $idervico;
             $dado = $this->db->conexao()->prepare("SELECT * FROM viewvisualizarservicos WHERE idServico=:id");
            $dado->bindparam(":id", $id);
            if($dado->execute()){
                return $dado->fetch(PDO:: FETCH_ASSOC);  
            }else{
            return false;
            }
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
    }
 

}