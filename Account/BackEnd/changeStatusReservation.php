<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_reservation=$_GET["id_reservation"];
    $status=$_GET["status"];
    $prescription=$_GET["prescription"];
    
    $sql = "UPDATE `analysis` SET `status`='".$status."', `prescription`='".$prescription."' WHERE `id_reservation`='".$id_reservation."'";
    if ($conn->query($sql) === TRUE) {
        echo "Parola a fost schimbată cu succes.";
    } else {
        echo "Vechea parolă este greșită.";
    }
?>