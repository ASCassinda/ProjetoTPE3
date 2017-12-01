<?php
require_once __DIR__.'/../DBConfig/DBConfig.php';

class ProfissionalDAO {
private $db;
    function __construct() {
        $this->db = new DBConfig();
    }

    public function insert($profissional) {
        $nomePofissional = $profissional->getNomeProfissional();
        $email = $profissional->getEmail();
        $telemovel = $profissional->getTelemovel();

        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirProfissional(:pnomeProfissional, :pemail, :ptelemovel);");
            $dado->bindParam(":pnomeProfissional", $nomePofissional);
            $dado->bindParam(":pemail", $email);
            $dado->bindParam(":ptelemovel", $telemovel);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    
     public function insertProfissionalHorario($profissional) {
        $idProfissional = $profissional->getIdProfissional();
        $horario = $profissional->getHorario();
         try {
            
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirHorarioProfissional(:profissional,:horario);");
            $dado->bindParam(":horario", $horario);
            $dado->bindParam(":profissional", $idProfissional);
            $dado->execute();
                 return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    
     }
     
      public function insertProfissionalServico($profissional) {
        $idProfissional = $profissional->getIdProfissional();
        $servico = $profissional->getIdServico();
         try {
            
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirServicoProfissional(:profissional, :servico);");
            $dado->bindParam(":servico", $servico);
            $dado->bindParam(":profissional", $idProfissional);
            $dado->execute();
                 return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    
     }


    public function update($profissional) {
    $nomeProfissional=$profissional->getNomeProfissional();
    $email=$profissional->getEmail();
    $telemovel=$profissional->getTelemovel();
    $idServico=$profissional->getIdServico();
    $id=$profissional->getIdProfissional();
        try {
                
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoAlterarProfissional(:id,:fnome ,:femail ,:fnumeroTelemovel );");
            $dado->bindParam(":id", $id);
            $dado->bindParam(":fnome", $nomeProfissional);
            $dado->bindParam(":femail", $email);
            $dado->bindParam(":fnumeroTelemovel", $telemovel);
            $dado->bindParam(":fservico", $idServico);
            $dado->execute();

            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function pegarUltimoId() {
        
        try{
            $dado = $this->db->conexao()->prepare("select max(idProfissional) from viewvisualizarprofissionais;");
            $dado->execute();
            return $dado->fetchAll();
            
        } catch (Exception $ex) {

        }
    }
  

    public function delete($profissional) {

        $id = $profissional->getIdProfissional();
        
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoEliminarProfissionais(:id);");
            $dado->bindparam(":id", $id);
            return $dado->execute();
            } catch (PDOException $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function visualizarProfissional() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.viewvisualizarprofissionais;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
    public function visualizarServicosProfissional($idProfissional) {
         
        try {
            $dado = $this->db->conexao()->prepare("SELECT tb_servico.nomeServico 
                                                   FROM tb_agendamento inner join tb_servico
                                                    ON tb_agendamento.idServico=tb_servico.idServico
                                                    WHERE tb_agendamento.idProfissional=:idProfissional;");
            $dado->bindparam(":idProfissional", $idProfissional);
            $dado->execute();
            return $dado->fetchAll();  
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
     public function visualizarHorarioProfissional($idProfissional) {

        try {
            $dado = $this->db->conexao()->prepare("SELECT *
                                                   FROM tb_horarioprofissional inner join tb_horario
                                                    ON tb_horarioprofissional.horario=tb_horario.horario
                                                    WHERE tb_horarioprofissional.idProfissional=:idProfissional;");
            $dado->bindparam(":idProfissional", $idProfissional);
            $dado->execute();
            return $dado->fetchAll();  
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    

    public function getById($profissional) {
        try {
            $id = $profissional;
            $dado=$this->db->conexao()->prepare("SELECT * FROM viewvisualizarprofissionais WHERE idProfissional=:id");
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