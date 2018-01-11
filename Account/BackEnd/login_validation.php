<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    $username=$_POST["usernameLogin"];
    $password=md5($_POST["passwordLogin"]);
    $usertype=$_POST["userType"];
    
    $sql = "SELECT * FROM ".$usertype." where user_name='".$username."' and password='".$password."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        unset($_SESSION["usernameLogin"]);
        $_SESSION["usernameLogin"]=$username;
        $_SESSION["userType"]=$usertype;
        header("Location: /");
    } else {
        header("Location: /Account/Login.php?loginError=failed");
    }
    $conn->close();

?>