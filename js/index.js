var jobTitle=["ALL", "Cardiologie", "Dermatologie", "Gastroenterologie", "Medicina-interna", "Nutritie", "Neonatologie", "Obstetrica-Ginecologie", "Ortopedie-si-traumatologie", "Pediatrie", "Pneumologie", "Urologie"];
function createAppoimentModal(){
    document.getElementsByTagName("body")[0].style.padding="0";
    var test=document.querySelectorAll(".modal");
    if(test.length<3){    
        $(document).ready(function(){
            $('.phone').mask('0000-000-000');
        });
        var modal=document.createElement("div");
        modal.className="modal fade";
        modal.id="appoimentsModal";
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
        modalHeaderTitle.innerHTML="Programare medic";

        modalHeader.appendChild(modalHeaderTitle);
        //modalHeader.appendChild(modalHeaderButton);


        var modalBody=document.createElement("div");
        modalBody.className="modal-body";
        var modalBodyDetails=document.createElement("h7");
        modalBodyDetails.innerHTML="Te rugăm să completezi cu atenție câmpurile de mai jos. Vei fi contactat în cel mai scurt timp posibil de un consilier Regna pentru a stabili toate detaliile necesare.<hr>";

        modalBody.appendChild(modalBodyDetails);

        var modalBodySpec=document.createElement("div"); 
        modalBodySpec.className="form-group";
        var modalBodySpecLabel=document.createElement("label"); 
        modalBodySpecLabel.innerHTML="Specialitate: <strong style='color:red'>*</strong>";
        var modalBodySpecInput=document.createElement("select"); 
        modalBodySpecInput.className="form-control";
        modalBodySpecInput.id="inputSpecialitate";
        for(var i=0; i<jobTitle.length; i++){
            var option=document.createElement("option");
            option.value=jobTitle[i];
            option.innerHTML=jobTitle[i];
            modalBodySpecInput.appendChild(option);
        }

        modalBodySpec.appendChild(modalBodySpecLabel);
        modalBodySpec.appendChild(modalBodySpecInput);

        var modalBodyName=document.createElement("div"); 
        modalBodyName.className="form-group";
        var modalBodyNameLabel=document.createElement("label"); 
        modalBodyNameLabel.innerHTML="Nume: <strong style='color:red'>*</strong>";
        var modalBodyNameInput=document.createElement("input"); 
        modalBodyNameInput.className="form-control";
        modalBodyNameInput.id="inputName";
        modalBodyNameInput.type="text";

        modalBodyName.appendChild(modalBodyNameLabel);
        modalBodyName.appendChild(modalBodyNameInput);

        var modalBodySurname=document.createElement("div"); 
        modalBodySurname.className="form-group";
        var modalBodySurnameLabel=document.createElement("label"); 
        modalBodySurnameLabel.innerHTML="Prenume: <strong style='color:red'>*</strong>";
        var modalBodySurnameInput=document.createElement("input"); 
        modalBodySurnameInput.className="form-control";
        modalBodySurnameInput.id="inputSurname";
        modalBodySurnameInput.type="text";

        modalBodySurname.appendChild(modalBodySurnameLabel);
        modalBodySurname.appendChild(modalBodySurnameInput);

        var modalBodyPhone=document.createElement("div"); 
        modalBodyPhone.className="form-group";
        var modalBodyPhoneLabel=document.createElement("label"); 
        modalBodyPhoneLabel.innerHTML="Telefon: <strong style='color:red'>*</strong>";
        var modalBodyPhoneInput=document.createElement("input"); 
        modalBodyPhoneInput.className="form-control phone";
        modalBodyPhoneInput.id="inputPhone";
        modalBodyPhoneInput.type="text";

        modalBodyPhone.appendChild(modalBodyPhoneLabel);
        modalBodyPhone.appendChild(modalBodyPhoneInput);


        modalBody.appendChild(modalBodySpec);
        modalBody.appendChild(modalBodyName);
        modalBody.appendChild(modalBodySurname);
        modalBody.appendChild(modalBodyPhone);

        var modalFooter=document.createElement("div");
        modalFooter.className="modal-footer";
        
        var alignButtons=document.createElement("h3");
        alignButtons.className="text-center";
        
        var modalFooterButton=document.createElement("button");
        modalFooterButton.setAttribute("type","button");
        modalFooterButton.className="btn btn-success btn-lg";
        modalFooterButton.setAttribute("onclick","submitFormReservation()");
        modalFooterButton.innerHTML="Trimite programare";
        modalFooterButton.id="sendReservation";

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
        $("#appoimentsModal").modal('show');
        document.getElementsByTagName("body")[0].style.padding="0";
    }
}

var responseMess="";
function submitFormReservation(){
    
    var job_title=document.getElementById("inputSpecialitate").value;
    var last_name=document.getElementById("inputName").value;
    var first_name=document.getElementById("inputSurname").value;
    var phone=document.getElementById("inputPhone").value;
    
    if(job_title!="ALL" && last_name!="" && first_name!="" && phone!="")
    {   
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                statusResponse(this.responseText);
                document.getElementById("responseHeaderTitle").innerHTML=this.responseText;
                $("#ModalResponse").modal('show');
                document.getElementById("inputSpecialitate").value="ALL";
                document.getElementById("inputName").value="";
                document.getElementById("inputSurname").value="";
                document.getElementById("inputPhone").value="";
            }
        }; 
    xhttp.open("GET", "/Medici/BackEnd/quickReservations.php?job_title="+job_title+"&last_name="+last_name+"&first_name="+first_name+"&phone="+phone, true);
    xhttp.send();
    document.getElementById("sendReservation").setAttribute("data-dismiss", "modal");
    
    }else{
        alert("Toate campurile sunt obligatorii!");
        document.getElementById("sendReservation").removeAttribute("data-dismiss", "");
    }
}

function myMap() {
    var mapCanvas = document.getElementById("google-map");
    var mapOptions = {
        center: new google.maps.LatLng("47.1256247", "27.5672558"), zoom: 15
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
}