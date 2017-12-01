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
            <h1 class="ipsType_veryLarge">Sua conta encontra-se bloaqueada no momento</h1>

            <p>
                Um e-mail foi enviado para <strong id="nomeAdm">administrador</strong>.
            </p>
            <p>
                Aguarde uma notificação para desfrutar de nossos serviços.
            </p>
            <hr class="ipsHr">
            
        </div>
        
    </body>
</html>
