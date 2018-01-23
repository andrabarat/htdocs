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
                <div class="col-sm-5">
                    <div class="well">
                        <h3><a href="#"><strong>Profilul meu:</strong></a></h3>
                        <h4><strong>Nume: </strong><?php echo $last_name?></h4>
                        <h4><strong>Prenume: </strong><?php echo $first_name?></h4>
                        <h4><strong>Nr. telefon: </strong><?php echo $phone_number?></h4>
                        <h4><strong>Email: </strong><?php echo $email?></h4>
                    </div>
                    <div class="well">
                        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#checkModal" onclick="changePassword()">Schimba parola</button>
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="well">
                                <h3><a href="#"><strong>Abonamentele mele</strong></a></h3>
                                <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
                            </div>
                            <div class="well">
                                <h4><strong>Data si ora programare: </strong></h4>
                                <h4><strong>Doctor: </strong></h4>
                                <h4><strong>Specialitate: </strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12" id="myApp">
                            <div class="row well">
                                <h3><a href="#"><strong>Programarile mele:</strong></a></h3>
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
                ?>createMyAppoiment("myApp", "<?php echo $start_reservation?>", "<?php echo $grade?>", "<?php echo $last_name_doctor?>", "<?php echo $first_name_doctor?>", "<?php echo $job_title?>", "<?php echo $id_reservation?>", "<?php echo $status?>", "<?php echo $reservation_status?>");<?php
            }
        }
    ?>
    
function changePassword(){
    document.getElementsByTagName("body")[0].style.padding="0";
    var test=document.querySelectorAll(".modal");
    if(document.getElementById("checkModal")!=null){
        document.getElementById("checkModal").remove();
    }  
    if(test.length<3){       
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
            statusResponse(this.responseText);
            document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
            $("#ModalResponse").modal('show');
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/changePassword.php?oldPassword="+oldPass+"&newPassword="+newPass, true);
    xhttp.send();
}
</script>
<style>
.glyphicon{
    position: initial;
}
</style>