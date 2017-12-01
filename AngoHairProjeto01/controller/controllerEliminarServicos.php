<?php
include_once '../model/DAO/ServicosDAO.php';
include_once '../model/Classes/Servico.php';
require_once '../model/DAO/CategoriaDAO.php';

$servicoDAO = new ServicosDAO();
$servico = new ServicoModel();

if (isset($_GET['excluir']) && $_GET['excluir'] == true):
    $id = filter_input(INPUT_GET, "idServico");
    $servico->setId($id);
     if($servicoDAO->delete($servico)){
           
            header("location:../view/administrativo/gerirServicos.php");
        }else{
             header("location:../view/administrativo/gerirServicos.php?sms=servico não cadastrado");
        }
endif;
     