<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../../PHPMailer/PHPMailerAutoload.php';
    
    $id_reservation=$_GET["id_reservation"];
    $status=$_GET["status"];
    $prescription=$_GET["prescription"];
    
    $email="";
    $name="";

    $sql = "SELECT u.`email`, u.`first_name`, u.`last_name` FROM `users` u join `reservations` r on u.`id_user`=r.`id_user` where r.`id_reservation`='".$id_reservation."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $name = $row["first_name"]." ".$row["last_name"];
        }
    }

    $sql = "UPDATE `analysis` SET `status`='".$status."', `prescription`='".$prescription."' WHERE `id_reservation`='".$id_reservation."'";
    if ($conn->query($sql) === TRUE) {
        
        if($status=="Confirmat"){
                
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

            $mail->Subject = "Programarea confirmata";

            $message="Buna ziua,\r\n\r\nConfirmarea dumneavoastra cu numarul ".$id_reservation." a fost confirmata cu succes.\r\nPrescripitia doctorului:\r\n".$prescription."\r\n\r\n\r\nCu stima, Regna.";

            $mail->Body = $message;

            $mail->send();
        }
        
        echo "Datele au fost adăugate cu success.";
    } else {
        echo "A apărut o eroare, vă rugăm încercați din nou.";
    }
?>