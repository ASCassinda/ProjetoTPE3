<?php
require_once '../model/Classes/Usuario.php';
require_once '../model/DAO/UsuarioDAO.php';
require_once '../model/DAO/MarcacaoDAO.php';
require_once '../model/Classes/Marcacao.php';
$marcacaoDAO= new MarcacaoDAO();
$marcacao=new Marcacao();

if (isset($_GET['activar']) && $_GET['activar'] == true):
    $idMarcacao = $_GET['id'];
    $marcacao->setIdMarcacao($idMarcacao);
    if($marcacaoDAO->activarReagendamento($marcacao)){
        header("location:../view/cliente/confirmarReagendamento.php");
    }

endif;

if (isset($_GET['cancelar']) && $_GET['cancelar'] == true):
    $idMarcacao = $_GET['id'];
    $marcacao->setIdMarcacao($idMarcacao);
    if($marcacaoDAO->cancelarReagendamento($marcacao)){
        header("location:../view/cliente/cancelarReagendamento.php");
    }
endif;


if (isset($_GET['confirmar']) && $_GET['confirmar'] == true):
    $idMarcacao = $_GET['id'];
    $marcacao->setIdMarcacao($idMarcacao);
    if($marcacaoDAO->confirmarReagendamento($marcacao)){
        header("location:../view/administrativo/confirmarPedidosMarcacao.php");
    }
endif;


