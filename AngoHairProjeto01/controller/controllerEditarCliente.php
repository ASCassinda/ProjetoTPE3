<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../model/Classes/Usuario.php';
require_once '../model/DAO/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
if (isset($_POST['alterar'])) {


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
    $usuario->setTipoUsuario("Cliente");
    $usuario->setNomeLogin($login);
    $usuario->setSenhaLogin($senha);

    $usuarioDAO = new UsuarioDAO();

    if ($usuarioDAO->update($usuario)) {
        header("location:../view/cliente/LogadoUser.php");
    } else {
        echo"erro";
    }
}else if(isset($_POST['cancelar'])){
    header("location:../view/cliente/LogadoUser.php");
     echo"Dados näo actualizados";
}