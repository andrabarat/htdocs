<?php
    include "../global/session.php";
    if($login_session == ''){
         header("Location: /Account/Login.php");
    } else {
        if($usertype != 'users'){
             header("Location: /");
        }
        include "../global/header.php";
        include "../global/dbConnect.php";
        
        function ifNull($elem){
            if($elem==""){
                return "-";
            } else {
                return $elem;
            }
        }
        
        //Profilul userului
        $id_user="";
        $first_name="";
        $last_name="";
        $phone_number="";
        $email="";
        $sql = "SELECT `id_user`, `first_name`, `last_name`, `phone_number`, `email` FROM users where `user_name`='".$login_session."'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id_user=$row["id_user"];
                $first_name=$row["first_name"];
                $last_name=$row["last_name"];
                $phone_number=$row["phone_number"];
                $email=$row["email"];
            }
        }
            
        
        $sqlNext = "SELECT r.`start_reservation`, d.`grade`, d.`last_name`, d.`first_name`, d.`job_title`, r.`id_reservation`, a.`status`FROM users u join reservations r on u.`id_user`=r.`id_user` join `doctors` d on r.`id_doctor`=d.`id_doctor` join analysis a on r.`id_reservation`=a.`id_reservation` where r.`id_user`='".$id_user."' and r.`start_reservation` >= NOW() order by r.`start_reservation` LIMIT 1 ";
        $resultNext = $conn->query($sqlNext);
        
        $nextStartReservation="";
        $nextDoctor="";
        $nextJobTitle="";
        
        if ($resultNext->num_rows > 0) {
            while($row = $resultNext->fetch_assoc()) {
                $nextStartReservation=$row["start_reservation"];
                $nextDoctor=$row["first_name"]." ".$row["last_name"];
                $nextJobTitle=$row["job_title"];
            }
        }
        
        //Programarile userului
        $start_reservation="";
        $grade="";
        $last_name_doctor="";
        $first_name_doctor="";   
        $job_title="";
        $id_reservation="";
        $status="";
        $reservation_status="";
        $sql = "SELECT r.`start_reservation`, d.`grade`, d.`last_name`, d.`first_name`, d.`job_title`, r.`id_reservation`, a.`status`, 
                CASE WHEN r.`start_reservation` >= NOW() THEN 'Activ'
                ELSE 'Expirat'
                END as reservation_status
                FROM users u join reservations r on u.`id_user`=r.`id_user` join `doctors` d on r.`id_doctor`=d.`id_doctor` join analysis a on r.`id_reservation`=a.`id_reservation` where r.`id_user`=".$id_user;
        $result = $conn->query($sql);
?>

<html>
<head>
    <title>Profilul meu</title>
    <link href="/css/profil.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="/js/profile.js"></script>
    <script src="/js/global.js"></script>
</head>
<body>
    <div class="call-to-action">
        <div class="container size">
            <div class="row well">
                <div class="col-sm-12">
                    <div class="well">
                        <h3><a href="#"><strong>Profilul meu:</strong></a></h3>
                        <h4><strong>Nume: </strong><?php echo $last_name?></h4>
                        <h4><strong>Prenume: </strong><?php echo $first_name?></h4>
                        <h4><strong>Nr. telefon: </strong><?php echo $phone_number?></h4>
                        <h4><strong>Email: </strong><?php echo $email?></h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="well">
                        <h3><a href="#"><strong>Urmatoarea programare:</strong></a></h3>
                        <h4><strong>Data si ora programare: </strong><?php echo ifNull($nextStartReservation)?></h4>
                        <h4><strong>Doctor: </strong><?php echo ifNull($nextDoctor)?></h4>
                        <h4><strong>Specialitate: </strong><?php echo ifNull($nextJobTitle)?></h4>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="well">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#checkModal" onclick="changePassword()">Schimbă parola</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12" id="doctorApp">
                            <div class="row well">
                                <h3><a href="#"><strong>Programarile mele:</strong></a></h3>
                                <hr>
                                <div class="col-sm-12">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" onchange="filterReservations()">
                                        <label class="btn btn-warning btn-lg active">
                                            <input type="radio" name="options" id="Toate" checked> Toate
                                        </label>
                                        <label class="btn btn-warning btn-lg">
                                            <input type="radio" name="options" id="Absent"> Absente
                                        </label>
                                        <label class="btn btn-warning btn-lg">
                                            <input type="radio" name="options" id="Activa"> Active
                                        </label>
                                        <label class="btn btn-warning btn-lg">
                                            <input type="radio" name="options" id="Confirmat"> Confirmate
                                        </label>
                                        <label class="btn btn-warning btn-lg">
                                            <input type="radio" name="options" id="Neconfirmat"> Neconfirmate
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>

<?php
    }
?>

<script>
    <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $start_reservation=$row["start_reservation"];
                $grade=$row["grade"];
                $last_name_doctor=$row["last_name"];
                $first_name_doctor=$row["first_name"];
                $job_title=$row["job_title"];
                $id_reservation=$row["id_reservation"];
                $status=$row["status"];
                $reservation_status=$row["reservation_status"];
                ?>createMyAppoiment("doctorApp", "<?php echo $start_reservation?>", "<?php echo $grade?>", "<?php echo $last_name_doctor?>", "<?php echo $first_name_doctor?>", "<?php echo $job_title?>", "<?php echo $id_reservation?>", "<?php echo $status?>", "<?php echo $reservation_status?>");<?php
            }
        }
    ?>
</script>
<script>
function filterReservations(){
    var all=document.getElementById("Toate").checked;
    var absent=document.getElementById("Absent").checked;
    var activa=document.getElementById("Activa").checked;
    var confrimat=document.getElementById("Confirmat").checked;
    var neconfirmat=document.getElementById("Neconfirmat").checked;
    
    var allReservations=document.getElementsByClassName("reservation");
    
    if(all==true){
        for(var i=0; i<allReservations.length; i++){
            allReservations[i].style.display="block";
        }
    }
    if(absent==true){
        for(var i=0; i<allReservations.length; i++){
            if(allReservations[i].className.indexOf("Absent")>-1){
                allReservations[i].style.display="block";
            } else {
                allReservations[i].style.display="none";
            }
        }
    }
    if(activa==true){
        for(var i=0; i<allReservations.length; i++){
            if(allReservations[i].className.indexOf("Activa")>-1){
                allReservations[i].style.display="block";
            } else {
                allReservations[i].style.display="none";
            }
        }
    }
    if(confrimat==true){
        for(var i=0; i<allReservations.length; i++){
            if(allReservations[i].className.indexOf("Confirmat")>-1){
                allReservations[i].style.display="block";
            } else {
                allReservations[i].style.display="none";
            }
        }
    }
    if(neconfirmat==true){
        for(var i=0; i<allReservations.length; i++){
            if(allReservations[i].className.indexOf("Neconfirmat")>-1){
                allReservations[i].style.display="block";
            } else {
                allReservations[i].style.display="none";
            }
        }
    }
}
</script>
<style>
h1,h2,h3,h4,h5,h6,h7{
    margin-top: 10px !important;
}</style>