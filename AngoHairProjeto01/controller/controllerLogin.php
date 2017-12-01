<?php
session_start();
    require_once "../model/Classes/Usuario.php";
    require_once "../model/DAO/UsuarioDAO.php";
     require_once "../model/DAO/Crud.php";


$verifcar=new Crud();
if (isset($_POST['entrar'])) {
    $nomeLogin = filter_input(INPUT_POST, "nomeUsuario");
    $senhaLogin = filter_input(INPUT_POST, "senha");

    $usuario = new Usuario();

    $usuario->setNomeLogin($nomeLogin);
    $usuario->setSenhaLogin($senhaLogin);

    $usuarioDAO = new UsuarioDAO();
    $resultado = $usuarioDAO->logar($usuario);

    if ($resultado != false) {
        $_SESSION['idUtilizador'] = $resultado['idUtilizador'];

        if (($resultado['tipoUtilizador'] == "Administrador")) {
            header("location:../view/administrador/Administrador.php");
        } else if (($resultado['tipoUtilizador'] == "Cliente")) {
            if($resultado['estado'] == "Bloqueado"){
            header("location:../view/cliente/aguardarValidacao.php");  
            }else{
            header("location:../view/cliente/bemVindo.php");
            } 
            
        } else {
            $idUtilizador=$resultado['idUtilizador'];
            $usuario->setId($idUtilizador);
            //$verifcar->activarAdmin($usuario);
            if($resultado['estado'] == "Bloqueado"){
               header("location:../view/administrativo/alterarSenhaAcesso.php");  
        }else{
          header("location:../view/administrativo/Administrativo.php");
        }
        }
        
        }else {
        
        header("location:../index.php");
    }
}