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
        <title>Administrativo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta  charset="utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloAlterarSenhaAcesso.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/image/icone.png" rel="icon" />

    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <div class="jumbotron">
                        <div class="imagemFundo text-center">
                            <i class="fa fa-users fa-5x imagem"></i>
                            <h4>Bem vindo a AngoHair por seguranca altere seus dados</h4>
                        </div>
                        <form  method="Post" action="../../controller/controllerDadosAdminPrimeiraVez.php">

                            <div class="from-group">
                                <label>Nome</label> <input type="text" class="form-control" name="editName" value="<?php echo $dados['nomeUtilizador']; ?>">
                                <div id="msgErroNome">Preencha o campo nome</div>
                            </div>
                            <div class="from-group">
                                <label>E-mail</label> <input type="text" class="form-control" name="editEmail" value="<?php echo $dados['email']; ?>">
                                <div id="msgErroEmail">Preencha correctamente nome @ gmail.com</div>
                            </div> 
                            <div class="from-group">
                                <label>Telemóvel</label>  <input type="text" class="form-control" name="editTelemovel" value="<?php echo $dados['telemovel']; ?>">
                                <div id="msgErroTelemovel">Preencha com no máximo 9 caracteres</div>

                            </div>  
                            <div class="from-group">
                                <label>Login Utilizador</label> <input type="text" class="form-control" name="editnomeLogin" value="<?php echo $dados['loginUtilizador']; ?>" readonly="">
                                <div id="msgErroLogin">Preencha correctamente o campo</div>

                            </div>   
                            <div class="from-group">
                                <label>Senha</label> <input type="text" class="form-control" name="editPassword" value="<?php echo $dados['palavraPasse']; ?>">
                                <div id="msgErroSenha1">Preencha correctamente o campos *** </div>

                            </div>
                            <br/>
                            <button class="btn btn-primary btn-block" type="submit" name="Confirmar" id="btnCriarCliente">Confirmar</button>
                            
                        </form>

                    </div>
                </div>

            </div>

            <script src="../../view/content/js/jquery.3.2.1.js" type="text/javascript"></script>
            <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="../../view/content/js/scriptValidar.js" type="text/javascript"></script>
    </body>
</html>