<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_reservation=0;
    $id_user=$_POST["user_name"];
    $id_doctor=$_POST["id_doctor"];
    $dateAppoiment=$_POST["dateAppoiment"];
    $time_interval=$_POST["timeInterval"];
    $creation_date="";

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
    
    $sql = "INSERT INTO reservations (id_reservation, id_user, id_doctor, start_reservation, time_interval, creation_date)
                VALUES (".$id_reservation.",".$id_user.", ".$id_doctor.", '".$dateAppoiment." ".substr($time_interval, 0, 2).":00:00','".$time_interval."','".$creation_date."')";
        if ($conn->query($sql) === TRUE) {
            header("Location: /Medici/Doctori.php");
        } else {
            header("Location: /");
        }
?>