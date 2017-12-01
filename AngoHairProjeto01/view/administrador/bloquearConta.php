<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/Classes/Usuario.php';
require '../../model/Classes/Admin.php';
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
$usuario=new Usuario();
?>

<!DOCTYPE>
<html>
    <head>


        <title>Administrador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta  charset="utf-8" />
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <link href="../../view/content/image/icone.png" rel="icon" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloAdmin.css" rel="stylesheet" type="text/css"/>

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
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dados['nomeUtilizador']; ?></h4>

                        </figcaption>
                    </figure>
                    <div class="row iconesAdmin">
                        <div class="col-md-4"><a class="navEditIcon" href="Administrador.php"><i class="fa fa-home fa-2x"></i></a></div>
                        <div class="col-md-4"><i class="fa fa-align-justify fa-2x"></i></div>
                        <div class="col-md-4"><a href="../../controller/controller Logout.php"><i class="fa fa-sign-out fa-2x"></i></a></div>
                   </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav nav-tabs nav-stacked">
                        <li><a class="navEdit"  href="Ver_servicos.php"><i class="fa fa-2x"></i>Serviços mais solicitados</a></li>
                        <li><a class="navEdit" href="ver_horarios_mais_marcados.php">Horário com mais marcações</a></li>
                        <li><a class="navEdit" href="ver_cliente_solicita_mais_servicos.php">Clientes que solicitam mais servicos</a></li>
                        <li><a class="navEdit" href="ver_profissionais_mais_solicitados.php">Funcionários que mais serviços atendem</a></li>
                    </ul>   
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <h1 class="logoTipo"><i class="fa fa-arrows-alt"></i>&nbsp;Contas activas</h1>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="Tbnomebd">NOME</th>
                                <th class="Tbnomebd">EMAIL</th>
                                <th class="Tbnomebd">TELEMOVEL</th>
                                <th class="Tbnomebd">ACÇÃO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarioDAO->listar(2) as $dados): ?>
                                <tr class="Tbnomebd">
                                    <td><?php echo $dados['nomeUtilizador']; ?></td>
                                    <td><?php echo $dados['email']; ?></td>
                                    <td><?php echo $dados['telemovel']; ?></td>
                                    <td><a href="../../controller/controllerActivarBloquearContasClientes.php?activa=true&id=<?php echo $dados['idUtilizador']; ?>" class="btn btn-info btn-block" title="Bloquear"><i class="fa fa-lock"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/fundo_tela.js" type="text/javascript"></script>
    </body>
</html>



