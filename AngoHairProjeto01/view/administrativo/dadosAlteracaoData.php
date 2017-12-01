<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/Classes/Usuario.php';
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/Classes/Servico.php';
require_once '../../model/DAO/CategoriaDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
require_once '../../model/Classes/Marcacao.php';
$marcacaoDAO = new MarcacaoDAO();
$servico = new ServicoModel();
$usuarioDAO = new UsuarioDAO();
$marcacao=new Marcacao();
$idMarcacao = filter_input(INPUT_GET, "id");
$dadosUtilizador = $usuarioDAO->getById($idUtilizador);
$categoriaDAO = new CategoriaDAO();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Cliente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta  charset="utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloAdmin.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloValidarMarcacao.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../view/content/datapicker/css/bootstrap-datepicker.css" type="text/css">
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-md-3">
                <div class="textoAdmin text-center">
                    <h3>Cliente<span>AngoHairs</span></h3>
                </div>
                <div class="text-center">
                    <figure>
                        <img src="../../view/content/image/admin.png">
                        <figcaption>
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dadosUtilizador['nomeUtilizador']; ?></h4>
                        </figcaption>
                    </figure>
                    <div class="row iconesAdmin">
                        <div class="col-md-4"><a class="navEditIcon" href="LogadoUser.php"><i class="fa fa-home fa-2x"></i></a></div>
                        <div class="col-md-4"><i class="fa fa-align-justify fa-2x"></i></div>
                        <div class="col-md-4"><a href="../../controller/controller Logout.php"><i class="fa fa-sign-out fa-2x"></i></a></div>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-tabs nav-stacked">
                       <li><a class="navEdit"  href="gerirProfissionais.php"> <i class="fa fa-users">&nbsp;</i>Gerir Profissional</a></li>
                        <li><a class="navEdit" href="gerirServicos.php"> <i class="fa fa-list">&nbsp;</i>Gerir Serviços</a></li>
                        <li><a class="navEdit" href="confirmarPedidosMarcacao.php"> <i class="fa fa-thumbs-o-up">&nbsp;</i>Confirmar Pedidos de Marcações</a></li>
                        <li><a class="navEdit" href="reagendar.php"> <i class="fa fa-calendar-check-o">&nbsp;</i>Reagendar Marcações</a></li>
                        <li><a class="navEdit" href="agenda.php"> <i class="fa fa-calendar">&nbsp;</i>Agenda Mensal</a></li>
                    </ul>  
                </div>
            </div>

            <div class="col-md-9">
            <?php foreach ($marcacaoDAO->visualizarMarcacaoId($idMarcacao) as $dados):endforeach; ?>  
                <div class="modal-dialog modal-sm">
                    <div class="modal-content moda1">

                        <div class="modal-body">

                            <div class="imagemFundo text-center">
                                <i class="fa fa-edit fa-2x imagem"></i>
                            </div>
                            <form method="post" action="../../controller/controllerEditarDataReagendamento.php?idMarcacao=<?php echo $idMarcacao;?>">
                                 <h3><i class="fa fa-user-md"></i>&nbsp;Cliente</h3>
                                <div class="form-group">
                                       <input disabled type="text" class="form-control input-group-sm" value="<?php echo $dados['nomeUtilizador']; ?>" id="utilizador" name="utilizador">
                                
                                </div>
                                <div>
                                    <h3><i class="fa fa-calendar"></i>&nbsp; Selecione a data</h3>
                                    <div class="input-group date">
                                        <input type="text" class="form-control input-group-sm" value="<?php echo $dados['dataMarcacao']; ?>" id="data" name="data">
                                        <div class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <div id="msgErroData">Preencha o campo Data</div>
                                </div>
                                
                                <h3><i class="fa fa-server"></i>&nbsp;Categoria</h3>
                                <div class="form-group">

                                    <input type="text" class="form-control input-group-sm" value="<?php echo $dados['nomeCategoria']; ?>" id="categoria" name="categoria" disabled>

                                    <div id="msgErroCategoria">Preencha o campo Categoria</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-list"></i>&nbsp;Serviço </h3>
                                    <input type="text" class="form-control input-group-sm" value="<?php echo $dados['nomeServico']; ?>" id="servico" name="servico" disabled>
                                    
                                    <div id="msgErroServico">Preencha o campo Servico</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-user"></i>&nbsp;Profissional</h3>
                                   <input type="text" class="form-control input-group-sm" value="<?php echo $dados['nomeProfissional']; ?>" id="profissional" name="profissional" disabled>
                                    
                                    <div id="msgErroProfissional">Preencha o campo Profissional</div>
                                </div>
                                <div id="divProf">
                                    <h3><i class="fa fa-ticket"></i>&nbsp;Horário</h3>
                                     <input type="text" class="form-control input-group-sm" value="<?php echo $dados['horario']; ?>" id="horario" name="horario" disabled>
                                    <div id="msgErroHorario">Preencha o campo Horário</div>
                                </div>
                                 
                                <input class="btn btn-primary btn-block" type="submit" name="alterar" value="Confirmar" id="btnConfirmarMarcacao">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/fundo_tela.js" type="text/javascript"></script>
        <script src="../content/js/scriptAjaxDependencia.js" type="text/javascript"></script>
        <script src="../content/js/scriptValidarMarcacao.js" type="text/javascript"></script>
        <script src="../content/js/scriptDataPicker.js" type="text/javascript"></script>
        <script src="../content/datapicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../content/datapicker/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
    </body>
</html>




