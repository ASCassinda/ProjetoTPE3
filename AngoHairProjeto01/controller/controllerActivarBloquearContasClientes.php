<?php

include_once '../model/DAO/UsuarioDAO.php';
include_once '../model/Classes/Usuario.php';

$usuarioDAO = new UsuarioDAO();
$usuario=new Usuario();
$dados = $usuarioDAO->getById($idUtilizador);

if (isset($_GET['bloquear']) && $_GET['bloquear'] == true):
     $id=filter_input(INPUT_GET, "id");
    $usuario->setId($id);
    if($usuarioDAO->activarContaCliente($usuario)){
      header("location:../view/administrador/activarConta.php");  
    }
endif;


if (isset($_GET['activa']) && $_GET['activa'] == true):
    $id=filter_input(INPUT_GET, "id");
    $usuario->setId($id);
    if($usuarioDAO->bloquearContaCliente($usuario)){
      header("location:../view/administrador/bloquearConta.php");  
    }
endif;