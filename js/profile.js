function createMyAppoiment(father, date, grade, last_name, first_name, job_title, id_reservation, status, reservation_status){

    var root=document.getElementById(father);

    var colsm1= document.createElement("div");
    colsm1.className="col-sm-6 reservation " + getStatus(status, date);

    var colsm2= document.createElement("div");
    colsm2.className="col-sm-12";

    var row3 = document.createElement("div");
    row3.className="row";

    var colsm3 = document.createElement("div"); 
    colsm3.className="col-sm-12 well text-center";

    var h0 = document.createElement("h4");
    h0.innerHTML="<strong>Status: </strong>"+" "+getStatus(status, date); 
    colsm3.appendChild(h0);
    
    var h1 = document.createElement("h4");
    h1.innerHTML="<strong>Data si ora programare: </strong>"+" "+date; 
    colsm3.appendChild(h1);

    var h2 = document.createElement("h4");
    h2.innerHTML="<strong>Doctor: </strong>"+" "+grade+" "+last_name+" "+first_name; 
    colsm3.appendChild(h2);

    var h3 = document.createElement("h4");
    h3.innerHTML="<strong>Specialitate: </strong>"+" "+job_title; 
    colsm3.appendChild(h3);

    var h4 = document.createElement("h4");
    h4.className="text-center"; 

    var button = document.createElement("button");
    button.setAttribute("type", "button");
    
    if(getStatus(status, date)=="Activa"){
        button.className="btn btn-warning btn-lg";
        button.innerHTML="Anuleaza programare";
        button.setAttribute("onclick", "deleteAppoiment("+id_reservation+")");
        button.setAttribute("data-toggle", "modal");
        button.setAttribute("data-target", "#checkModal");
        h4.appendChild(button);
    }
    if(getStatus(status, date)=="Neconfirmat"){
        button.className="btn btn-success btn-lg";
        button.innerHTML="Așteaptă status";
        //button.setAttribute("onclick", "changeStatus("+id_reservation+")");
        //button.setAttribute("data-toggle", "modal");
        //button.setAttribute("data-target", "#checkModal");
        button.setAttribute("disabled", "true");
        h4.appendChild(button);
    }
    if(getStatus(status, date)=="Confirmat"){
        button.className="btn btn-primary btn-lg";
        button.innerHTML="Vezi reteta";
        button.setAttribute("onclick", "getPrescription("+id_reservation+")");
        button.setAttribute("data-toggle", "modal");
        button.setAttribute("data-target", "#checkModal");
        h4.appendChild(button);
    }
    if(getStatus(status, date)=="Absent"){
        button.className="btn btn-danger btn-lg";
        button.innerHTML="Neprezentat";
        button.setAttribute("disabled", "true");
        h4.appendChild(button);
    }
    
    h4.appendChild(button);

    colsm3.appendChild(h4);

    row3.appendChild(colsm3);
    colsm2.appendChild(row3);

    colsm1.appendChild(colsm2);
    root.appendChild(colsm1);
}

function getStatus(status, date){
    if(status=="Neconfirmat"){
        var now=new Date();
        var date=new Date(date);
        if( now < date){
            return "Activa";
        } else {
            return status;
        }
    } else {
        return status;
    }
}

function deleteAppoiment(id_reservation){
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
        modalHeaderTitle.innerHTML="Esti sigur ca vrei sa anulezi aceasta programare?";

        modalHeader.appendChild(modalHeaderTitle);

        var alignButtons=document.createElement("h3");
        alignButtons.className="text-center";

        var modalFooter=document.createElement("div");
        modalFooter.className="modal-footer";
        var modalFooterButton=document.createElement("button");
        modalFooterButton.setAttribute("type","button");
        modalFooterButton.className="btn btn-warning btn-lg";
        modalFooterButton.setAttribute("data-dismiss", "modal");
        modalFooterButton.setAttribute("onclick","submitCancelAppoiment("+id_reservation+")");
        modalFooterButton.innerHTML="Anuleaza programare";
        
        var modalFooterButtonCancel=document.createElement("button");
        modalFooterButtonCancel.setAttribute("type","button");
        modalFooterButtonCancel.className="btn btn-default btn-lg";
        modalFooterButtonCancel.setAttribute("data-dismiss", "modal");
        modalFooterButtonCancel.innerHTML="Inchide";

        alignButtons.appendChild(modalFooterButton);
        alignButtons.appendChild(modalFooterButtonCancel);
        
        modalFooter.appendChild(alignButtons);

        modalContent.appendChild(modalHeader);
        modalContent.appendChild(modalFooter);
        modalDialog.appendChild(modalContent);
        modal.appendChild(modalDialog);

        document.getElementsByTagName("body")[0].appendChild(modal);
        document.getElementsByTagName("body")[0].style.padding="0";
    } else {
        $("#checkModal").modal('show');
        document.getElementsByTagName("body")[0].style.padding="0";
    }
}

var responseMess="";
function submitCancelAppoiment(id_reservation){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            statusResponse(responseMess);
            document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
            $("#ModalResponse").modal('show');
            setTimeout(function(){location.reload()}, 3000);
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/deleteReservation.php?id_reservation="+id_reservation, true);
    xhttp.send();
}

//get prescription
function getPrescription(id_reservation){
    if(document.getElementById("checkModal")!=null){
        document.getElementById("checkModal").remove();
    }   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            statusResponse(this.responseText);
            document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
            $("#ModalResponse").modal('show');
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/getPrescription.php?id_reservation="+id_reservation, true);
    xhttp.send();
}

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