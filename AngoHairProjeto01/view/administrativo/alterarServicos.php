<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/DAO/ServicosDAO.php';
require_once '../../model/DAO/CategoriaDAO.php';
$servicoDAO = new ServicosDAO();
$usuarioDAO = new UsuarioDAO();
$idServico = filter_input(INPUT_GET, "idServico");
$dados = $servicoDAO->getById($idServico);
$dadosUtilizador = $usuarioDAO->getById($idUtilizador);
$categoriaDAO = new CategoriaDAO();
?>
<!DOCTYPE>
<html>
    <head>
        <title>Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta  charset="utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloAdmin.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>

        <div class="container-fluid">
            <div class="col-md-3">
                <div class="textoAdmin text-center">
                    <h3>Admin<span>AngoHairs</span></h3>
                </div>
                <div class="text-center">
                    <figure>
                        <img src="../../view/content/image/admin.png">
                        <figcaption>
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dadosUtilizador['nomeUtilizador']; ?></h4>
                        </figcaption>
                    </figure>
                    <div class="row iconesAdmin">
                        <div class="col-md-4"><a class="navEditIcon" href="Administrativo.php"><i class="fa fa-home fa-2x"></i></a></div>
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

            <div class="row">
                <h1 class="logoTipo"><i class="fa fa-list"></i>&nbsp;Gerir Serviços</h1> 
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">

                        <div class="modal-body">

                            <div class="imagemFundo text-center">

                            </div>
                            <form class="form-group-lg" id="validarCadastro" method="post" action="../../controller/controllerEditarServicos.php?idServico=<?php echo $idServico; ?>">

                                <div class="row" id="divCadastro">
                                    <div class="col-md-8">

                                        <div class="form-group">
                                            <label for="nome"><strong>Nome do Servico:</strong></label>
                                            <input type="text" name="nomeServico" placeholder="Nome Completo" id="nomeServico" class="form-control" value="<?php echo $dados['nomeServico']; ?>">
                                            <div id="msgErroNome">Priencha os campos vazios!!!</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="telemovel">Categoria:</label>
                                            <select class="form-control " name="categoria" >

                                                <?php foreach ($categoriaDAO->visualizarCategoria() as $resultado) { ?>
                                                    <option value="<?php echo $resultado["idCategoria"]; ?>"><?php echo $resultado["nomeCategoria"]; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div id="msgErroIdServico">Priencha os campos vazios!!!</div>
                                        </div>        

                                        <div class="from-group">
                                            <label for="Preco">Preco:</label>
                                            <input type="text" name="preco" value="<?php echo $dados["preco"]; ?>" id="preco" class="form-control" onKeyPress = "return numeros(event);">
                                            <div id="msgErroPreco">Priencha os campos vazios!!!</div>
                                        </div>
                                        <div class="form-group text-center">
                                            <input type="submit" name="alterar" value="Alterar" class="btn btn-primary  btn-block" id="btnAlterarServico"/>
                                        </div>
                                        
                                        </form>
                                               
                                    </div>
                                     <a href="gerirServicos.php"><button   class="btn btn-primary btn-block " id="btnCancelar">Cancelar</button></a>
                                </div>
                        </div>
                    </div>
                </div>
                <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
                <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../view/content/js/fundo_tela.js" type="text/javascript"></script>
                <script src="../../view/content/js/scriptValidarServico.js" type="text/javascript"></script>
                <script src="../../view/content/js/scriptValidarCamposNumericos.js" type="text/javascript"></script>
                </body>
                </html>




