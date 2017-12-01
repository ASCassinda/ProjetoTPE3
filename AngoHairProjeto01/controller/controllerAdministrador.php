<?php
require_once '../model/Classes/Usuario.php';
require_once '../model/DAO/UsuarioDAO.php';

$usuarioDAO = new UsuarioDAO();
if (isset($_POST['cadastrar'])) {

    $nome = filter_input(INPUT_POST, "nome");
    $email = filter_input(INPUT_POST, "email");
    $telemovel = filter_input(INPUT_POST, "telemovel");
    $login = filter_input(INPUT_POST, "login");
    $senha = filter_input(INPUT_POST, "senha");

    $usuario = new Usuario();

    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setTelemovel($telemovel);
    $usuario->setTipoUsuario("Administrativo");
    $usuario->setNomeLogin($login);
    $usuario->setSenhaLogin($senha);
    $usuario->setEstado("Bloqueado");
    
    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->insert($usuario)) {
        $emailRemetenter = "crwista961@gmail.com";
        $sms = "Já possues uma conta na AngoHairs.";
        //$email->enviar($sms, $emailRemetenter, $email);
        header("location:../view/administrador/Administrador.php");
    }else{
        header("location:../view/administrador/Administrador.php?Erro");
    }
    header("location:../view/administrador/Administrador.php");
}