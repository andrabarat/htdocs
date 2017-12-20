<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";

    $id_doctor=$_GET["id_doctor"];
    $dateAppoiment=$_GET["dateAppoiment"];

    $reservationsInterval="";
    $sql="SELECT `time_interval` from `reservations` where `id_doctor`=".$id_doctor." and `start_reservation` like '%".$dateAppoiment."%'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reservationsInterval = $reservationsInterval.", ".$row["time_interval"];
        }
    }
    echo substr($reservationsInterval, 2, strlen($reservationsInterval));
?>