<?php
include_once '../model/DAO/ServicosDAO.php';
include_once '../model/Classes/Servico.php';


$servicoDAO = new ServicosDAO();
$servico = new ServicoModel();
if (isset($_POST['alterar'])) {
    $nomeServico = filter_input(INPUT_POST, "nomeServico");
    $idServico = filter_input(INPUT_GET, "idServico");
    $idCategoria = filter_input(INPUT_POST, "categoria");
    $preco = filter_input(INPUT_POST, "preco");

    $servico = new ServicoModel();
    $servico->setServico($nomeServico);
    $servico->setId($idServico);
    $servico->setIdCategoria($idCategoria);
    $servico->setPreco($preco);
    
    $servicoDAO = new ServicosDAO();
   
    if ($servicoDAO->update($servico)) {
        header("location:../view/administrativo/gerirServicos.php");
    } else {
        header("location:../view/administrativo/gerirServicos.php?sms=servico não cadastrado");
    } 
} 
     