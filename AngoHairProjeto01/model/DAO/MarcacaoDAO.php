<?php
    require_once __DIR__.'/../DBConfig/DBConfig.php';

class MarcacaoDAO {

    private $db;

    function __construct() {
        $this->db = new DBConfig();
    }
    
    public function insert($marcacao) {
        
        $idCategoria = $marcacao->getIdCategoria();
        $idServico = $marcacao->getIdServico();
        $idProfissional = $marcacao->getIdProfissional();
        $dataMarcacao = $marcacao->getDataMarcacao();
        $idHorario = $marcacao->getIdHorario();
        $idUtilizador = $marcacao->getIdUtilizador();
        try {
            
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoInserirMarcacao(:midUtilizador,:midCategoria,:midServico ,:midProfissional ,:mdataMarcacao ,:midHorario);");
            $dado->bindParam(":midUtilizador", $idUtilizador);
            $dado->bindParam(":midCategoria", $idCategoria);
            $dado->bindParam(":midServico", $idServico);
            $dado->bindParam(":midProfissional", $idProfissional);
            $dado->bindParam(":mdataMarcacao", $dataMarcacao);
            $dado->bindParam(":midHorario", $idHorario);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function update($marcacao) {
        try {   
        $idMarcacao=$marcacao->getIdMarcacao();
        $dataMarcacao=$marcacao->getDataMarcacao();
        $idProfissional=$marcacao->getIdProfissional();
        $idServico=$marcacao->getIdServico();
        $idCategoria=$marcacao->getIdCategoria();
        $idHorario=$marcacao->getIdHorario();
            $dado = $this->db->conexao()->prepare("UPDATE tb_marcacao SET idCategoria = :categoria,idServico = :servico,idProfissional = :profissional,horario = :horario,dataMarcacao=:data WHERE idMarcacao = :id");
            $dado->bindParam(":id", $idMarcacao);
            $dado->bindParam(":categoria", $idCategoria);
            $dado->bindParam(":servico", $idServico);
            $dado->bindParam(":horario", $idHorario);
            $dado->bindParam(":profissional", $idProfissional);
            $dado->bindParam(":data", $dataMarcacao);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    public function updateData($marcacao) {
        try {   
        $idMarcacao=$marcacao->getIdMarcacao();
        $dataMarcacao=$marcacao->getDataMarcacao();
        
            $dado = $this->db->conexao()->prepare("UPDATE tb_marcacao SET dataMarcacao=:data WHERE idMarcacao = :id");
            $dado->bindParam(":id", $idMarcacao);
            $dado->bindParam(":data", $dataMarcacao);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    
      public function confirmarReagendamento($marcacao) {
        $idMarcacao = $marcacao->getIdMarcacao();
        try {
            $dado = $this->db->conexao()->prepare("call procedimentoAlterarMarcacaoConfirmar(:id)");
            $dado->bindParam(":id", $idMarcacao);          
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
     public function activarReagendamento($marcacao) {
        $idMarcacao = $marcacao->getIdMarcacao();
        try {
            $dado = $this->db->conexao()->prepare("call procedimentoAlterarMarcacaoActivo(:id)");
            $dado->bindParam(":id", $idMarcacao);          
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }
    
    
      public function cancelarReagendamento($marcacao) {
        $idMarcacao = $marcacao->getIdMarcacao();
        try {
            $dado = $this->db->conexao()->prepare("call procedimentoAlterarMarcacaoBloqueado(:id)");
            $dado->bindParam(":id", $idMarcacao);          
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            return false;
        }
    }

    public function delete($marcacao) {

        $idMarcacao= $marcacao->getIdMarcacao();

        try {
            $dado = $this->db->conexao()->prepare("DELETE FROM tb_marcacao WHERE idMarcacao=:idMarcacao;");
            $dado->bindparam(":idMarcacao", $idMarcacao);
            $dado->execute();
            return true;
        } catch (PDOException $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    
       public function visualizarMarcacoes($id) {
           $idUtilizador=$id;
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoVisualizarMarcacao(:id);");
            $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
       public function visualizarReagendamentosActivo($id) {
           $idMarcacao=$id;
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoVisualizarMarcacaoActiva(:id);");
            $dado->bindparam(":id", $idMarcacao);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
        public function visualizarMarcacoesActivo() {
        try {
            $dado = $this->db->conexao()->prepare("SELECT *
                         FROM tb_marcacao inner join tb_categoria
                               on   tb_marcacao.idCategoria=tb_categoria.idCategoria inner join tb_utilizador
                                            on   tb_marcacao.idUtilizador= tb_utilizador.idUtilizador inner join tb_servico
                                               on   tb_marcacao.idServico= tb_servico.idServico inner join tb_profissional
                                               on  tb_marcacao.idProfissional=tb_profissional.idProfissional inner join tb_horario
                                               on  tb_marcacao.horario=tb_horario.horario
                                              WHERE tb_marcacao.estado='Aguardando confirmacao ...' 
                                              ORDER BY tb_marcacao.dataMarcacao;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
     public function ContarVisualizarMarcacoesActivo() {
        try {
            $dado = $this->db->conexao()->prepare("SELECT count(idMarcacao) as contador FROM tb_marcacao WHERE estado='Aguardando confirmacao ...' ;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
     public function ContarVisualizarMarcacoesEmEspera($idUtilizador) {
        try {
            $dado = $this->db->conexao()->prepare("SELECT count(idMarcacao) as contador FROM tb_marcacao WHERE estado='Aguardando confirmacao ...' And idUtilizador=:id;");
            $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    public function ContarVisualizarMarcacoesConfirmada($idUtilizador) {
        try {
            $dado = $this->db->conexao()->prepare("SELECT count(idMarcacao) as contador FROM tb_marcacao WHERE estado='Confirmada' And idUtilizador=:id ;");
            $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    public function ContarVisualizarMarcacoesCanceleda($idUtilizador) {
        try {
            $dado = $this->db->conexao()->prepare("SELECT count(idMarcacao) as contador FROM tb_marcacao WHERE estado='Bloqueado' And idUtilizador=:id ;");
            $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
    public function visualizarAllMarcacoes($idUtilizador) {
        
        try {
            $dado = $this->db->conexao()->prepare("SELECT tb_marcacao.idMarcacao,tb_horario.horario,tb_utilizador.nomeUtilizador,tb_categoria.nomeCategoria,tb_servico.nomeServico,tb_marcacao.estado,tb_marcacao.dataMarcacao,tb_profissional.nomeProfissional
                         FROM tb_marcacao inner join tb_categoria
                               on   tb_marcacao.idCategoria=tb_categoria.idCategoria inner join tb_utilizador
                               on   tb_marcacao.idUtilizador= tb_utilizador.idUtilizador inner join tb_servico
                               on   tb_marcacao.idServico= tb_servico.idServico inner join tb_profissional
                               on  tb_marcacao.idProfissional=tb_profissional.idProfissional inner join tb_horario
                               on  tb_marcacao.horario=tb_horario.horario
                               WHERE tb_utilizador.idUtilizador=:id;");
             $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    public function visualizarMarcacoesConfirmadas() {
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoVisualizarMarcacaoConfirmadas();");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
      public function visualizarMarcacoesBloqueadas($id) {
           $idUtilizador=$id;
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoVisualizarMarcacaoBloqueadas(:id);");
            $dado->bindparam(":id", $idUtilizador);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    

           public function visualizarClientesQueSolicitamMaisServicos() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.visaoclintessolicitando;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
     public function visualizarServicosMaisSolicitados() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.visaoservicosmaissolicitados;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
    
    
     public function visualizarProfissionaisMaisSolicitados() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.visaofuncionariosatendemmarcoes;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
       public function visualizarHorariosMaisSolicitados() {

        try {
            $dado = $this->db->conexao()->prepare("SELECT * FROM bd_angohairsv02.visaohorariomaismarcado;");
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
      public function visualizarServicosIdCategoria($idCategoria) {
        try {
            $dado = $this->db->conexao()->prepare("select idServico,nomeServico from tb_servico where idCategoria=:id");
            $dado->bindparam(":id", $idCategoria);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
     
    
     public function visualizarProfissionaisIdServico($idProfissional) {
        try {
            $dado = $this->db->conexao()->prepare("SELECT tb_servico.idServico,tb_profissional.nomeProfissional,tb_profissional.idProfissional from tb_agendamento inner join tb_servico
                                                    ON  tb_agendamento.idServico=tb_servico.idServico inner join tb_profissional
                                                    ON  tb_agendamento.idProfissional=tb_profissional.idProfissional where tb_servico.idServico=:id;");
            $dado->bindparam(":id", $idProfissional);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
    
      public function visualizarProfissionaisIdHorario($idProfissional) {
        try {
            $dado = $this->db->conexao()->prepare("select tb_horario.horario,tb_horarioprofissional.idProfissional 
                                                    from tb_horarioprofissional inner join tb_horario
                                                    on  tb_horarioprofissional.horario=tb_horario.horario inner join tb_profissional
                                                    on  tb_horarioprofissional.idProfissional=tb_profissional.idProfissional where tb_profissional.idProfissional=:id;");
            $dado->bindparam(":id", $idProfissional);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }

    public function visualizarMarcacaoId($idMarcacao) {
            $id = $idMarcacao;
        try {
            $dado = $this->db->conexao()->prepare("call bd_angohairsv02.procedimentoVisualizarMarcacaoIdMarcacao(:id);");
            $dado->bindparam(":id", $id);
            $dado->execute();
            return $dado->fetchAll();
           
        } catch (Exception $ex) {
            return 'Erro ' . $ex->getMessage();
        }
    }
}


