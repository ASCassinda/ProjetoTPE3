<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/DAO/ProfissionalDAO.php';
require_once '../../model/DAO/HorarioDAO.php';
require_once '../../model/DAO/CategoriaDAO.php';
$categoriaDAO = new CategoriaDAO();
$horarioDAO = new HorarioDAO();
$profissionalDAO = new ProfissionalDAO();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
$servicoDAO = new ServicosDAO();
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
        <link href="../../view/content/css/estiloValidarProfissionais.css" rel="stylesheet" type="text/css"/>
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
                            <h4 class="nomebd"><i class="fa fa-circle"></i><?php echo $dados['nomeUtilizador']; ?></h4>
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
            <div class="col-md-9">
                <div class="row">
                    <h1 class="logoTipo"><i class="fa fa-users"></i>&nbsp;Gerir Profissionais</h1>
                    <a class="navEdit" href="#myModal" data-toggle="modal"><button class="btn btn-primary">Adicionar</button></a>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th class="Tbnomebd">PROFISSIONAL</th>
                                <th class="Tbnomebd" >EMAIL</th>
                                <th class="Tbnomebd">TELEMOVEL</th>
                                <th class="Tbnomebd" colspan="2">ACCAO</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($profissionalDAO->visualizarProfissional() as $resultado) { ?>
                                <tr class="Tbnomebd">

                                    <td><?php echo $resultado["nomeProfissional"]; ?></td>
                                    <td><?php echo $resultado["email"]; ?></td>
                                    <td><?php echo $resultado["telemovel"]; ?></td>

                                    <td align="center">
                                        <a href="visualizarDetalhesProfissional.php?idProfissional=<?php echo $resultado["idProfissional"]; ?>" title="visualizar"><i class="fa fa-eye"></i></a>
                                    </td>
                                    <td>
                                        <a  href="../../controller/controllerEliminarProfissionais.php?excluir=true&id=<?php echo $resultado['idProfissional']; ?>" title="Remover este campo"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">

                        <div class="imagemFundo text-center">

                            <h4><i class="fa fa-user-plus">&nbsp;</i>Cadastrar profissionais</h4>
                        </div>
                        <form  method="Post" action="../../controller/controllerAdicionarProfissional.php" name="formulario">

                            <div class="from-group">
                                <label for="profissional">Profissional:</label>
                                <input type="text" name="nomeProfissional" placeholder="Profissional" id="nome" class="form-control">
                                <div id="msgErroNome">Preencha bem os campos</div>
                            </div>

                            <div class="from-group">
                                <label for="Categoria">Categoria:</label>

                                <select class="form-control" name="categoria" id="categoria" >
                                    <option> </option>
                                    <?php foreach ($categoriaDAO->visualizarCategoria() as $resultado) { ?>
                                        <option value="<?php echo $resultado["idCategoria"]; ?>"><?php echo $resultado["nomeCategoria"]; ?> </option>
                                    <?php } ?>

                                </select>
                                <div id="msgErroCategoria">Preencha o campo Categoria</div>
                            </div>

                            <div class="form-group">
                                <label for="Servico">Servico:</label>
                                <select multiple="multiple"  class="form-control" id="servico" name="servicos[]">
                                </select>
                                <div id="msgErroServico">Preencha o campo Servico</div>
                            </div>


                            <div class="from-group">
                                <label for="Email">Email:</label>
                                <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                                <div id="msgErroEmail">Preencha corretamente @ "" . campo senha</div>
                            </div>  
                            <div class="from-group">
                                <label for="Telemovel">Telemovel:</label>
                                <input type="text" name="telemovel" placeholder="Telemovel" id="telemovel" class="form-control"  maxlength="9"  onKeyPress = "return numeros(event);">
                                <div id="msgErroTelemovel">Preencha corretamente os campos no máximo 9 caracteres</div>
                            </div>   

                            <div class="form-group">
                                <label for="horario"> Horário:</label><br>
                                <select class="form-control" name="horarios[]" id="horario" multiple="multiple" >
                                    <?php foreach ($horarioDAO->visualizarHorario() as $resultado) { ?>
                                        <option  value="<?php echo $resultado["horario"]; ?>" ><?php echo $resultado["horario"]; ?> </option>
                                    <?php } ?>
                                </select>

                                <div id="msgErroHorario">Seleciona pelo menos um horário</div>
                            </div>
                            <br/>                     
                            <button class="btn btn-primary btn-block" type="submit" name="cadastrar" id="btnCriarCliente">Adicionar</button>
                        </form>
                        <a href="gerirProfissionais.php"><button   class="btn btn-primary btn-block " id="btnCancelar">Cancelar</button></a>
                    </div>
                </div>
            </div>
        </div>


        <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptValidarProfissionais.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptAjaxProfissiona.js" type="text/javascript"></script>

    </body>
</html>




