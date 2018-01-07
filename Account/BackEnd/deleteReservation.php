<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_reservation=$_GET["id_reservation"];

    $sql = "DELETE FROM reservations WHERE id_reservation='".$id_reservation."'";
    if ($conn->query($sql) === TRUE) {
        echo "Rezervarea ta a fost stearsa cu succes.";
    } else {
        echo "Rezervarea ta nu a putut fi stearsa.";
    }
?>