<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $id_doctor=$_GET["id_doctor"];
    $user_name=$_GET["user_name"];
    $rating=$_GET["rating"];
    
    $id_user="";

    $sql = "SELECT `id_user` FROM `users` where `user_name`='".$user_name."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $id_user=$row["id_user"];
        }
    }

    $sql="SELECT * FROM `ratings` WHERE `id_user`='".$id_user."' AND `id_doctor`='".$id_doctor."'";
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) {
        //update
        $sql="UPDATE `ratings` SET `rating`='".$rating."' WHERE `id_user`='".$id_user."' AND `id_doctor`='".$id_doctor."'";
        if ($conn->query($sql) === TRUE) {
            echo "1Chestionarul a fost salvat.";
        } else {
            echo "0Vă rugăm încercați din nou.";
        }
    } else {
        //delete
        $sql = "INSERT INTO `ratings` (`id_doctor`, `id_user`, `rating`) VALUES (".$id_doctor.",'".$id_user."', '".$rating."')";
        if ($conn->query($sql) === TRUE) {
            echo "1Chestionarul a fost salvat cu success.";
        } else {
            echo "0Vă rugăm încercați din nou.";
        }
    }

?>