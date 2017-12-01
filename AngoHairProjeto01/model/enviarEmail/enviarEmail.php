<?php

require_once 'phpmailer/PHPMailerAutoload.php';

class EnviarEmail {

    function enviar($sms, $emailUsuario, $email) {

        $mail = new PHPMailer;

        $mail->isSMTP();

        $mail->Host = 'smtp.gmail.com';

        $mail->Port = 587;

        $mail->SMTPSecure = 'tls';

        $mail->SMTPAuth = true;

        $mail->Username = "crwista961@gmail.com";

        $mail->Password = "......";

        $mail->setFrom($emailUsuario);

        $mail->addAddress($email);

        $mail->Subject = "Conta";

        $mail->msgHTML($sms);

        if (!$mail->send()) {
            echo 'Erro: ' . $mail->ErrorInfo;
        } else {
            echo 'SMS ENVIADO';
        }
    }

}
