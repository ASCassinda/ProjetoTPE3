<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../model/Classes/Marcacao.php';
require_once '../model/DAO/MarcacaoDAO.php';

$marcacaoDAO = new MarcacaoDAO();
$marcacao=new Marcacao();
$idMarcacao = filter_input(INPUT_GET, "idMarcacao");

if (isset($_POST['alterar'])) {
        
        
        $data= filter_input(INPUT_POST, "data");
        
        echo $data.'='.$idcategoria.'-'.$idservicos.'-'.$horario.'-'.$idprofissional.'-'.$idMarcacao;

        $marcacao->setIdMarcacao($idMarcacao);
        $marcacao->setDataMarcacao($data);
        
        
    if ($marcacaoDAO->updateData($marcacao)) {
        header("location:../view/Administrativo/reagendar.php?");
    } else {
        header("location:../view/Administrativo/reagendar.php?sms=marcacao não alterada");
    }
       
         
}
  