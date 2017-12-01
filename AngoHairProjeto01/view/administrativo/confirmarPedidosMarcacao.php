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
                        <div class="col-md-4"><a class="navEditIcon" href="Administrativo.php"><i class="fa fa-home fa-2x"></i></a></div>
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
                    <h1 class="logoTipo"><i class="fa fa-thumbs-o-up"></i>&nbsp;Confirmar Reagendamento</h1>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="Tbnomebd">CLIENTE</th>
                                <th class="Tbnomebd">SERVICO</th>
                                <th class="Tbnomebd">CATEGORIA</th>
                                <th class="Tbnomebd">PROFISSIONAL</th>
                                <th class="Tbnomebd">DATA DE MARCACAO</th>
                                <th class="Tbnomebd">HORÁRIO</th>
                                <th class="Tbnomebd">ACCÃO</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($marcacaoDAO->visualizarMarcacoesActivo() as $dados): ?>
                                <tr  class="Tbnomebd">
                                    <td><?php echo $dados['nomeUtilizador']; ?></td>
                                    <td><?php echo $dados['nomeServico']; ?></td>
                                    <td><?php echo $dados['nomeCategoria']; ?></td>
                                    <td><?php echo $dados['nomeProfissional']; ?></td>
                                    <td><?php echo $dados['dataMarcacao']; ?></td>
                                    <td><?php echo $dados['horario']; ?></td>
                                    <td>
                                        <a href="../../controller/controllerActivarConfirmarCancelarReagendamento.php?confirmar=true&id=<?php echo $dados["idMarcacao"]; ?>" class="btn btn-info " title="Editar Marcacão"><i class="fa fa-thumbs-o-up"></i></a> 
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>


            </div>
            <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
            <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="../../view/content/js/scriptValidar.js" type="text/javascript"></script>

    </body>
</html>