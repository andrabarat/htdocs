
String.prototype.replaceAll = function(str1, str2, ignore) 
{
    return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
}

function filterFunction(type) {
    var media = document.querySelectorAll(".doctor");
    if(type.indexOf("ALL")>-1){
        for(var i=0;i<media.length; i++){
            media[i].style.display = "inline";
        }
    } else {
        for(var i=0;i<media.length; i++){
            media[i].style.display = "inline";
        }
        for(var i=0;i<media.length; i++){
            if(media[i].className.indexOf(type)<0){
                media[i].style.display = "none";
                //$("."+media[i].className.replaceAll(" ",".")).fadeOut(100);
            }
        }
    }
}

function create(father, id, grade, firstname, lastname, description, jobTitle){
    
    var root=document.getElementById(father);
    
    var media=document.createElement("div");
    media.className="media doctor "+jobTitle.replaceAll(" ","-")+" "+firstname+" "+lastname;
    media.id=id;
    
    var imageContent=document.createElement("div");
    imageContent.className="media-left media-middle";
    
    var image=document.createElement("img");
    image.src="/utils/uploades/doctors/doctor0.png";
    image.className="media-object";
    image.style="width:80px";
    
    imageContent.appendChild(image);
    
    var mediaBody=document.createElement("div");
    mediaBody.className="media-body";
    
    var gradeName=document.createElement("h4"); 
    gradeName.className="media-heading";
    gradeName.innerHTML=grade+" "+firstname+" "+lastname;
    gradeName.style.color="#2dc997";
    mediaBody.appendChild(gradeName);
    
    var row=document.createElement("div");
    row.className="row";
    
    var doctorDescr=document.createElement("div");
    doctorDescr.className="col-sm-7";
    
    var textDescr=document.createElement("h5");
    textDescr.innerHTML=description;
    doctorDescr.appendChild(textDescr);
    
    var titleJob=document.createElement("h5");
    titleJob.className="col-sm-3";
    titleJob.innerHTML=jobTitle;
    
    var buttonContent=document.createElement("div");
    buttonContent.className="col-sm-2";
    
    var button=document.createElement("button");
    button.setAttribute("type", "button");
    button.className="btn btn-success col-sm-12 fa fa-calendar";
    button.setAttribute("onclick","openModal('"+grade+"','"+firstname+"','"+lastname+"')");
    button.setAttribute("data-target","#myModal");
    button.setAttribute("data-toggle","modal");
    
    buttonContent.appendChild(button);
    
    row.appendChild(doctorDescr);
    row.appendChild(titleJob);
    row.appendChild(buttonContent);
    
    mediaBody.appendChild(row);
    
    var line=document.createElement("hr");
    
    media.appendChild(imageContent);
    media.appendChild(mediaBody);
    media.appendChild(line);
    
    root.appendChild(media);
}

function openModal(grade, firstname, lastname){
    document.getElementById("modalHeader").innerHTML=grade+" "+firstname+" "+lastname;
}