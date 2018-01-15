<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../PHPMailerAutoload.php';
    
    $name=$_GET["name"];
    $email=$_GET["email"];
    $subject=$_GET["subject"];
    $message=$_GET["message"];

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 0;

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
    $mail->Username = "regnacontact@gmail.com";
    $mail->Password = "andrabarat";

    $mail->setFrom($email, $name);

    $mail->addReplyTo($email, $name);

    $mail->addAddress('regnacontact@gmail.com', 'Regna contact');

    $mail->Subject = $subject;

    $mail->Body    = $message;

    if (!$mail->send()) {
        echo "A intervenit ceva, va ruram incercati din nou.";
    } else {
        echo "Mesajul a fost trimis cu succes.";
    }


?>