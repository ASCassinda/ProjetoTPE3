<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/DAO/ServicosDAO.php';
require_once '../../model/DAO/CategoriaDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
$marcacaoDAO = new MarcacaoDAO();
$usuarioDAO = new UsuarioDAO();
$idMarcacao = filter_input(INPUT_GET, "idMarcacao");
$dadosUtilizador = $usuarioDAO->getById($idUtilizador);
$categoriaDAO = new CategoriaDAO();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Cliente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta  charset="utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloReagendamento.css" rel="stylesheet" type="text/css"/>
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
                        <div class="col-md-4"><a class="navEditIcon" href="LogadoUser.php #perfilCliente"><i class="fa fa-user fa-2x"></i></a></div>
                        <div class="col-md-4"><a href="../../controller/controller Logout.php"><i class="fa fa-sign-out fa-2x"></i></a></div>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-tabs nav-stacked">
                        <li><a class="navEdit"  href="ReagendamentoMarcacao.php"><i class="fa fa-calendar-check-o "></i> Minhas Marcacões</a></li>
                        <li><a class="navEdit"  href="confirmarReagendamento.php"> <i class="fa fa-thumbs-o-up">&nbsp;</i>Confirmar Reagendamento</a></li>
                        <li><a class="navEdit"  href="alterarReagendamento.php"> <i class="fa fa-edit"></i>&nbsp;Editar Reagendamento</a></li>
                        <li><a class="navEdit" href="cancelarReagendamento.php"> <i class="fa fa-remove"></i>&nbsp;Cancelar Reagendamento</a></li>
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
                            <form method="post" action="../../controller/controllerEditarReagendamento.php?idMarcacao=<?php echo $idMarcacao;?>">
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
                                
                                <h3><i class="fa fa-server"></i>&nbsp;Selecione a categoria</h3>
                                <div class="form-group">

                                    <select class="form-control" name="categoria" id="categoria">
                                         <option value="<?php echo $dados["idCategoria"]; ?>"><?php echo $dados['nomeCategoria']; ?></option>
                                        <?php foreach ($categoriaDAO->visualizarCategoria() as $resultado) { ?>
                                            <option value="<?php echo $resultado["idCategoria"]; ?>"><?php echo $resultado["nomeCategoria"]; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <div id="msgErroCategoria">Preencha o campo Categoria</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-list"></i>&nbsp;Selecione o serviço desejado</h3>
                                    <select class="form-control" id="servico" name="servico">
                                        <option value="<?php echo $dados["idServico"]; ?>"><?php echo $dados['nomeServico']; ?></option>
                                    </select>
                                    <div id="msgErroServico">Preencha o campo Servico</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-user"></i>&nbsp;Selecione o Profissional</h3>
                                    <select class="form-control" id="profissional" name="profissional">
                                        <option value="<?php echo $dados["idProfissional"]; ?>"><?php echo $dados['nomeProfissional']; ?></option>
                                    </select>
                                    <div id="msgErroProfissional">Preencha o campo Profissional</div>
                                </div>
                                <div id="divProf">
                                    <h3><i class="fa fa-ticket"></i>&nbsp;Horário do profissional</h3>
                                    <select class="form-control" id="horario" name="horario">
                                        <option value="<?php echo $dados["horario"]; ?>"><?php echo $dados['horario']; ?></option>
                                    </select>
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




