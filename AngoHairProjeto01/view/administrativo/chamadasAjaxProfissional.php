<?php
require_once '../../model/DAO/MarcacaoDAO.php';    
$marcacaoDAO=new MarcacaoDAO();

if(isset($_POST['idCat'])):
    $idCategoria = filter_input(INPUT_POST, "idCat");
    echo json_encode($marcacaoDAO->visualizarServicosIdCategoria($idCategoria));
endif;
