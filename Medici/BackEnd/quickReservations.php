<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_quick_reservation=0;
    $job_title=$_GET["job_title"];
    $last_name=$_GET["last_name"];
    $first_name=$_GET["first_name"];
    $phone=$_GET["phone"]; 
    $creation_reservation_quick="";

    $creation_reservation_quick=date("Y-m-d H:i:s");

    $sql = "SELECT MAX(id_quick_reservation) as 'Max_number' FROM quickreservations";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id_quick_reservation= $row["Max_number"];
        }
    }
    if($id_quick_reservation==''){
        $id_quick_reservation=1;
    } else {
        $id_quick_reservation=$id_quick_reservation+1;
    }
    $sql = "INSERT INTO quickreservations (id_quick_reservation, job_title_reservation, last_name_reservation, first_name_reservation, phone_reservation, creation_reservation_quick) VALUES (".$id_quick_reservation.", '".$job_title."', '".$last_name."', '".$first_name."',  '".$phone."', '".$creation_reservation_quick."')";
    if ($conn->query($sql) === TRUE) {
        echo "Your reservation has successful.";
    } else {
        echo "Your reservation has failed.";
    }
?>