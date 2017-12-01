<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';
$marcacaoDAO = new MarcacaoDAO();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
?>
<!DOCTYPE>
<html>
    <head>
        <title>Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta  charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloAdmin.css" rel="stylesheet" type="text/css"/> 
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-md-3">
                <div class="textoAdmin text-center">
                    <h3>Administrativo<span>AngoHairs</span></h3>
                </div>
                <div class="text-center">
                    <figure>
                        <img src="../../view/content/image/admin.png">
                        <figcaption>
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dados['nomeUtilizador']; ?></h4>
                        </figcaption>
                    </figure>
                    <div class="row iconesAdmin">
                        <div class="col-md-4"><a class="navEdit"  href="Administrativo.php"><i class="fa fa-home fa-2x"></i></a></div>
                        <div class="col-md-4"><i class="fa fa-align-justify fa-2x"></i></div>
                        <div class="col-md-4"><a href="../../controller/controller Logout.php" title="Sair" class="fa fa-sign-out fa-2x iconsair"></a></div>
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
                <div class="row">
                    <div class="logoTipo">
                        <h3>Administrativo</h3>
                    </div>
                    <ul class="thumbnails list-unstyled">
                        <li class="col-md-8">
                            <div  class="thumbnail">
                                <div class="imagemFundo text-center">
                                    <i class="fa fa-envelope fa-5x imagem"></i>
                                    <h4>Notificacões</h4>
                                </div>
                                <div>
                                    <?php foreach ($marcacaoDAO->ContarVisualizarMarcacoesActivo() as $resultado) { ?>
                                        <a class="navEdit" href="#minhaModal" data-toggle="modal"> <p><i class="fa fa-envelope"></i> Foram efectuadas (<?php echo $resultado['contador'] ?>) marcacões e necessitam de ser confirmadas</p></a>
                                    <?php } ?>

                                    <a  href="confirmarPedidosMarcacao.php"> <i class="fa fa-thumbs-o-up">&nbsp;</i>Confirmar Pedidos de Marcações</a>
                                </div>
                            </div>
                        </li>

                    </ul>
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
                            <i class="fa fa-envelope-o fa-3x imagem"></i>
                            <h4>Notificacões</h4>
                            <p><h4>Caro Administrador (<?php echo $dados['nomeUtilizador']; ?>) foram solicitadas (<?php echo $resultado['contador'] ?>) marcacões </h4><p>
                            <h4>para que sejam realizadas é necessário a sua confirmacão e com ele poder reagendar para qualquer data!!</h4><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/fundo_tela.js" type="text/javascript"></script>
    </body>
</html>