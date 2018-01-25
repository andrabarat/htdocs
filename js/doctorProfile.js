function checkAppoiment(father, date, last_name, first_name, job_title, id_reservation, status, reservation_status){

    var root=document.getElementById(father);

    var colsm1= document.createElement("div");
    colsm1.className="col-sm-6 reservation "+status;

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
    h2.innerHTML="<strong>Pacient: </strong>"+" "+last_name+" "+first_name; 
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
        button.className="btn btn-info btn-lg";
        button.innerHTML="Schimba status";
        button.setAttribute("onclick", "changeStatus("+id_reservation+")");
        button.setAttribute("data-toggle", "modal");
        button.setAttribute("data-target", "#checkModal");
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

//delete reservation
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
        modalFooterButton.className="btn btn-success btn-lg";
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

function submitCancelAppoiment(id_reservation){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            statusResponse(this.responseText);
            document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
            $("#ModalResponse").modal('show');
            setTimeout(function(){location.reload()}, 3000);
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/deleteReservationDoctor.php?id_reservation="+id_reservation, true);
    xhttp.send();
}

//change Status
function changeStatus(id_reservation){
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
        modalHeaderTitle.innerHTML="Status pentru pacient și prescrieri";
        modalHeader.appendChild(modalHeaderTitle);
        modalContent.appendChild(modalHeader);
        
        var modalBody=document.createElement("div");
        modalBody.className="modal-body text-center";
        modalBody.innerHTML='<div class="alert alert-danger" style="display: none" id="errorStatus"><strong>Eroare! </strong>Vă rugăm să selectați un status.</div><h4>Alege status:</h4>';
        var modalCheckbox1=document.createElement("div");
        modalCheckbox1.className="btn-group btn-group-toggle";
        modalCheckbox1.setAttribute("data-toggle","buttons");
        modalCheckbox1.innerHTML='<label class="btn btn-info btn-lg"><input type="radio" id="confirmedStatus">Confirmat</label><label class="btn btn-info btn-lg"><input type="radio" id="missedStatus">Neprezentat</label>';
        modalBody.appendChild(modalCheckbox1);
        
        var modalText=document.createElement("div");
        modalText.innerHTML='<br><h4>Prescripție:</h4><div class="form-group"><textarea class="form-control" rows="6" id="prescription"></textarea></div>';
        modalBody.appendChild(modalText);
        
        modalContent.appendChild(modalBody);

        var alignButtons=document.createElement("h3");
        alignButtons.className="text-center";

        var modalFooter=document.createElement("div");
        modalFooter.className="modal-footer";
        var modalFooterButton=document.createElement("button");
        modalFooterButton.setAttribute("type","button");
        modalFooterButton.className="btn btn-info btn-lg";
        modalFooterButton.setAttribute("data-dismiss", "modal");
        modalFooterButton.setAttribute("onclick","submitChangeStatus("+id_reservation+")");
        modalFooterButton.innerHTML="Salvează modificările";
        modalFooterButton.id="finalAction";
        
        var modalFooterButtonCancel=document.createElement("button");
        modalFooterButtonCancel.setAttribute("type","button");
        modalFooterButtonCancel.className="btn btn-default btn-lg";
        modalFooterButtonCancel.setAttribute("data-dismiss", "modal");
        modalFooterButtonCancel.innerHTML="Inchide";

        alignButtons.appendChild(modalFooterButton);
        alignButtons.appendChild(modalFooterButtonCancel);
        
        modalFooter.appendChild(alignButtons);

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

var responseChangeMess="";
function submitChangeStatus(id_reservation){
    if(document.getElementById("missedStatus").checked==false && document.getElementById("confirmedStatus").checked==false){
        document.getElementById("finalAction").removeAttribute("data-dismiss");
        document.getElementById("errorStatus").style.display="block";
    } else {
        document.getElementById("finalAction").setAttribute("data-dismiss", "modal");
        var presciption=document.getElementById("prescription").value;
        var status="";
        if(document.getElementById("missedStatus").checked==true){
            status="Absent";
        }
        if(document.getElementById("confirmedStatus").checked==true){
            status="Confirmat";
        }
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                statusResponse(this.responseText);
                document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
                $("#ModalResponse").modal('show');
                setTimeout(function(){location.reload()}, 3000);
            }
        }; 
        xhttp.open("GET", "/Account/BackEnd/changeStatusReservation.php?id_reservation="+id_reservation+"&status="+status+"&prescription="+presciption, true);
        xhttp.send();
    }
}

//get prescription
function getPrescription(id_reservation){
    if(document.getElementById("checkModal")!=null){
        document.getElementById("checkModal").remove();
    }   
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            if(document.getElementById("checkModal")!=null){
                document.getElementById("checkModal").remove();
            }   
            statusResponse(this.responseText);
            document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
            $("#ModalResponse").modal('show');
        }
    }; 
    xhttp.open("GET", "/Account/BackEnd/getPrescription.php?id_reservation="+id_reservation, true);
    xhttp.send();
}