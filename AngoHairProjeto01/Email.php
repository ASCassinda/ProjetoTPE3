<?php
require_once'phpmailer/PHPMailerAutoload.php';

//class Email{

    //function enviar($emailEmissor, $emailReceptor, $msg){
        
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "crwista961@gmail.com";
        $mail->Password = "Deus1234";
        $mail->setFrom($emailEmissor);
        $mail->addAddress($emailReceptor);
        $mail->Subject = "Nova conta";
        $mail->msgHTML($msg);

        if (!$mail->send()) {
            echo 'Erro: ' . $mail->ErrorInfo;
        } else {
            echo 'SMS ENVIADO';
        }
    

//}
