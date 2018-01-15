<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    
    $oldPass=md5($_GET['oldPassword']);
    $newPass=md5($_GET['newPassword']);

    $sql = "SELECT * FROM `users` where `user_name`='".$login_session."' and `password`='".$oldPass."'";

    $result = $conn->query($sql);        
    if ($result->num_rows > 0) {
        $sql = "UPDATE `users` SET `password`='".$newPass."' WHERE `user_name`='".$login_session."'";
        if ($conn->query($sql) === TRUE) {
            echo "Parola a fost schimbată cu succes.";
        }
    } else {
        echo "Vechea parolă este greșită.";
    }
?>
