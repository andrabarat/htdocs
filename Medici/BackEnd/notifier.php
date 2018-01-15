<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../../PHPMailer/PHPMailerAutoload.php';

    $sql="select r.`id_reservation`, r.`start_reservation`, d.`first_name`, d.`last_name`, u.`email`, u.`first_name`, u.`last_name` FROM `reservations` r join `doctors` d on r.`id_doctor`=d.`id_doctor` join `users` u on r.`id_user`=u.`id_user` where substring(`start_reservation`, 1,10) = DATE_ADD(CURRENT_DATE, INTERVAL +1 DAY) order by `r`.`start_reservation` ASC";

    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
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

            $mail->setFrom('regnacontact@gmail.com', 'Regna contact');

            $mail->addReplyTo('regnacontact@gmail.com', 'Regna contact');

            $mail->addAddress($row['email'], $row['first_name']." ".$row['last_name']);

            $mail->Subject = "Reamintire rezervare Regna";

            $message="Buna ziua,\r\n\r\nVa reamintim ca aveti o  programarea cu numarul ".$row['id_reservation']." la data de ".$row['start_reservation']." .\r\n\r\n\r\nCu stima, Regna.";

            $mail->Body = $message;

            $mail->send();
            
        }
    }
?>