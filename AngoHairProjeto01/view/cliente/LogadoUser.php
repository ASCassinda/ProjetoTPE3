<?php
session_start();
$idUtilizador = $_SESSION['idUtilizador'];
require_once '../../model/Classes/Usuario.php';
require_once '../../model/DAO/UsuarioDAO.php';
require_once '../../model/DAO/MarcacaoDAO.php';

$marcacaoDAO=new MarcacaoDAO();
$usuarioDAO = new UsuarioDAO();
$dados = $usuarioDAO->getById($idUtilizador);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Cliente</title>
        <link href="../content/assets/css/bootstrap.css" rel="stylesheet" />
        <link href="../content/assets/css/font-awesome.min.css" rel="stylesheet" />
        <link href="../content/assets/plugins/vegas/jquery.vegas.min.css" rel="stylesheet" />
        <link href="../content/assets/css/component.css" rel="stylesheet" />
        <link href="../content/assets/css/style.css" rel="stylesheet" />
        <link href="../../view/content/image/icone.png" rel="icon" />
        <link href="../../view/content/css/estiloValidarClientes.css" rel="stylesheet" />
        <link href="../content/datapicker/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
        <link href="../content/css/CssMarcacao.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <!-- MAIN HEADING-->
        <div class="for-full-back color-bg-one" id="main-sec">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-8 col-md-offset-2 ">
                        <div class="collapse navbar-collapse" id="menuSecundario">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="Entrar_Login"><a href="" class="menu_e"><i class="fa fa-circle"></i> <?php echo $dados['nomeUtilizador']; ?></a></li>

                                <li class="Entrar_Login"><a href="../../controller/controller Logout.php"><i class="fa fa-sign-out fa-2x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
            <h3></h3>

            <a href="LogadoUser.php"><i class="fa fa-home fa-2x"></i>Home</a>
            <a href="#perfilCliente"><i class="fa fa-user fa-2x"></i>Perfil</a>
            <a href="solicitarMarcacao.php"><i class="fa  fa-calendar fa-2x"></i>Marcação</a>
            <a href="ReagendamentoMarcacao.php"><i class="fa fa-edit fa-2x"></i>Reagendamento</a>
            
        </nav>

        <div class="row" id="icon-left">
            <div class="col-md-12">
                &nbsp;<i id="showLeftPush" class="fa fa-align-justify fa-3x faa-horizontal animated "></i>
            </div>
        </div>
        <div class="container" id="home">
            <div class="row text-center">
                <div class="col-md-12">
                    <span class="head-main">Agende seu horário online</span>
                    <h2 class="head-sub-main">Um jeito fácil de organizar seu tempo</h2>
                    <h3 class="head-last">Marque seu horário na AngoHairs em poucos segundos</h3>
                    <a href="solicitarMarcacao.php" class="btn btn-danger btn-lg head-btn-one">Marque horário</a> &nbsp;  
                    <a href="#" class="btn btn-primary btn-lg">Consulte horários</a>
                </div>
            </div>
        </div>
        
        <section id="perfilCliente">
            <div class="page">
                <div class="container">	
                    <div class="row">

                        <div class="col-md-9">
                            <div class="row">
                                <div class="logoTipo">
                                    <h3>AngoHairs</h3>
                                </div>

                                <ul class="thumbnails list-unstyled">

                                    <li class="col-md-9">
                                        <div  class="jumbotron" id="thumb">
                                            <div class="imagemFundo text-center">
                                                <i class="fa fa-user fa-5x imagem"></i>
                                                <h4>Informação do cliente</h4>
                                            </div>
                                            <div class="textoCliente">
                                                <p><i class="fa fa-user"></i>&nbsp; Nome: <?php echo $dados['nomeUtilizador']; ?></p>
                                                <p><i class="fa fa-envelope"></i>&nbsp; E-mail: <?php echo $dados['email']; ?></p>
                                                <p><i class="fa fa-phone"></i>&nbsp; Telemóvel: <?php echo $dados['telemovel']; ?></p>
                                            </div>
                                            
                                  
                                                <a class="navEdit btn btn-primary btn-block"  data-target="#myModal" data-toggle="modal">Alterar Dados</a>
                                            

                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">

                        <div class="imagemFundo text-center">
                            <i class="fa fa-users fa-5x imagem"></i>
                            <h4>Actualizar dados</h4>
                        </div>
                        <form  method="Post" action="../../controller/controllerEditarCliente.php">

                            <div class="from-group">
                                <label>Nome</label> <input type="text" id="nome" class="form-control" name="editName" value="<?php echo $dados['nomeUtilizador']; ?>">
                                <div id="msgErroNome">Preencha o campo nome</div>
                            </div>
                            <div class="from-group">
                                <label>E-mail</label> <input type="text" id="email" class="form-control" name="editEmail" value="<?php echo $dados['email']; ?>">
                            <div id="msgErroEmail">Preencha correctamente nome @ gmail.com</div>
                            </div> 
                            <div class="from-group">
                                <label>Telemóvel</label>  <input type="text" id="telemovel" class="form-control" name="editTelemovel" value="<?php echo $dados['telemovel']; ?>">
                            <div id="msgErroTelemovel">Preencha com no máximo 9 caracteres</div>
                            </div>  
                            <div class="from-group">
                                <label>Login Utilizador</label> <input type="text"  id="login" class="form-control" name="editnomeLogin" value="<?php echo $dados['loginUtilizador']; ?>" readonly="">
                                <div id="msgErroLogin">Preencha correctamente o campo</div>
                            </div>   
                            <div class="from-group">
                                <label>Senha</label> <input type="text" id="senha1" class="form-control" name="editPassword" value="<?php echo $dados['palavraPasse']; ?>">
                                <div id="msgErroSenha1">Preencha correctamente o campos *** </div>
                            </div>
                            <br/>
                            <button class="btn btn-primary btn-block btnPri" type="submit" name="alterar" id="btnCriarCliente">Alterar</button>
                            <button class="btn btn-primary btn-block btnPri" type="submit" name="cancelar">Cancelar</button>
                            
                        </form>
                    </div>

                </div>
            </div></div>
        
        <script src="../content/assets/plugins/jquery-1.10.2.js"></script>
        <script src="../content/assets/plugins/bootstrap.js"></script>
        <script src="../content/assets/js/modernizr.custom.js"></script>
        <script src="../content/assets/js/classie.js"></script>
        <script src="../content/js/scriptValidarAlteracaoCliente.js" type="text/javascript"></script>
        <script src="../content/assets/plugins/vegas/jquery.vegas.min.js"></script>
        <script src="../content/assets/js/custom.js"></script>
    </body>
</html>
