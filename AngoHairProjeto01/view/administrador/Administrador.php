<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
?>
<!DOCTYPE>
<html>
    <head>
        <title>Administrador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
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
                    <div class="logoTipo">
                        <h3>AngoHairs</h3>
                    </div>

                    <ul class="thumbnails list-unstyled">

                        <li class="col-md-6">
                            <div  class="thumbnail">
                                <div class="imagemFundo text-center">
                                    <i class="fa fa-user fa-5x imagem"></i>
                                    <h4>Administrativos</h4>
                                </div>
                                <div class="">
                                    <p><a href="#myModal" data-toggle="modal" ><i class="fa fa-user-plus"></i>&nbsp;Criar Conta</a></p>
                                    <p><a href="verAdmin.php"><i class="fa fa-list"></i>&nbsp;Visualizar</a></p>
                                    
                                    <?php foreach ($usuarioDAO->visualizarContasBloqueadas()  as $resultado) { ?>
                                       <p><i class="fa fa-envelope"></i> (<?php echo $resultado['contador'] ?>)contas foram criadas e necessitam de ser activadas</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>

                        <li class="col-md-6">
                            <div  class="thumbnail">
                                <div class="imagemFundo text-center">
                                    <i class="fa fa-users fa-5x imagem"></i>
                                    <h4>Clientes</h4>
                                </div>
                                <div>
                                    <p><a href="activarConta.php"><i class="fa fa-thumbs-o-up"></i>&nbsp;Ativar conta</a></p>
                                    <p><a href="bloquearConta.php"><i class="fa fa-lock"></i>&nbsp;Bloquear conta</a></p>
                                    <?php foreach ($usuarioDAO->visualizarContasActivadas() as $resultado) { ?>
                                        <p>(<?php echo $resultado['count(nomeUtilizador)'] ?>) conta(s) Ativa</p>
                                    <?php } ?>

                                    <?php foreach ($usuarioDAO->visualizarContasBloqueadas() as $resultado) { ?>
                                        <p>(<?php echo $resultado['contador'] ?>) conta(s) Bloqueada</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>


            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-sm ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 id="myModalLabel">Inserindo administrativo</h3>
                        </div>                                                                               
                        <div class="modal-body">
                            <form class="form-horizontal form-group-lg" method="post" action="../../controller/controllerAdministrador.php">
                                <div class="col-md-6">
                                    <div>
                                        <h3>Dados pessoais</h3>
                                    </div>
                                    <div class="control-group">
                                        <label for="nome"><strong>Nome Completo:</strong></label>
                                        <input type="text" name="nome" placeholder="Nome Completo" id="nome" class="form-control">
                                        <div id="msgErroNome">Preencha bem os campos</div>
                                    </div>
                                    <div class="control-group">
                                        <label for="email">Endereço de Email:</label>
                                        <input type="email" name="email" placeholder="email" id="email" class="form-control">
                                        <div id="msgErroEmail">Preencha correctamente @ "" . campo senha</div>
                                    </div>
                                    <div class="control-group">
                                        <label for="telemovel">Telemóvel:</label>
                                        <input type="text" name="telemovel" placeholder="Número de Telefone" id="telemovel" class="form-control" maxlength="9"  onKeyPress = "return numeros(event);">
                                        <div id="msgErroTelemovel">Preencha correctamente os campos no máximo 9 caracteres</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h3>Dados de autenticação</h3>
                                    </div>
                                    <div class="control-group">
                                        <label for="login">Nome de Utilizador:</label>
                                        <input type="text" name="login" placeholder="Nome de Login" class="form-control" id="login">
                                        <div id="msgErroLogin">Preencha bem os campos</div>
                                    </div>
                                    <div class="control-group">
                                        <label for="senha">Senha:</label>
                                        <input type="password" name="senha" placeholder="Senha" id="senha1" class="form-control">
                                        <div id="msgErroSenha1">Preencha correctamente os campos *** </div>
                                    </div>
                                    <div class="control-group">
                                        <label for="contacto">Confirmar Senha:</label>
                                        <input type="password" name="confirmar" placeholder="Confirmar a Senha" id="senha2" class="form-control">
                                        <div id="msgErroSenha2">Senhas incompatíveis</div>
                                    </div>
                                </div>    
                                <br/>
                                <br/>
                                <input class="btn btn-primary btn-block" type="submit" name="cadastrar" value="Salvar" id="btnCriarCliente">
                                
                            </form>
                            <a href="Administrador.php"><button   class="btn btn-primary btn-block " id="btnCancelar">Cancelar</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptValidar.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptValidarCamposNumericos.js" type="text/javascript"></script>
       
    </body>
</html>