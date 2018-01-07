function createMyAppoiment(father, date, grade, last_name, first_name, job_title, id_reservation){

    var root=document.getElementById(father);

    var colsm1= document.createElement("div");
    colsm1.className="col-sm-6";


    var colsm2= document.createElement("div");
    colsm2.className="col-sm-12";

    var row3 = document.createElement("div");
    row3.className="row";

    var colsm3 = document.createElement("div"); 
    colsm3.className="col-sm-12 well text-center";

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
    button.className="btn btn-warning btn-lg";
    button.innerHTML="Elimina programare";
    button.setAttribute("onclick", "deleteAppoiment("+id_reservation+")");
    button.setAttribute("data-toggle", "modal");
    button.setAttribute("data-target", "#checkModal");
    
    h4.appendChild(button);

    colsm3.appendChild(h4);

    row3.appendChild(colsm3);
    colsm2.appendChild(row3);

    colsm1.appendChild(colsm2);
    root.appendChild(colsm1);
}

function deleteAppoiment(id_reservation){
    document.getElementsByTagName("body")[0].style.padding="0";
    var test=document.querySelectorAll(".modal");
    if(test.length<2){ 
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
        modalHeaderTitle.innerHTML="Esti sigur ca vrei sa elimini aceasta programare?";

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
        modalFooterButton.innerHTML="Trimite programare";
        
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
    } else {
        $("#checkModal").modal('show');
        document.getElementsByTagName("body")[0].style.padding="0";
    }
}
function submitCancelAppoiment(id_reservation){
    //ză eigeax coll
    
    
}