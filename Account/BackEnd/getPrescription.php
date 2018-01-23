<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_reservation=$_GET["id_reservation"];
    $prescription="";
    $sql = "SELECT `prescription` FROM `analysis` WHERE `id_reservation`='".$id_reservation."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $prescription = $row["prescription"];
        }
    }
    echo $prescription;
?>