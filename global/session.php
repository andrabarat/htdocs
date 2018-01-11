<?php
    if(!isset($_SESSION)){
        session_start();
    }
	$login_session='';
    if(isset($_SESSION["usernameLogin"])){
	   $login_session=$_SESSION["usernameLogin"];
    }

    $usertype='';
    if(isset($_SESSION["userType"])){
	   $usertype=$_SESSION["userType"];
    }
?>