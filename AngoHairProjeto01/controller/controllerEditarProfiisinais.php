<?php
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/Classes/Usuario.php';
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/Classes/Servico.php';
require_once '../../model/DAO/ProfissionalDAO.php';
require_once '../../model/Classes/Profissional.php';
require_once '../../model/DAO/HorarioDAO.php';

$profissionalDAO=new ProfissionalDAO();
$horarioDAO = new HorarioDAO();
$idProfissional = filter_input(INPUT_GET, "idProfissional");
$dados = $profissionalDAO->getById($idProfissional);
$servicoDAO =new ServicosDAO();
    // Instanciando objectos
   
if(isset($_POST['alterar'])){
    $nomeProfissional = filter_input(INPUT_POST, "nomeProfissional");
    $idServico = filter_input(INPUT_POST, "servico");
    $email = filter_input(INPUT_POST, "email");
    $telemovel = filter_input(INPUT_POST, "telemovel");
    
    $profissional=new Profissional();
    $profissional->setNomeProfissional($nomeProfissional);
    $profissional->setEmail($email);
    $profissional->setTelemovel($telemovel);
    $profissional->setIdServico($idServico);
    $profissional->setIdProfissional($idProfissional);
        if($profissionalDAO->update($profissional)){
            header("location:gerirProfissionais.php");
        }else{
            header("location:gerirProfissionais.php?sms=profissional não alterado");
        }
    }