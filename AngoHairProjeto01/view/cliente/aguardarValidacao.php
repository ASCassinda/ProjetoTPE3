<?php
    require_once '../../model/Classes/Usuario.php';
    require_once '../../model/DAO/UsuarioDAO.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Aguardando Validação</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">  
        <link href="../../view/content/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/css/estiloValidacao.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/font-awesome-4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../view/content/image/icone.png" rel="icon" />
    </head>
    <body>
        
        <div class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <a class="navbar-brand" href="../../index.php"><i class="fa  fa-long-arrow-left"></i>&nbsp;&nbsp;<strong class="voltar">AngoHairs</strong></a>
            </div>
        </div>
        <div class="container text-center">
            <br><br>
            <i class="fa fa-envelope fa-5x"></i>
            <h1 class="ipsType_veryLarge">Por favor, aguarde confirmação do seu registro.</h1>

            <p>
                Um e-mail foi enviado para <strong id="nomeAdm">daniel.sofrimento@outlook.com</strong>. Ele contém um link para confirmar sua conta.
            </p>
            <p>
                Precisará fazer isso para que você seja capaz de acessar o site como um usuário registrado.
            </p>
            <hr class="ipsHr">
            <p>
                <a href="../../index.php" >Sair</a>
                
            </p>
        </div>
        
    </body>
</html>
