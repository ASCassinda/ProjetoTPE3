<?php
include_once '../model/DAO/UsuarioDAO.php';
include_once '../model/Classes/Usuario.php';
include_once '../model/Classes/Admin.php';
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
$valor = new Admin();

if (isset($_GET['bloquear']) && $_GET['bloquear'] == true):
    $id = filter_input(INPUT_GET, "id");
    $query = "UPDATE tb_utilizador SET estado='Activo' WHERE idUtilizador = $id";
    if($valor->bloquearConta($query, 2)){
        header("location:../view/administrador/activarConta.php'");
    }
endif;