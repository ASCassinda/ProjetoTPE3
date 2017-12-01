<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../model/Classes/Usuario.php';
require_once '../model/DAO/UsuarioDAO.php';
require_once "../model/DAO/UsuarioDAO.php";



$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
if (isset($_POST['Confirmar'])) {


    $nome = filter_input(INPUT_POST, "editName");
    $email = filter_input(INPUT_POST, "editEmail");
    $telemovel = filter_input(INPUT_POST, "editTelemovel");
    $login = filter_input(INPUT_POST, "editnomeLogin");
    $senha = filter_input(INPUT_POST, "editPassword");
    
   

    $usuario = new Usuario();
    $usuario->setId($dados);
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setTelemovel($telemovel);
    $usuario->setTipoUsuario("Administrativo");
    $usuario->setNomeLogin($login);
    $usuario->setSenhaLogin($senha);
    
   /* echo 'caixa='.$email;echo 'bd='.$dados['email'];
    echo 'caixa='.$senha;echo 'bd='.$dados['palavraPasse'];
    echo 'caixa='.$telemovel;echo 'bd='.$dados['telemovel'];*/
    $usuarioDAO = new UsuarioDAO();
   
    if($nome!=$dados['nomeUtilizador'] || $email!=$dados['email'] || $senha!=$dados['palavraPasse'] || $telemovel!=$dados['telemovel']){
    $usuario->setEstado("Activo");
   if ($usuarioDAO->updateAdmin($usuario)) {
        header("location:../index.php");
    }
    }
    else{
        header("location:../index.php");
    }
    
}