<?php
	session_start(); // Starting Session
	include "../global/dbConnect.php";
    $username=$_GET["username"];
    $password=md5($_GET["password"]);
    
    $sql="SELECT * FROM `users` WHERE `user_name`='".$username."' and password='".$password."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           echo $row["first_name"]." ".$row["last_name"]." ".$row["phone_number"]." ".$row["email"];
            $_SESSION["loginUsername"]=$username;
        }
    } else {
        echo "failed";
    }
?>