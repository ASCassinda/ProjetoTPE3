<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../model/Classes/Marcacao.php';
require_once '../model/DAO/MarcacaoDAO.php';

$marcacaoDAO = new MarcacaoDAO();
$marcacao=new Marcacao();
$idMarcacao = filter_input(INPUT_GET, "idMarcacao");

if (isset($_POST['alterar'])) {
        
        $idprofissional = filter_input(INPUT_POST, "profissional");
        $idcategoria = filter_input(INPUT_POST, "categoria");
        $idservicos = filter_input(INPUT_POST, "servico");
        $horario = filter_input(INPUT_POST, "horario");
        $data= filter_input(INPUT_POST, "data");
        
        echo $data.'='.$idcategoria.'-'.$idservicos.'-'.$horario.'-'.$idprofissional.'-'.$idMarcacao;

        $marcacao->setIdMarcacao($idMarcacao);
        $marcacao->setDataMarcacao($data);
        $marcacao->setIdProfissional($idprofissional);
        $marcacao->setIdServico($idservicos);
        $marcacao->setIdCategoria($idcategoria);
        $marcacao->setIdHorario($horario);
        
    if ($marcacaoDAO->update($marcacao)) {
        header("location:../view/cliente/alterarReagendamento.php");
    } else {
        header("location:../view/cliente/alterarReagendamento.php?sms=marcacao não alterada");
    }
       
         
}
  