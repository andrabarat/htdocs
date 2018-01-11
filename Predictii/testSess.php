<?php 
session_start();
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
$usertype='';
    if(isset($_SESSION["userType"])){
	   $usertype=$_SESSION["userType"];
    }
echo $usertype;
?>