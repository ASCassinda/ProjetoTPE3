<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/Classes/Usuario.php';
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/DAO/ProfissionalDAO.php';
require_once '../../model/DAO/HorarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
include_once '../../model/DAO/CategoriaDAO.php';
$servicoDAO = new ServicosDAO();
$idMarcacao = filter_input(INPUT_GET, "idMarcacao");
$dadosServico = $servicoDAO->getById($idMarcacao);

$marcacaoDAO = new MarcacaoDAO();
$idCategoria = $nome = filter_input(INPUT_POST, "id");
$marcacaoDAO->visualizarServicosIdCategoria($idCategoria);

$profissionalDAO = new ProfissionalDAO();
$idProfissional = filter_input(INPUT_GET, "idProfissional");
$dados = $profissionalDAO->getById($idProfissional);

$horarioDAO = new HorarioDAO();
$usuarioDAO = new UsuarioDAO();
$categoriaDAO = new CategoriaDAO();
$utilizador = $usuarioDAO->getById($idUtilizador);
?>
<!DOCTYPE>
<html>

    <head>
        <title>Cliente</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta  charset="utf-8" />
        <link href="../content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../content/datapicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="../content/css/CssMarcacao.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloValidarMarcacao.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="../../view/content/datapicker/css/bootstrap-datepicker.css" type="text/css">
        <link href="../../view/content/image/icone.png" rel="icon" />

    </head>
    <body>
      
        <div class="container">

            <div class="row">
                <ul class="nav nav-tabs">
                    <li  class="item">
                        <a href="LogadoUser.php" class="home" >
                            <i class="fa fa-home fa-3x"></i>&nbsp;Home
                        </a></li>

                        <li  class="item">
                            <a href="LogadoUser.php #perfilCliente" class="home" >
                            <i class="fa fa-user fa-3x"></i>&nbsp;Perfil
                        </a></li>
                        
                        <li  class="item">
                        <a href="ReagendamentoMarcacao.php" class="home" >
                            <i class="fa fa-edit fa-3x"></i>&nbsp;Reagendamentos
                        </a></li>
                        <li  class="item">
                            <a href="../../controller/controller Logout.php" class="home">
                            <i class="fa fa-sign-out fa-3x"></i>&nbsp;Sair
                             </a>
                        </li>
                        <li class="item"><a href="#" class="home"><i class="fa fa-check-circle fa-3x"></i>&nbsp;<?php echo $utilizador['nomeUtilizador']; ?></a></li>
                    </li>
                </ul>   

                <div class="col-md-4">
                    <div class="tab-pane active" id="tab1">
                        <form method="post"class="form1" >
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

                        </form>
                        <input class="btn btn-default" type="submit" name="btnAdicionar" value="Adicionar" id="btnAdicionar">
                        <a href="solicitarMarcacao.php"><input class="btn btn-default" type="submit" name="btnCancelar" value="Cancelar" id="btnCancelar"></a>
                        <a  href="#minhaModal" data-toggle="modal"><button class="btn btn-default" id="btnSalvar">Salvar</button></a>
                    </div>

                </div>


                <div class="tab-pane" id="tab2">
                    <div class="col-md-8">
                        <div class="row">
                            <form method="post" >
                                <table class="table table-bordered table-responsive" id="tabela">

                                    <thead>
                                        <tr>
                                            <th class="Tbnomebd">SERVICO</th>
                                            <th class="Tbnomebd">CATEGORIA</th>
                                            <th class="Tbnomebd">PROFISSIONAL</th>
                                            <th class="Tbnomebd">DATA DE MARCACAO</th>
                                            <th class="Tbnomebd">HORÁRIO</th>
                                            <th class="Tbnomebd">CANCELAR</th>
                                        </tr>
                                    </thead>

                                </table>
                            </form>
                        </div> 
                    </div>
                    
                </div>


            </div>
        </div>    
        <div id="minhaModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                   
                    <div class="modal-body">

                        <div class="imagemFundo text-center">
                            <i class="fa fa-check fa-3x imagem"></i>
                            <h4>Salvo</h4>
                            <p><h4>Marcacão feita com sucesso </h4><p>
                                <a  href="solicitarMarcacao.php" ><button class="btn btn-primary">Confirmar</button></a>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        
        <script src="../content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../content/datapicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
        <script src="../content/js/scriptAjaxAdicionarDados.js" type="text/javascript"></script>
        <script src="../content/js/scriptAjaxDependencia.js" type="text/javascript"></script>
        <script src="../content/js/scriptAjaxDadosMultiplos.js" type="text/javascript"></script>
        <script src="../content/js/scriptValidarMarcacao.js" type="text/javascript"></script>
        <script src="../content/js/scriptDataPicker.js" type="text/javascript"></script>
        <script src="../content/datapicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../content/datapicker/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>
        
        

    </body>
</html>


