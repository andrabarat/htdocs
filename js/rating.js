   
function setMarkValue(elem){
    document.getElementById("getValue"+elem.id.substring(8,9)).innerHTML=elem.value;
}

function addDoctor(id_doctor, first_name, last_name, job_title){
    var father=document.getElementById("doctorsList");
    var child=document.createElement("option");
    child.value=id_doctor;
    child.innerHTML=first_name+" "+last_name+" - "+job_title;
    father.appendChild(child);
}
    

function submitRatingDoctor(user){
    var id_doctor=document.getElementById("doctorsList").value;
    var question1=document.getElementById("getValue1").innerHTML;
    var question2=document.getElementById("getValue2").innerHTML;
    var question3=document.getElementById("getValue3").innerHTML;
    var question4=document.getElementById("getValue4").innerHTML;
    var question5=document.getElementById("getValue5").innerHTML;

    var rating=(parseInt(question1)+parseInt(question2)+parseInt(question3)+parseInt(question4)+parseInt(question5))/5;
    
    if(id_doctor!="ALL"){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("doctorsList").value="ALL";
                document.getElementById("getValue1").innerHTML="3";
                document.getElementById("setValue1").value="3";
                document.getElementById("getValue2").innerHTML="3";
                document.getElementById("setValue2").value="3";
                document.getElementById("getValue3").innerHTML="3";
                document.getElementById("setValue3").value="3";
                document.getElementById("getValue4").innerHTML="3";
                document.getElementById("setValue4").value="3";
                document.getElementById("getValue5").innerHTML="3";
                document.getElementById("setValue5").value="3";
                
                if(this.responseText.substring(0,1)=="1"){
                    document.getElementById("succesResponse").style.display="block";
                    document.getElementById("succesResponse").innerHTML=this.responseText.substring(1, this.responseText.length);
                } else {
                    document.getElementById("errorResponse").style.display="block";
                    document.getElementById("errorResponse").innerHTML=this.responseText.substring(1, this.responseText.length);
                }
            }
        }; 
        xhttp.open("GET", "/Rating/BackEnd/ratingDoctorBackEnd.php?id_doctor="+id_doctor+"&user_name="+user+"&rating="+rating, true);
        console.info("/Rating/BackEnd/ratingDoctorBackEnd.php?id_doctor="+id_doctor+"&user_name="+user+"&rating="+rating);
        xhttp.send();    
    } else {
        alert("Toate campurile sunt obligatorii!");
    }
}