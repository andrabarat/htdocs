<?php
	session_start(); // Starting Session
	include "../global/dbConnect.php";
    if(isset($_SESSION["loginUsername"])){
        $username=$_GET["username"];
        $sql="SELECT r.`start_reservation`, d.`grade`, d.`last_name`, d.`first_name`, d.`job_title`, r.`id_reservation`,     a.`status`, 
                CASE WHEN r.`start_reservation` >= NOW() THEN 'Activ'
                ELSE 'Expirat'
                END as reservation_status
                FROM users u join reservations r on u.`id_user`=r.`id_user` join `doctors` d on r.`id_doctor`=
                d.`id_doctor` join analysis a on r.`id_reservation`=a.`id_reservation` where `u`.`user_name`='".$username."'";
                
        $reservationsList = [];
        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $reservation=[ $row["start_reservation"], $row["grade"]." ".$row["last_name"]." ".$row["first_name"], $row["job_title"], $row["status"],  $row["reservation_status"]];
                array_push($reservationsList, $reservation);
            }
            
            $myJSONresponse = json_encode($reservationsList);
        
            echo $myJSONresponse;
        }
    }
?>