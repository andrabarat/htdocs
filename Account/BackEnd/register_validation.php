<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    $id_user= 0;
    $first_name=$_POST["firstnameReg"];
    $last_name=$_POST["lastnameReg"];
    $cnp=$_POST["cnpReg"];
    $user_name=$_POST["usernameReg"];
    $phone_number=$_POST["phoneReg"];
    $email=$_POST["emailReg"];
    $password=md5($_POST["passwordReg"]);
    $confirm_password=md5($_POST["confirmPasswordReg"]);

    $error='';

    $sql = "SELECT * FROM users WHERE cnp='".$cnp."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        $error='CNP';
    }

    $sql = "SELECT * FROM users WHERE user_name='".$user_name."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        $error=$error.'%20Username';
    }
    
    $sql = "SELECT * FROM users WHERE email='".$email."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        $error=$error.'%20Email';
    }
    
    if($password!=$confirm_password){
        $error=$error.'Password';
    }else{
        $sql = "SELECT MAX(id_user) as 'Max_number' FROM users";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = $row["Max_number"];
            }
        }
        if($id==''){
            $id=1;
        } else {
            $id=$id+1;
        }
        $sql = "INSERT INTO users (id_user, first_name, last_name, cnp, user_name, phone_number, email, password)
                VALUES (".$id_user.",'".$first_name."', '".$last_name."', '".$cnp."','".$user_name."','".$phone_number."','".$email."','".$password."')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['usernameLogin']=$user_name;
            header("Location: /");
        } else {
            header("Location: /Account/Login.php");
        }
    }

    header("Location: /Account/Login.php?registerError=".$error);
?>
