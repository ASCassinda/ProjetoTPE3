<!DOCTYPE>
<html>
    <head>
        <title>AngoHairs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta  charset="utf-8" />
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloLogin.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>
        <div class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../index.php"><i class="fa  fa-angle-left fa-3x"></i><strong class="voltar">&nbsp;AngoHairs</strong></a>
            </div>
        </div>
        <div class="container-fluid">

            <div class="container cadastro">
                <form class="form-group-lg" id="validarCadastro" method="post" onsubmit="" action="../../controller/controllerAdicionarCliente.php">

                    <div class="row" id="divCadastro">
                        <div class="col-md-6">
                            <div>
                                <h3>Dados Pessoais</h3>
                            </div>
                            <div class="form-group">
                                <label for="nome"><strong>Nome Completo:</strong></label>
                                <input type="text" name="nome" placeholder="Nome Completo" id="nome" class="form-control">                           
                                <div id="msgErroNome">Preencha o campo nome</div>
                            </div>
                            <div class="form-group">
                                <label for="email">Endereço de Email:</label>
                                <input type="email" name="email" placeholder="Email" id="email" class="form-control">
                                <div id="msgErroEmail">Preencha correctamente nome @ gmail.com</div>
                            </div>
                            <div class="form-group">
                                <label for="telemovel">Telemóvel:</label>
                                <input type="text" name="telemovel" placeholder="Número de Telefone" id="telemovel" class="form-control" maxlength="9"  onKeyPress = "return numeros(event);" >
                                <div id="msgErroTelemovel">Preencha com no máximo 9 caracteres</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <h3>Dados de Autenticação</h3>
                            </div>
                            <div class="form-group">
                                <label for="login">Nome de Utilizador:</label>
                                <input type="text" name="login" placeholder="Nome de Login" class="form-control" id="login">
                                <div id="msgErroLogin">Preencha correctamente o campo</div>

                            </div>
                            <div class="form-group">
                                <label for="senha">Senha:</label>
                                <input type="password" name="senha" placeholder="Senha" id="senha1" class="form-control">
                                <div id="msgErroSenha1">Preencha correctamente o campos *** </div>

                            </div>
                            <div class="form-group">
                                <label for="senha2">Confirmar Senha:</label>
                                <input type="password" name="senha2" placeholder="Confirmar a Senha" id="senha2" class="form-control">
                                <div id="msgErroSenha2">Senhas incompatíveis</div>

                            </div>

                        </div>

                    </div>
                    <div class="form-group text-center">
                        <input type="submit" name="cadastrar" value="Criar conta" class="btn btn-primary btn-block" id="btnCriarCliente"/>
                        
                    </div>
                    <a href="../../index.php" class="btn btn-primary btn-block"> Cancelar</a>
                </form>

            </div>
        </div>   
        <script src="../../view/content/js/jquery-1.6.2.js" type="text/javascript"></script>
        <script src="../../view/content/bootstrap-3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../view/content/js/jquery.validate.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptValidar.js" type="text/javascript"></script>
        <script src="../../view/content/js/scriptValidarCamposNumericos.js" type="text/javascript"></script>
       
    </body>
</html>


