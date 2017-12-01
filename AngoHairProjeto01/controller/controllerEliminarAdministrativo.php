<?php
include_once '../model/DAO/UsuarioDAO.php';
include_once '../model/Classes/Usuario.php';
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);

if (isset($_GET['deletar']) && $_GET['deletar'] == true):
    $id = $_GET['id'];
    $usuario = new Usuario();
    $usuario->setId($id);
    if($usuarioDAO->delete($usuario)){
        header("location:../view/administrador/verAdmin.php");
        
    }
endif;
     