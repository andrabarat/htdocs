<?php

    date_default_timezone_set('Etc/UTC');

    require 'PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;

    //gmail server credentials
    $mail->Username = "gabrielbarzu1994@gmail.com";
    $mail->Password = "gabrielbarzu1994";

    $mail->setFrom('regna@gmail.com', 'Regna');

    $mail->addReplyTo('gabrielbarzu1994@gmail.comm', 'Gabriel Catalin Barzu');

    $mail->addAddress('andra.barat05@gmail.com', 'Andra Maria Barat');

    $date=date('Y-m-d H:i:s');

    $mail->Subject = 'Pedeapsa pt Andra';

    $mail->Body    = 'Asta este pedeapsa!! ';

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";

    }

?>