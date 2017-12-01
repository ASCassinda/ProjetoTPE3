<?php

require_once '../../model/DAO/MarcacaoDAO.php';
      
$marcacaoDAO=new MarcacaoDAO();

 //$idCategoria = filter_input(INPUT_POST, "idCat");
  //$idCategoria = filter_input(INPUT_POST, "idCat");
if(isset($_POST['idCat'])):
    $idCategoria = filter_input(INPUT_POST, "idCat");
    echo json_encode($marcacaoDAO->visualizarServicosDependecia($idCategoria));
endif;

if(isset($_POST['idServico'])):
    $servico = filter_input(INPUT_POST, "idServico");
    echo json_encode($marcacaoDAO->visualizarProfissionaisDependecia(1));

endif;




