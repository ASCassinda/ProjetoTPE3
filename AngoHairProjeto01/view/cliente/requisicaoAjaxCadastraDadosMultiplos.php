<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/DAO/MarcacaoDAO.php';  
require_once '../../model/DAO/UsuarioDAO.php';   
require_once '../../model/Classes/Marcacao.php'; 

$marcacao= new Marcacao();
$marcacaoDAO=new MarcacaoDAO();
$usuarioDAO = new UsuarioDAO();
$dado = $usuarioDAO->getById($idUtilizador);

if(isset($_GET['tipo'])){
    if($_GET['tipo'] == "marcar"){
        
       $utilizador=$idUtilizador;
        $categoria=filter_input(INPUT_POST, 'mCategoria');
        $servico= filter_input(INPUT_POST, 'mServico');
        $profissional  = filter_input(INPUT_POST, 'mProfissional');           
        $hora  = filter_input(INPUT_POST, 'mHorario');
        $data  = filter_input(INPUT_POST, 'mData');
        
        $categorias = explode(',',$categoria);
        $servicos = explode(',',$servico );
        $profissionais = explode(',',$profissional );
        $horarios = explode(',',$hora);
        $datas = explode(',',$data);
        
        $marcacao->setIdUtilizador($utilizador);
        for($i = 0; $i<count($categorias)-1;$i++){
            $marcacao->setIdCategoria($categorias[$i]);
            $marcacao->setIdServico($servicos[$i]);
            $marcacao->setIdProfissional($profissionais[$i]);
            $marcacao->setIdHorario($horarios[$i]);
            $marcacao->setDataMarcacao($datas[$i]);
            $marcacaoDAO->insert($marcacao);
        }
        
        
    }
    }