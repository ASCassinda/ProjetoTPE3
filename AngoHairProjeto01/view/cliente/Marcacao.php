<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$dado = $usuarioDAO->getById($idUtilizador);
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/DAO/ProfissionalDAO.php';
require_once '../../model/DAO/HorarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
include_once '../../model/DAO/CategoriaDAO.php';
$servicoDAO=new ServicosDAO();
$idMarcacao = filter_input(INPUT_GET, "idMarcacao");
$dadosServico = $servicoDAO->getById($idMarcacao);
$marcacaoDAO = new MarcacaoDAO();
$idCategoria = $nome = filter_input(INPUT_POST, "id");
$marcacaoDAO->visualizarServicosIdCategoria($idCategoria);
$profissionalDAO = new ProfissionalDAO();
$idProfissional = filter_input(INPUT_GET, "idProfissional");
$dados = $profissionalDAO->getById($idProfissional);
$horarioDAO = new HorarioDAO();
$categoriaDAO = new CategoriaDAO();
?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cliente</title>
        <link href="../content/assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../content/assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../content/assets/plugins/vegas/jquery.vegas.min.css" rel="stylesheet" />
        <link href="../content/assets/css/component.css" rel="stylesheet" />
        <link href="../content/assets/css/style.css" rel="stylesheet" />
        <link href="../../view/content/image/icone.png" rel="icon" />
        <link href="../../view/content/css/estiloValidarMarcacao.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../view/content/datapicker/css/bootstrap-datepicker.css" type="text/css">
        <link href="../content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../content/datapicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="../content/css/CssMarcacao.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloValidarMarcacao.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../view/content/datapicker/css/bootstrap-datepicker.css" type="text/css">
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>

        <!-- MAIN HEADING-->
          <div class="container">
            
            <div class="row">

                <div class="tabbable tabs-rigth">
                    <ul class="nav nav-tabs">
                        <li  class="item">
                            <a href="LogadoUser.php" >
                                <i class="fa fa-home"></i>&nbsp;Home
                            </a>
                        </li>
                        <li class="active" class = "item">
                            <a href="#tab1" data-toggle="tab">
                                <i class="fa fa-calendar-plus-o"></i>&nbsp;Nova Marcação
                            </a>
                        </li>
                        <li class="item"><a href="#tab2" data-toggle="tab"><i class="fa fa-calendar-check-o"></i> Minhas Marcações</a></li>
                        
                    </ul>
                    <div class="col-md-9">
            
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                        <div class="modal-body">

                            <div class="imagemFundo text-center">
                               
                            </div>
                        <div class="tab-pane active" id="tab1">
                            <form method="post" >
                                <div>
                                    <h3><i class="fa fa-calendar"></i>&nbsp; Selecione a data</h3>
                                    <div class="input-group date">
                                        <input type="text" class="form-control input-group-sm" id="data">
                                        <div class="input-group-addon">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <div id="msgErroData">Preencha o campo Data</div>
                                </div>
                                <h3><i class="fa fa-server"></i>&nbsp;Selecione a categoria</h3>
                                <div class="form-group">

                                    <select class="form-control" name="categoria" id="categoria">
                                        <option></option>
                                        <?php foreach ($categoriaDAO->visualizarCategoria() as $resultado) { ?>
                                            <option value="<?php echo $resultado["idCategoria"]; ?>"><?php echo $resultado["nomeCategoria"]; ?> </option>
                                        <?php } ?>

                                    </select>
                                    <div id="msgErroCategoria">Preencha o campo Categoria</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-list"></i>&nbsp;Selecione o serviço</h3>
                                    <select class="form-control" id="servico" name="servico">
                                        <option></option>
                                    </select>
                                    <div id="msgErroServico">Preencha o campo Servico</div>
                                </div>
                                <div class="form-group">
                                    <h3><i class="fa fa-user"></i>&nbsp;Profissional</h3>
                                    <select class="form-control" id="profissional" name="profissional">
                                        <option></option>
                                    </select>
                                    <div id="msgErroProfissional">Preencha o campo Profissional</div>
                                </div>
                                <div id="divProf">
                                    <h3><i class="fa fa-ticket"></i>&nbsp;Horário</h3>
                                    <select class="form-control" id="horario" name="horario">
                                        <option></option>
                                    </select>
                                    <div id="msgErroHorario">Preencha o campo Horário</div>
                                </div>

                                <input class="btn btn-default" type="submit" name="btnConfirmar" value="Confirmar" id="btnConfirmarMarcacao">
                                <input class="btn btn-default" type="submit" name="btnAdicionar" value="Adicionar" id="btnAdicionar">
                            </form>
                            <input class="btn btn-default" type="submit" name="btnAdicionar" value="Cadastrar" id="btnCadastrar">
                        </div>
                        </div>
                    </div>
                    
                    
                     <div class="tab-pane" id="tab2">
                            <div class="col-md-9">
                                <div class="row">
                                    <h1 class="logoTipo"><i class="fa fa-calendar-check-o"></i>&nbsp;Add Marcacões</h1>
                                    
                                     <form method="post" >
                                    <table class="table table-bordered table-striped" id="tabela">
                                        
                                        <thead>
                                            <tr>
                                                <th class="Tbnomebd">SERVICO</th>
                                                <th class="Tbnomebd">CATEGORIA</th>
                                                <th class="Tbnomebd">PROFISSIONAL</th>
                                                <th class="Tbnomebd">DATA DE MARCACAO</th>
                                                <th class="Tbnomebd">HORÁRIO</th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                           
                                        </tbody>
                                        <button class="btn btn-default" id="btnSalvar">Salvar</button>
                                    </table>
                                    </form>
                                </div> 
                            </div>

                       
                    </div>
                </div>
            </div>

            <script src="../content/assets/plugins/jquery-1.10.2.js"></script>
            <script src="../content/assets/plugins/bootstrap.js"></script>
            <script src="../content/assets/js/modernizr.custom.js"></script>
            <script src="../content/assets/js/classie.js"></script>
            <script src="../content/assets/plugins/vegas/jquery.vegas.min.js"></script>
            <script src="../content/assets/js/custom.js"></script>
            <script src="../content/js/jquery.3.2.1.js" type="text/javascript"></script>
            <script src="../content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="../content/datapicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
            <script src="../content/js/marcacao.js" type="text/javascript"></script>
            <script src="../content/js/scriptAjaxAdicionarDados.js" type="text/javascript"></script>
            <script src="../content/js/scriptAjaxDependencia.js" type="text/javascript"></script>
            <script src="../content/js/scriptValidarMarcacao.js" type="text/javascript"></script>
            <script src="../content/js/scriptDataPicker.js" type="text/javascript"></script>
            <script src="../content/datapicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
            <script src="../content/datapicker/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
            
       
    </body>
</html>
