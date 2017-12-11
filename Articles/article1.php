<?php
    include "../global/session.php";
    if($login_session != ''){
         header("Location: /Account/MyProfile.php");
    } else {    
        include "../global/header.php";
        
        
        
        
    }
?>