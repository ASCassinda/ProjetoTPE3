<?php
include_once '../model/DAO/UsuarioDAO.php';
include_once '../model/Classes/Usuario.php';
include_once '../model/DAO/ServicosDAO.php';
include_once '../model/Classes/Servico.php';
include_once '../model/Classes/Profissional.php';
require_once '../model/DAO/ProfissionalDAO.php';
$profissional = new Profissional();
$profissionalDAO = new ProfissionalDAO();
$usuarioDAO = new UsuarioDAO();
$servicoDAO = new ServicosDAO();
$servico = new ServicoModel();

if (isset($_POST['cadastrar'])) {
    $nomeProfissional = filter_input(INPUT_POST, "nomeProfissional");
    $email = filter_input(INPUT_POST, "email");
    $telemovel = filter_input(INPUT_POST, "telemovel");
    $horario = filter_input(INPUT_POST, "horarios");
    $idServico = filter_input(INPUT_POST, "servicos");

    $profissional->setNomeProfissional($nomeProfissional);
    $profissional->setEmail($email);
    $profissional->setTelemovel($telemovel);
    
    $profissionalDAO->insert($profissional);
    
    $ultimoId = $profissionalDAO->pegarUltimoId();
    foreach($ultimoId as $pegarUltimo):
         $ultimoId = $pegarUltimo[0];
    endforeach;

    $profissional->setIdProfissional($ultimoId);
    
    if ($_POST['horarios'] != "") {
        if (is_array($_POST['horarios'])) {
            while (list($i, $valor) = each($_POST['horarios'])) {
                $profissional->setHorario($valor);
                 $profissionalDAO->insertProfissionalHorario($profissional);
            }
        }
    }
    
    if ($_POST['servicos'] != "") {
        if (is_array($_POST['servicos'])) {
            while (list($i, $valor2) = each($_POST['servicos'])) {
                $profissional->setIdServico($valor2);
                $profissionalDAO->insertProfissionalServico($profissional);
            }
        }
    }
        header('location: ../view/administrativo/gerirProfissionais.php');
}

