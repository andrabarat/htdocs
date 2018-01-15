function submitContactForm(){
    
    var name=document.getElementById("name").value;
    var email=document.getElementById("email").value;
    var subject=document.getElementById("subject").value;
    var message=document.getElementById("message").value;
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sendmessage").style.display="block";
            document.getElementById("sendmessage").innerHTML=this.response;
            document.getElementById("name").value="ALL";
            document.getElementById("email").value="";
            document.getElementById("subject").value="";
            document.getElementById("message").value="";
        }
    }; 
    xhttp.open("GET", "/PHPMailer/BackEnd/contact.php?name="+name+"&email="+email+"&subject="+subject+"&message="+message, true);
    xhttp.send();

}