<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    require '../../PHPMailer/PHPMailerAutoload.php';
    
    $id_reservation=0;
    $id_user=$_POST["user_name"];
    $id_doctor=$_POST["id_doctor"];
    $dateAppoiment=$_POST["dateAppoiment"];
    $time_interval=$_POST["timeInterval"];
    $creation_date="";
    $email="";
    $doctorName="";
    $name="";

    $creation_date=date("Y-m-d H:i:s");

    $sql = "SELECT MAX(id_reservation) as 'Max_number' FROM reservations";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id_reservation = $row["Max_number"];
        }
    }
    if($id_reservation==''){
        $id_reservation=1;
    } else {
        $id_reservation=$id_reservation+1;
    }

    $sql = "SELECT `email`, `first_name`, `last_name` FROM `users` where id_user='".$id_user."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $email = $row["email"];
            $name = $row["first_name"]." ".$row["last_name"];
        }
    }

    $sql = "SELECT `first_name`, `last_name` FROM `doctors` where id_doctor='".$id_doctor."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $doctorName = $row["first_name"]." ".$row["last_name"];
        }
    }
    
    $sql = "INSERT INTO reservations (id_reservation, id_user, id_doctor, start_reservation, time_interval, creation_date) VALUES (".$id_reservation.",".$id_user.", ".$id_doctor.", '".$dateAppoiment." ".substr($time_interval, 0, 2).":00:00','".$time_interval."','".$creation_date."'); INSERT INTO `analyzes`(`id_analyze`, `id_reservation`, `status`, `prescription`) VALUES ('".$id_reservation."', '".$id_reservation."', 'Neconfirmat', 'Necompletat')";
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

        $mail->Subject = "Confirmare programare Regna";
        
        $message="Buna ziua,\r\n\r\nVa anuntam ca programarea dumneavoastra cu numarul ".$id_reservation." pentru data de ".$dateAppoiment." ".substr($time_interval, 0, 2).":00:00 la doctorul ".$doctorName." a fost confirmata cu succes.\r\n\r\n\r\nCu stima, Regna.";

        $mail->Body = $message;

        $mail->send();
        
        header("Location: /Medici/Doctori.php");
        
    } else {
        header("Location: /");
    }
?>