$(document).ready(function(){
    $('.cnp').mask('0000000000000');
    $('.phone').mask('0000-000-000');
});

function getPacient(){
    document.getElementById("error").innerHTML="";
    document.getElementById("error").style.display="none";
    
    var cnp=document.getElementById("cnp").value;
    var phone=document.getElementById("phone").value;
    
    if(cnp=="" && phone==""){
        document.getElementById("error").innerHTML="<h4 class='text-center'>Va rugam completati macar unul dintre campuri.</h4>";
        document.getElementById("error").style.display="block";
        return false;
    } else {        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText.substring(0, 6)=="Error "){
                    document.getElementById("error").innerHTML="<h4 class='text-center'>"+this.responseText.substring(6, this.responseText.length)+"</h4>";
                    document.getElementById("error").style.display="block";
                    document.getElementById("cnp").value="";
                    document.getElementById("phone").value="";
                    document.getElementById("pacientsList").innerHTML="";
                    document.getElementById("prescriptionsList").innerHTML="";
                    
                } else {
                    document.getElementById("cnp").value="";
                    document.getElementById("phone").value="";
                    document.getElementById("pacientsList").innerHTML="";
                    document.getElementById("prescriptionsList").innerHTML="";
                    responseJSON = JSON.parse(this.responseText);                
                    createPacient(responseJSON.name, responseJSON.phone, responseJSON.email);
                    prescritionList=responseJSON.reservations;
                    for(var i=0; i<prescritionList.length; i++){
                        createPrescription(prescritionList[i][0], prescritionList[i][1], i);
                    }
                    
                }
            }
        }; 
        xhttp.open("GET", "/Pacient/BackEnd/istoricPacientBackEnd.php?cnp="+cnp+"&phone="+phone, true);
        console.info("/Pacient/BackEnd/istoricPacientBackEnd.php?cnp="+cnp+"&phone="+phone);
        xhttp.send();
    }
}

function createPacient(nameParam, phoneParam, emailParam){
    var father=document.getElementById("pacientsList");
    
    var row=document.createElement("div");
    row.className="row";
    
    var name=document.createElement("h3");
    name.className="col-sm-3 text-center";
    name.innerHTML='<strong style="color: rgb(45, 201, 151);">Nume: </strong>'+nameParam;
    
    var phone=document.createElement("h3");
    phone.className="col-sm-3 text-center";
    phone.innerHTML='<strong style="color: rgb(45, 201, 151);">Telefon: </strong>'+phoneParam;
    
    var email=document.createElement("h3");
    email.className="col-sm-6 text-center";
    email.innerHTML='<strong style="color: rgb(45, 201, 151);">E-mail: </strong>'+emailParam;
    
    var hr=document.createElement("hr");
    
    row.appendChild(name);
    row.appendChild(phone);
    row.appendChild(email);
    
    father.appendChild(row);
    father.appendChild(hr);
}

function createPrescription(title, prescription, i){

    var father=document.getElementById("prescriptionsList");
    
    var row=document.createElement("div");
    row.className="col-sm-12 prescription";
    
    var h3Title=document.createElement("h3");
    h3Title.className="col-sm-9";

    h3Title.innerHTML=title;
    var button=document.createElement("button");
    button.className="btn btn-success col-sm-3 btn-lg";
    button.innerHTML="Vezi prescriptie";
    button.setAttribute("onclick", "getPrescription('"+title+"', '"+prescription+"')");
    button.setAttribute("data-toggle", "modal");
    button.setAttribute("data-target", "#prescriptionModal");
    
    row.appendChild(h3Title);
    row.appendChild(button);
    
    father.appendChild(row);
    
}

function getPrescription(title, prescription){
    document.getElementById("modalHeader").innerHTML=title;
    document.getElementById("modalBody").innerHTML="<h4 class='text-center'>"+prescription+"</h4>";
}