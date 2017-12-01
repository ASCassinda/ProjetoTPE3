<?php
require_once '../../model/DAO/MarcacaoDAO.php';    
$marcacaoDAO=new MarcacaoDAO();



if(isset($_POST['idCat'])):
    $idCategoria = filter_input(INPUT_POST, "idCat");
    echo json_encode($marcacaoDAO->visualizarServicosIdCategoria($idCategoria));
endif;

if(isset($_POST['idServico'])):
    $servico = filter_input(INPUT_POST, "idServico");
    echo json_encode($marcacaoDAO->visualizarProfissionaisIdServico($servico));

endif;

if(isset($_POST['idProfissional'])):
    $profissional = filter_input(INPUT_POST, "idProfissional");
    echo json_encode($marcacaoDAO->visualizarProfissionaisIdHorario($profissional));

endif;


