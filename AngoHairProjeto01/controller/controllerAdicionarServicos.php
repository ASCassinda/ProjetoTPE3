<?php
include_once '../model/DAO/ServicosDAO.php';
include_once '../model/Classes/Servico.php';
require_once '../model/DAO/CategoriaDAO.php';
$servicoDAO =new ServicosDAO();
$servico= new ServicoModel();
    
    // Instanciando objectos
    $categoriaDAO=new CategoriaDAO();
    
    if(isset($_POST['cadastrar'])){
        $nomeServico = filter_input(INPUT_POST, "nomeServico");
        $idCategoria = filter_input(INPUT_POST, "categoria");
        $preco = filter_input(INPUT_POST, "preco");
        $servico = new ServicoModel();
        
        $servico->setServico($nomeServico);
        $servico->setIdCategoria($idCategoria);
        $servico->setPreco($preco);
        $servicoDAO = new ServicosDAO();
        
        if($servicoDAO->insert($servico)){
           
            header("location:../view/administrativo/gerirServicos.php");
        }else{
             header("location:../view/administrativo/gerirServicos.php?sms=servico não cadastrado");
        }
        
    }