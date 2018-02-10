<?php
    include "../global/session.php";
    if($login_session == ''){
         header("Location: /Account/Login.php");
    } else {    
        if($usertype != 'doctors'){
             header("Location: /");
        }
        include "../global/header.php";
        include "../global/dbConnect.php";
        
        //Profilul doctorului
        $id_doctor="";
        $grade_doctor="";
        $first_name="";
        $last_name="";
        $job_title_doctor="";
        $email="";
        $description="";
        $sql = "SELECT `id_doctor`,`grade`, `first_name`, `last_name`, `job_title`, `email`,`description` FROM doctors where `user_name`='".$login_session."'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id_doctor=$row["id_doctor"];
                $grade_doctor=$row["grade"];
                $first_name=$row["first_name"];
                $last_name=$row["last_name"];
                $job_title_doctor=$row["job_title"];
                $email=$row["email"];
                $description=$row["description"];
            }
        }
        
        $avg_rating="";
        $count_avg=0;
        $sql = "SELECT truncate(avg(`rating`),2) as 'rating_avg', count(`rating`) as 'count_avg' FROM `ratings` where `id_doctor`='".$id_doctor."'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $avg_rating=$row["rating_avg"];
                $count_avg=$row["count_avg"];
            }
        }
        
        if($avg_rating==""){
            $avg_rating="- ";
        }
        
        $start_reservation="";
        $grade="";
        $last_name_user="";
        $first_name_user="";   
        $job_title="";
        $id_reservation="";
        $status="";
        $reservation_status="";
        $sql = "SELECT  r.`start_reservation`, u.`last_name`, u.`first_name`, d.`job_title`, r.`id_reservation`, a.`status`, 
                CASE WHEN r.`start_reservation` >= NOW() THEN 'Activ'
                ELSE 'Expirat'
                END as reservation_status
                FROM users u join reservations r on u.`id_user`=r.`id_user` join `doctors` d on r.`id_doctor`=d.`id_doctor` join analysis a on r.`id_reservation`=a.`id_reservation` where r.`id_doctor`=".$id_doctor;
        $result = $conn->query($sql);       
?>
<html>
<head>
    <title>Profilul meu</title>
    <link href="/css/profil.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="/js/doctorProfile.js"></script>
    <script src="/js/global.js"></script>
</head>
<body>
    <div class="call-to-action">
        <div class="container size">
            <div class="row well">
                <div class="col-sm-8">
                    <div class="well">
                        <h3><a href="#"><strong>Profilul meu:</strong></a></h3>
                        <h4><strong>Grad: </strong><?php echo $grade_doctor?></h4>
                        <h4><strong>Nume: </strong><?php echo $last_name?></h4>
                        <h4><strong>Prenume: </strong><?php echo $first_name?></h4>
                        <h4><strong>Specialitate: </strong><?php echo $job_title_doctor?></h4>
                        <h4><strong>Repartizare: </strong><?php echo $description?></h4>
                        <h4><strong>Email: </strong><?php echo $email?></h4>
                    </div>
                    <div class="well">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#checkModal" onclick="changePassword()">Schimba parola</button>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well">
                                <h3><a href="#"><strong>Notă doctor:</strong></a></h3>
                                <div class="circle">
                                    <h1 class="textCircle"><strong><?php echo $avg_rating?></strong><small class="colorRating">/ 5</small></h1>
                                </div>
                                <h4>De la <?php echo $count_avg; if($count_avg==1){ echo " utilizator."; } else {  echo " utilizatori."; }?> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12" id="userApp">
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
<?php } ?>

<script>
    <?php 
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $start_reservation=$row["start_reservation"];
                $last_name_user=$row["last_name"];
                $first_name_user=$row["first_name"];
                $id_reservation=$row["id_reservation"];
                $job_title=$row["job_title"];
                $status=$row["status"];
                $reservation_status=$row["reservation_status"];
                ?>checkAppoiment("userApp", "<?php echo $start_reservation?>", "<?php echo $last_name_user?>", "<?php echo $first_name_user?>", "<?php echo $job_title?>", "<?php echo $id_reservation?>", "<?php echo $status?>", "<?php echo $reservation_status?>");<?php
            }
        }
    ?>
    
    function changePassword(){
    document.getElementsByTagName("body")[0].style.padding="0";
    var test=document.querySelectorAll(".modal");
    if(test.length<3){ 
        if(document.getElementById("checkModal")!=null){
            document.getElementById("checkModal").remove();
        }        
        var modal=document.createElement("div");
        modal.className="modal fade";
        modal.id="checkModal";
        modal.setAttribute("role", "dialog");

        var modalDialog=document.createElement("div");
        modalDialog.className="modal-dialog";

        var modalContent=document.createElement("div");
        modalContent.className="modal-content";

        var modalHeader=document.createElement("div");
        modalHeader.className="modal-header";
        var modalHeaderButton=document.createElement("button");
        modalHeaderButton.type="button";
        modalHeaderButton.className="close";
        modalHeaderButton.setAttribute("data-dismiss", "modal");
        modalHeaderButton.innerHTML="&times;";
        var modalHeaderTitle=document.createElement("h4");
        modalHeaderTitle.className="text-center";
        modalHeaderTitle.innerHTML="Dorești o parolă nouă?";

        modalHeader.appendChild(modalHeaderTitle);

        var modalBody=document.createElement("div");
        modalBody.className="modal-body";
        
        var modalBodyOldPass=document.createElement("div");
        modalBodyOldPass.className="input-group";
        modalBodyOldPass.innerHTML='<span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>';
        var modalBodyOldPassInput=document.createElement("input");
        modalBodyOldPassInput.type="password";
        modalBodyOldPassInput.className="form-control input-lg";
        modalBodyOldPassInput.placeholder="Parola veche";
        modalBodyOldPassInput.name="passwordOld";
        modalBodyOldPassInput.id="passwordOld";
        modalBodyOldPassInput.required="true";
        
        var br=document.createElement("br");
        
        var modalBodyNewPass=document.createElement("div");
        modalBodyNewPass.className="input-group";
        modalBodyNewPass.innerHTML='<span class="input-group-addon input-lg glyphicon glyphicon-search" aria-hidden="true"></span>';
        var modalBodyNewPassInput=document.createElement("input");
        modalBodyNewPassInput.type="password";
        modalBodyNewPassInput.className="form-control input-lg";
        modalBodyNewPassInput.placeholder="Parola nouă";
        modalBodyNewPassInput.name="passwordNew";
        modalBodyNewPassInput.id="passwordNew";
        modalBodyNewPassInput.required="true";
        
        modalBodyOldPass.appendChild(modalBodyOldPassInput);
        modalBody.appendChild(modalBodyOldPass);        
        modalBody.appendChild(br);        
        modalBodyNewPass.appendChild(modalBodyNewPassInput);
        modalBody.appendChild(modalBodyNewPass);
        
        var alignButtons=document.createElement("h3");
        alignButtons.className="text-center";

        var modalFooter=document.createElement("div");
        modalFooter.className="modal-footer";
        var modalFooterButton=document.createElement("button");
        modalFooterButton.setAttribute("type","button");
        modalFooterButton.className="btn btn-primary btn-lg";
        modalFooterButton.setAttribute("data-dismiss", "modal");
        modalFooterButton.setAttribute("onclick","submitChangePassword()");
        modalFooterButton.innerHTML="Schimba parola";
        
        var modalFooterButtonCancel=document.createElement("button");
        modalFooterButtonCancel.setAttribute("type","button");
        modalFooterButtonCancel.className="btn btn-default btn-lg";
        modalFooterButtonCancel.setAttribute("data-dismiss", "modal");
        modalFooterButtonCancel.innerHTML="Inchide";

        alignButtons.appendChild(modalFooterButton);
        alignButtons.appendChild(modalFooterButtonCancel);
        
        modalFooter.appendChild(alignButtons);


        modalContent.appendChild(modalHeader);
        modalContent.appendChild(modalBody);
        modalContent.appendChild(modalFooter);
        modalDialog.appendChild(modalContent);
        modal.appendChild(modalDialog);

        document.getElementsByTagName("body")[0].appendChild(modal);
    } else {
        $("#checkModal").modal('show');
        document.getElementsByTagName("body")[0].style.padding="0";
    }
}

function submitChangePassword(){
    var oldPass=document.getElementById("passwordOld").value;
    var newPass=document.getElementById("passwordNew").value;
    document.getElementsByTagName("body")[0].style.padding="0";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            responseMess=this.responseText;
            statusResponse(responseMess);
            $("#ModalResponse").modal('show');
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/changePassword.php?oldPassword="+oldPass+"&newPassword="+newPass, true);
    xhttp.send();
}
    
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
