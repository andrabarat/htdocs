<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../PHPMailerAutoload.php';
    
    $name=$_GET["name"];
    $email=$_GET["email"];
    $subject=$_GET["subject"];
    $message=$_GET["message"];
    $secret="6LeIe0QUAAAAAOAke0EPaSV7ifKAvYHuhA7BSM-4";
    $response=$_GET["captcha"];
    $verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success=json_decode($verify);
    

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

    if (!$mail->send() || $captcha_success->success==false) {
        echo "Vă rugăm completați câmpul captcha.";
    } else {
        echo "Mesajul a fost trimis cu succes.";
    }
?>