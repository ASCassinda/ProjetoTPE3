<?php
require_once '../model/DAO/UsuarioDAO.php';
include_once '../model/Classes/Usuario.php';
include_once '../model/DAO/ServicosDAO.php';
include_once '../model/Classes/Servico.php';
include_once '../model/DAO/ProfissionalDAO.php';
include_once '../model/Classes/Profissional.php';
require_once '../model/DAO/HorarioDAO.php';
require_once '../model/DAO/CategoriaDAO.php';

$categoriaDAO=new CategoriaDAO();

$horarioDAO = new HorarioDAO();
$profissionalDAO = new ProfissionalDAO();
$profissional = new Profissional();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
$servicoDAO = new ServicosDAO();
$servico = new ServicoModel();
if (isset($_GET['excluir']) AND $_GET['excluir'] == true):
    $idProfissional = $_GET['id'];
    $profissional->setIdProfissional($idProfissional);
    if($profissionalDAO->delete($profissional)){
    
            header("location:../view/administrativo/gerirProfissionais.php");
        }else{
             header("location:../view/administrativo/gerirProfissionais.php?sms=profissional não eliminado");
        }
endif;