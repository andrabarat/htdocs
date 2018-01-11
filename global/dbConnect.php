<?php
    $servername = "localhost";
    $username = "admin";
    //$username="id4193496_admin";
    $password = "";
    //$password = "admin";
    $dbname = "test";
    //$dbname = "id4193496_test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8");
?>