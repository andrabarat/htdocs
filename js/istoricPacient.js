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
                } else {
                    console.info(this.responseText);
                    document.getElementById("cnp").value="";
                    document.getElementById("phone").value="";
                }
            }
        }; 
        xhttp.open("GET", "/Pacient/BackEnd/istoricPacientBackEnd.php?cnp="+cnp+"&phone="+phone, true);
        console.info("/Pacient/BackEnd/istoricPacientBackEnd.php?cnp="+cnp+"&phone="+phone);
        xhttp.send();
    }
}