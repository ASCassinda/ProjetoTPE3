<?php

session_start();
$idUtilizador = $_SESSION['idUtilizador'];
    require_once '../model/Classes/Usuario.php';
    require_once '../model/DAO/UsuarioDAO.php';
    require_once '../model/DAO/MarcacaoDAO.php';
    require_once '../model/Classes/Marcacao.php';
  
    
    if(isset($_POST['btnConfirmar'])){    
        
        $nomeUtilizador = filter_input(INPUT_POST, "nomeUtilizador");
        $dataMarcacao = filter_input(INPUT_POST, "dataMarcacao");
        $profissional = filter_input(INPUT_POST, "profissional");
        $categoria = filter_input(INPUT_POST, "categoria");
        $servico = filter_input(INPUT_POST, "servico");
        $horario = filter_input(INPUT_POST, "horario");

        $marcacaoDAO = new MarcacaoDAO();
        $marcacao=new Marcacao();
        $marcacao->setIdUtilizador($idUtilizador);
        $marcacao->setDataMarcacao("2017/02/01");
        $marcacao->setIdProfissional($profissional);
        $marcacao->setIdServico($servico);
        $marcacao->setIdCategoria($categoria);
       
        $marcacao->setIdHorario($horario);
        $verifcar =$marcacaoDAO->insert($marcacao);
        if($verifcar==true){
            //enviar($senha, $email);
            header("location:../view/cliente/solicitarMarcacao.php");
        }else{
             header("location:../view/cliente/solicitarMarcacao.php?sms=Marcacao não cadastrado");
        } 
        
    }


