<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
include_once '../../model/DAO/UsuarioDAO.php';
include_once '../../model/DAO/ServicosDAO.php';
include_once '../../model/DAO/CategoriaDAO.php';
$categoriaDAO = new CategoriaDAO();
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
                    <h1 class="logoTipo"><i class="fa fa-list"></i>Gerir Serviços</h1>
                    <a class="navEdit" href="#myModal" data-toggle="modal"><button class="btn btn-primary">Adicionar</button></a>

                         <table class="table table-bordered table-striped">
                         <thead>
                            <tr>

                                <th class="Tbnomebd">SERVICOS</th>
                                <th class="Tbnomebd">CATEGORIA</th>
                                <th class="Tbnomebd">PRECO</th>
                                <th class="Tbnomebd" colspan="2">ACÇÃO</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($servicoDAO->visualizarServicos() as $resultado) { ?>
                                <tr class="Tbnomebd">

                                    <td><?php echo $resultado["nomeServico"]; ?></td>
                                    <td><?php echo $resultado["nomeCategoria"]; ?></td>
                                    <td><?php echo $resultado["preco"]; ?></td>

                                    <td align="center">
                                        <a href="alterarServicos.php?idServico=<?php echo $resultado["idServico"]; ?>" title="Alterar este campo" class="btn btn-info "><i class="fa fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <a href="../../controller/controllerEliminarServicos.php?excluir=true&idServico=<?php echo $resultado["idServico"]; ?>" title="Remover este campo" class="btn btn-info "><i class="fa fa-trash"></i></a>
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
                            <i class="fa fa-server fa-3x imagem"></i>
                            <h4>Cadastrar Servicos</h4>
                        </div>
                        <form  method="Post" action="../../controller/controllerAdicionarServicos.php">

                            <div class="from-group">
                                <label for="Servico">Servico:</label>
                                <input type="text" name="nomeServico" placeholder="Servico" id="nomeServico" class="form-control">
                                <div id="msgErroNome">Priencha os campos vazios!!!</div>
                            </div>
                            <div class="from-group">
                                <label for="Categoria">Categoria:</label>
                                <select class="form-control" name="categoria" id="idServico" >

                                    <?php foreach ($categoriaDAO->visualizarCategoria() as $resultado) { ?>
                                        <option value="<?php echo $resultado["idCategoria"]; ?>"><?php echo $resultado["nomeCategoria"]; ?> </option>
                                    <?php } ?>
                                </select>
                                <div id="msgErroIdServico">Priencha os campos vazios!!!</div>

                            </div> 
                             <div class="from-group">
                                <label for="Preco">Preco:</label>
                                <input type="text" name="preco" placeholder="Preco do Servico" id="preco" class="form-control" onKeyPress = "return numeros(event);">
                                <div id="msgErroPreco">Priencha correctamente o campo Preco!!!</div>
                            </div>
                            <br/>
                            <button class="btn btn-primary btn-block" type="submit" name="cadastrar" id="btnCriarServico">Adicionar</button>
                        </form>
                        <a href="gerirServicos.php"><button   class="btn btn-primary btn-block " id="btnCancelar">Cancelar</button></a>
                    </div>
                    </div>
                    </div>
                    </div>
                    <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
                    <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
                    <script src="../../view/content/js/scriptValidarServico.js" type="text/javascript"></script>
                     <script src="../../view/content/js/scriptValidarCamposNumericos.js" type="text/javascript"></script>
                    <script>
                    </script>
                    </body>
                    </html>




