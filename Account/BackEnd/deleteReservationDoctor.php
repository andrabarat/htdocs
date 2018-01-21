<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../../PHPMailer/PHPMailerAutoload.php';
    
    $id_reservation=$_GET["id_reservation"];
    $email="";
    $doctorName="";
    $name="";
 
    $sql = "SELECT u.`email`, u.`first_name`, u.`last_name` FROM `users` u join `reservations` r on u.`id_user`=r.`id_user` where r.`id_reservation`='".$id_reservation."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $name = $row["first_name"]." ".$row["last_name"];
        }
    }

    $sql = "DELETE FROM reservations WHERE id_reservation='".$id_reservation."'; DELETE FROM analysis WHERE id_reservation='".$id_reservation."'";
    if ($conn->multi_query($sql) === TRUE) {
        
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

        $mail->addAddress($email, $name);

        $mail->Subject = "Anulare programare Regna";
        
        $message="Buna ziua,\r\n\r\nCu parere de rau va anuntam ca programarea dumneavoastra cu numarul ".$id_reservation." a fost anulata de catre un doctor.\r\nVa rugam sa completati o noua rezervare.\r\n\r\n\r\nCu stima, Regna.";

        $mail->Body = $message;

        $mail->send();
        
        echo "Rezervarea ta a fost stearsa cu succes.";
    } else {
        echo "Rezervarea ta nu a putut fi stearsa.";
    }
?>