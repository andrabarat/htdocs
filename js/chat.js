var specifiedElement = document.getElementById('live-chat');
document.addEventListener('click', function(event) {
    var isClickInside = specifiedElement.contains(event.target);
    if (!isClickInside) {
        if(document.getElementById("chat-body").style.display!="none"){
            $('.chat').slideToggle(300, 'swing');
        }
    }
});

function decimalFormat(text){
    text=text+"";
    if(text.length==1){
        return "0"+text;
    }
    return text;
}

function postQuestion(e, message, username){
    document.getElementById("typingeffect").innerHTML="Tu tastezi ...";
    if (e.keyCode == 13)
    {
        document.getElementById("typingeffect").innerHTML="Regna help raspunde ...";
        writeQuestion(message, username);
        document.getElementById("messageChat").value="";
        setTimeout( function(){
            getResponse(message);     
            document.getElementById("typingeffect").innerHTML="Asteptam o intrebare ...";
        }, 1500);
    }
}

function sayHello(){
    document.getElementById("live-chat").removeAttribute("onclick");
    document.getElementById("status").className="statusActive";
    setTimeout( function(){getResponse("Buna ziua!");}, 500);
}

function writeQuestion(message, username){
    var father=document.getElementById("chat");
    
    var chatMessage=document.createElement("div");
    chatMessage.className="chat-message clearfix";
    var id=document.querySelectorAll(".chat-message-content-left, .chat-message-content-right").length;
    chatMessage.id="message"+id;
    
    var chatMessageContent=document.createElement("div");
    chatMessageContent.className="chat-message-content-right clearfix";
    var chatMessageContentTime=document.createElement("span");
    chatMessageContentTime.className="chat-time";
    chatMessageContentTime.innerHTML=getCurrentTime();
    var chatMessageContentUser=document.createElement("span");
    chatMessageContentUser.innerHTML=username;
    var chatMessageContentMessage=document.createElement("h6");
    chatMessageContentMessage.innerHTML=message;
        
    chatMessageContent.appendChild(chatMessageContentTime);
    chatMessageContent.appendChild(chatMessageContentUser);
    chatMessageContent.appendChild(chatMessageContentMessage);
    chatMessage.appendChild(chatMessageContent);
    father.appendChild(chatMessage);
    $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);
}

    
function getResponse(message){
    var father=document.getElementById("chat");
    
    var chatMessage=document.createElement("div");
    chatMessage.className="chat-message clearfix";
    var id=document.querySelectorAll(".chat-message-content-left, .chat-message-content-right").length;
    chatMessage.id="message"+id;
    
    var chatMessageContent=document.createElement("div");
    chatMessageContent.className="chat-message-content-left clearfix";
    var chatMessageContentTime=document.createElement("span");
    chatMessageContentTime.className="chat-time";
    chatMessageContentTime.innerHTML=getCurrentTime();
    var chatMessageContentUser=document.createElement("span");
    chatMessageContentUser.innerHTML="Regna help";
    var chatMessageContentMessage=document.createElement("h6");
    chatMessageContentMessage.innerHTML=getSpecificResponse(message, id);
    
    chatMessageContent.appendChild(chatMessageContentTime);
    chatMessageContent.appendChild(chatMessageContentUser);
    chatMessageContent.appendChild(chatMessageContentMessage);
    chatMessage.appendChild(chatMessageContent);
    father.appendChild(chatMessage);
    $('.chat-history').scrollTop($('.chat-history')[0].scrollHeight);
}

var jobtitle=["cardiologie" , "pneumologie", "obstetrica", "ginecologie",  "ortopedie", "traumatologie", "urologie", "gastroenterologie", "dermatologie", "neonatologie", "pediatrie", "chirurgie"];

function getSpecificResponse(message, id){
    if(id==0){
        return "Buna ziua!";
    }
    if(id==2){
        return "Cu ce va putem fi de folos?"
    } else {
        var messageList=message.split(" ");
        for(var i=0;i<messageList.length;i++){
            for(var j=0;j<=jobTitle.length;j++){
                if(messageList[i].toLowerCase().indexOf(jobtitle[j])>-1){
                    return "Puteti merge la unul din doctorii nostri de la specialitate <a href='/Medici/Doctori.php?specialitate="+capitalizeString(messageList[i])+"'>"+messageList[i]+"</a>.";
                }
            }
        }
        return "Ne pare rau dar nu exista un astfel de departament.";
    }
}

function capitalizeString(str){
    init_cap=str[0].toUpperCase() + str.substring(1,str.length).toLowerCase();
    return init_cap;
}

function getCurrentTime(){
    var currentdate = new Date();
    return decimalFormat(currentdate.getHours()) + ":" + decimalFormat(currentdate.getMinutes()) + ":" + decimalFormat(currentdate.getSeconds());
}
    
setTimeout( function(){
    if(document.getElementById("status").className=="statusInactive"){
        sayFirstHello();
    }
}, 5000);
    
function sayFirstHello(){
    document.getElementById("status").className="statusActive";
    $('.chat').slideToggle(300, 'swing');
    document.getElementById("live-chat").removeAttribute("onclick");
    setTimeout( function(){getResponse("Buna ziua!");}, 500);
}
(function() {
    $('#live-chat header').on('click', function() {
        $('.chat').slideToggle(300, 'swing');
        //$('.chat-message-counter').fadeToggle(300, 'swing');
        //console.info("click");
    });
    $('.chat-close').on('click', function(e) {
        e.preventDefault();
        $('#live-chat').fadeOut(300);
    });
})();
    
function hideChat(){
    $('.chat').slideToggle(300, 'swing');
}