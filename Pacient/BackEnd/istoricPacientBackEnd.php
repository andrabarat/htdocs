<?php
    error_reporting(E_ERROR | E_PARSE);
    include "../../global/dbConnect.php";
    include "../../global/session.php";

    $cnp=$_GET["cnp"];
    $phone=$_GET["phone"];
    
    $condition="";
    if($cnp==""){
        $condition="u.`phone_number`='".$phone."'";
    } else {
        $condition="u.`cnp`='".$cnp."'";
        if($phone!=""){
            $condition.=" AND u.`phone_number`='".$phone."'";
        }
    }

    $returnText="";

    $sql="  SELECT a.`prescription`, u.`first_name` as 'user_first_name', u.`last_name` as 'user_last_name', u.`phone_number`, u.`email`, d.`first_name`, d.`last_name`, d.`job_title`
            FROM `analysis` a JOIN `reservations` r ON a.`id_reservation`=r.`id_reservation` JOIN `doctors` d ON r.`id_doctor`=d.`id_doctor` JOIN `users` u ON r.`id_user`=u.`id_user` WHERE a.`status`='Confirmat' AND ".$condition;
    
    $user_username="";
    $user_phone="";
    $user_email="";
    $reservationsList = []; 

    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $user_username=$row["user_first_name"]." ".$row["user_last_name"];
            $user_phone=$row["phone_number"];
            $user_email=$row["email"];
            
            $doctorInfo = [ $row["first_name"]." ".$row["last_name"]." - ".$row["job_title"], $row["prescription"]]; 
            
            array_push($reservationsList, $doctorInfo);
        }
    
        $responseText->name = $user_username;
        $responseText->phone = $user_phone;
        $responseText->email = $user_email;
        $responseText->reservations = $reservationsList;
        
        $myJSONresponse = json_encode($responseText);
        
        echo $myJSONresponse;
    } else {
        echo $returnText="Error Nu s-a gasit niciun pacient cu aceste date.";
    }
?>