<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
require_once '../../model/Classes/Marcacao.php';
$marcacaoDAO = new MarcacaoDAO();
$marcacao = new Marcacao();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
$idUtilizador = $dados['idUtilizador'];
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
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dados['nomeUtilizador']; ?></h4>
                        </figcaption>
                    </figure>
                    <div class="row iconesAdmin">
                        <div class="col-md-4"><a class="navEditIcon" href="LogadoUser.php"><i class="fa fa-home fa-2x"></i></a></div>
                        <div class="col-md-4"><a class="navEditIcon" href="#minhaModal" data-toggle="modal"><i class="fa fa-envelope fa-2x"></i></a></div>
                        <div class="col-md-4"><a href="../../controller/controller Logout.php" title="Sair" class="fa fa-sign-out fa-2x iconsair"></a></div>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-tabs nav-stacked">
                        <li><a class="navEdit"  href="ReagendamentoMarcacao.php"><i class="fa fa-calendar-check-o "></i> Minhas Marcacões</a></li>
                        <li><a class="navEdit"  href="confirmarReagendamento.php"> <i class="fafa-thumbs-o-up">&nbsp;</i>Confirmar Reagendamento</a></li>
                        <li><a class="navEdit"  href="alterarReagendamento.php"> <i class="fa fa-edit"></i>&nbsp;Editar Reagendamento</a></li>
                        <li><a class="navEdit" href="cancelarReagendamento.php"> <i class="fa fa-remove"></i>&nbsp;Cancelar Reagendamento</a></li>

                    </ul>  
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <h1 class="logoTipo"><i class="fa fa-remove"></i>&nbsp;Cancelar Reagendamento</h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th class="Tbnomebd">SERVICO</th>
                                <th class="Tbnomebd">CATEGORIA</th>
                                <th class="Tbnomebd">PROFISSIONAL</th>
                                <th class="Tbnomebd">DATA DE MARCACAO</th>
                                <th class="Tbnomebd">HORÁRIO</th>
                                <th class="Tbnomebd">ACCÃO</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($marcacaoDAO->visualizarReagendamentosActivo($idUtilizador) as $dados): ?>
                                <tr  class="Tbnomebd">

                                    <td><?php echo $dados['nomeServico']; ?></td>
                                    <td><?php echo $dados['nomeCategoria']; ?></td>
                                    <td><?php echo $dados['nomeProfissional']; ?></td>
                                    <td><?php echo $dados['dataMarcacao']; ?></td>
                                    <td><?php echo $dados['horario']; ?></td>
                                    <td>
                                        <a href="../../controller/controllerActivarConfirmarCancelarReagendamento.php?cancelar=true&id=<?php echo $dados["idMarcacao"]; ?>" class="btn btn-info " title="Editar Marcacão"><i class="fa fa-remove"></i></a> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>



                <div id="myModal" class="modal fade">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                            </div>
                            <div class="modal-body">

                                <div class="imagemFundo text-center">
                                    <i class="fa fa-users fa-5x imagem"></i>
                                    <h4>Cadastrar profissionais</h4>
                                </div>
                                <form  method="Post" action="">

                                    <div class="from-group">
                                        <input type="text" name="nomeProfissional" placeholder="Profissional" id="nome" class="form-control">
                                        <div id="msgErroNome">Priencha bem os campos</div>
                                    </div>
                                    <div class="from-group">
                                        <label for="telemovel">Servico:</label>

                                        <div class="from-group">
                                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                                            <div id="msgErroEmail">Priencha directamente @ "" . campo senha</div>
                                        </div>  
                                        <div class="from-group">
                                            <input type="text" name="telemovel" placeholder="Telemovel" id="telemovel" class="form-control"  maxlength="9"  onKeyPress = "return numeros(event);">
                                            <div id="msgErroTelemovel">Priencha directamente os campos no máximo 9 caracteres</div>
                                        </div>   


                                        <br/>

                                        <button class="btn btn-primary btn-block" type="submit" name="cadastrar" id="btnCriarCliente">Adicionar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="minhaModal" class="modal fade">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">

                                <div class="imagemFundo text-center">


                                    <h4><i class="fa fa-envelope-o fa-3x ">&nbsp;</i> Notificacões</h4></br>
                                    <?php foreach ($marcacaoDAO->ContarVisualizarMarcacoesEmEspera($idUtilizador) as $marcacoesEmEspera) { ?>
                                        <h4><i class="fa fa-calendar"></i>&nbsp;(<?php echo $marcacoesEmEspera['contador'] ?>)Marcacões em Espera ...</h4></br>
                                    <?php } ?>
                                    <?php foreach ($marcacaoDAO->ContarVisualizarMarcacoesConfirmada($idUtilizador) as $marcoesConfirmadas) { ?>
                                        <h4><i class="fa fa-calendar-check-o"></i>&nbsp;(<?php echo $marcoesConfirmadas['contador'] ?>)Marcacões Confirmadas</h4></br>
                                    <?php } ?>
                                    <?php foreach ($marcacaoDAO->ContarVisualizarMarcacoesCanceleda($idUtilizador) as $marcoesCanceladas) { ?>
                                        <h4><i class="fa fa-calendar-times-o"></i>&nbsp;(<?php echo $marcoesCanceladas['contador'] ?>)Marcacões Bloqueadas</h4></br>
                                    <?php } ?>

                                    <h4>Senhor(a) <?php echo $dados['nomeUtilizador']; ?> Foram solicitadas vários pedidos de marcacão para prosseguir deve confirmar. </h4>
                                    <h4>Caso confirmar a marcacão estará em modo de espera até que o Administrativo confirma a marcacão!! </h4><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
                <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
                <script src="../../view/content/js/scriptValidar.js" type="text/javascript"></script>
                </body>
                </html>