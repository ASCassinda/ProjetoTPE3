<?php
    require_once '../model/Classes/Usuario.php';
    require_once '../model/DAO/UsuarioDAO.php';
    require_once '../Email.php';
    
   // $enviarEmail = new Email();
            
    if(isset($_POST['cadastrar'])){    
        $nome = filter_input(INPUT_POST, "nome");
        $email = filter_input(INPUT_POST, "email");
        $telemovel = filter_input(INPUT_POST, "telemovel");
        $login = filter_input(INPUT_POST, "login");
        $senha = filter_input(INPUT_POST, "senha");

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setTelemovel($telemovel);
        $usuario->setTipoUsuario("Cliente");
        $usuario->setNomeLogin($login);
        $usuario->setSenhaLogin($senha);
        $usuario->setEstado("Bloqueado");

        $usuarioDAO = new UsuarioDAO();
        $verifcar =$usuarioDAO->insert($usuario);
        
        if($verifcar==true){
            $emailReceptor = "janethjony@gmail.com";
            $msg = "Novo cliente efectuou um registo na aplicacao, sua conta deve ser activada.".$nome;
            //enviar($email, $emailReceptor, $msg);
            header("location:../view/cliente/aguardarValidacao.php");
        }else{
             header("location:../view/cliente/aguardarValidacao.php?sms=usuario não cadastrado");
        } 
        
    }


