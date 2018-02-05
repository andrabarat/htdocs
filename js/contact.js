function submitContactForm(){
    
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var subject=document.getElementById("subject").value;
    var message=document.getElementById("message").value;
    
    document.getElementById("errormessage").innerHTML="";
    document.getElementById("errormessage").style.display="none";
    
    if(name=="" || email=="" || subject=="" || message=="")
    {
        document.getElementById("errormessage").innerHTML="<h6 class='text-center'>Vă rugăm completați toate câmpurile.</h6>";
        document.getElementById("errormessage").style.display="block";
        return false;
    }else{
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.response=="Vă rugăm completați câmpul captcha."){
                    document.getElementById("errormessage").innerHTML="<h6 class='text-center'>"+this.responseText+"</h6>";
                    document.getElementById("errormessage").style.display="block";
                    console.info("sunt aici");
                }else{
                    document.getElementById("sendmessage").style.display="block";
                    document.getElementById("sendmessage").innerHTML=this.response;
                    document.getElementById("name").value="";
                    document.getElementById("email").value="";
                    document.getElementById("subject").value="";
                    document.getElementById("message").value="";
                } 
            }
        }; 
        xhttp.open("GET", "/PHPMailer/BackEnd/contact.php?name="+name+"&email="+email+"&subject="+subject+"&message="+message+"&captcha="+grecaptcha.getResponse(), true);
        console.info("/PHPMailer/BackEnd/contact.php?name="+name+"&email="+email+"&subject="+subject+"&message="+message+"&captcha="+grecaptcha.getResponse());
        xhttp.send();
    }
}