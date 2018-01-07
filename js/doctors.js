
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
    gradeName.innerHTML="<strong>"+grade+" "+firstname+" "+lastname+"</strong>";
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
    titleJob.innerHTML="<strong>"+jobTitle+"</strong>";
    titleJob.style.color="#ff531a";
    
    var buttonContent=document.createElement("div");
    buttonContent.className="col-sm-2";
    
    var button=document.createElement("button");
    button.setAttribute("type", "button");
    button.className="btn btn-success col-sm-12 fa fa-calendar";
    button.setAttribute("onclick","openModal('"+id+"', '"+grade+"','"+firstname+"','"+lastname+"')");
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

function openModal(id, grade, firstname, lastname){
    
    currentYearGlobal=getCurrentYear();
    currentMonthGlobal=getCurrentMonth();
    
    document.getElementById("id_doctor").value=id;
    document.getElementById("modalHeader").innerHTML=grade+" "+firstname+" "+lastname;
    createCalendar(0);
    
    var father=document.getElementById("modalFooter");
    father.innerHTML="";
    var button=document.createElement("button");
    button.setAttribute("type","button");
    button.className="btn btn-default btn-lg";
    button.setAttribute("data-dismiss","modal");
    button.innerHTML="Inchide";
    
    father.appendChild(button);
}


function getCurrentMonthText(position) {
    var month = new Array();
    month[0] = "Ianuarie";
    month[1] = "Februarie";
    month[2] = "Martie";
    month[3] = "Aprilie";
    month[4] = "Mai";
    month[5] = "Iunie";
    month[6] = "Iulie";
    month[7] = "August";
    month[8] = "Septembrie";
    month[9] = "Octombrie";
    month[10] = "Noiembrie";
    month[11] = "Decembrie";

    var date = new Date();
    var monthText = month[(date.getMonth()+position-1)%12];
    return monthText;
}
    
function getCurrentYearText(position) {
    var date = new Date('01-01-'+position);
    var yearText = date.getFullYear();
    return yearText;
}

function getFirstDayOfMonth(yearPosition, monthPosition){
	var date = new Date();
    var firstDay = new Date(yearPosition, monthPosition-1, 1).getDay();
    if(firstDay==0){
        firstDay=7;
    }
    return firstDay;
}

function getLengthOfCurrentMonth(yearPosition, monthPosition){
    var date = new Date();
    var lastDay = new Date(yearPosition, monthPosition, 0).getDate();
    return lastDay;
}

function getCurrentMonth() {
    var date = new Date();
    var monthText = date.getMonth()+1;
    return monthText;
}

function getCurrentYear() {
    var date = new Date();
    var yearText = date.getFullYear();
    return yearText;
}
    
var currentYearGlobal=getCurrentYear();
var currentMonthGlobal=getCurrentMonth();

function createCalendar(position){
    
    if(position==0){
        var yearPosition=currentYearGlobal;
        var monthPosition=currentMonthGlobal;
    }
    if(position==1){
        currentMonthGlobal=currentMonthGlobal+1;
        var monthPosition=currentMonthGlobal;
        var yearPosition=currentYearGlobal;
        if(currentMonthGlobal==13){
            currentYearGlobal=currentYearGlobal+1;
            currentMonthGlobal=currentMonthGlobal%12;
            monthPosition=currentMonthGlobal;
        }
        if(monthPosition==1){
            yearPosition=yearPosition+1;
        }
    }
    if(position==-1){
        currentMonthGlobal=currentMonthGlobal-1;
        var monthPosition=currentMonthGlobal;
        var yearPosition=currentYearGlobal;
        if(currentMonthGlobal==0){
            currentYearGlobal=currentYearGlobal-1;
            currentMonthGlobal=currentMonthGlobal+12;
            monthPosition=currentMonthGlobal;
        }
        if(monthPosition==12){
            yearPosition=yearPosition-1;
        }
    }
    
    var father=document.getElementById("modalBody");
    father.innerHTML="";
    
    var month=document.createElement("div");
    month.className="month";
    
    var monthList=document.createElement("ul");
    
    var prev=document.createElement("li");
    prev.className="prev";
    prev.innerHTML="&#10094";
    prev.setAttribute("onclick", "createCalendar(-1)");
    var next=document.createElement("li");
    next.className="next";
    next.innerHTML="&#10095";
    next.setAttribute("onclick", "createCalendar(1)");
    var currentMonth=document.createElement("li");
    currentMonth.innerHTML=getCurrentMonthText(monthPosition)+'<br>';
    //currentMonth.id="month";
    var currentYear=document.createElement("span");
    currentYear.style.fontSize="18px";
    currentYear.id="year";
    currentYear.innerHTML=getCurrentYearText(currentYearGlobal);
    currentMonth.appendChild(currentYear);
    
    monthList.appendChild(prev);
    monthList.appendChild(next);
    monthList.appendChild(currentMonth);
    
    month.appendChild(monthList);
    
    var daysName=document.createElement("ul");
    daysName.className="weekdays";
    var luni=document.createElement("li");
    luni.innerHTML="L";
    var marti=document.createElement("li");
    marti.innerHTML="M"; 
    var miercuri=document.createElement("li");
    miercuri.innerHTML="Mi"; 
    var joi=document.createElement("li");
    joi.innerHTML="J"; 
    var vineri=document.createElement("li");
    vineri.innerHTML="v"; 
    var sambata=document.createElement("li");
    sambata.innerHTML="S"; 
    var duminica=document.createElement("li");
    duminica.innerHTML="D"; 
    
    daysName.appendChild(luni);
    daysName.appendChild(marti);
    daysName.appendChild(miercuri);
    daysName.appendChild(joi);
    daysName.appendChild(vineri);
    daysName.appendChild(sambata);
    daysName.appendChild(duminica);
    
    var daysNumber=document.createElement("ul");
    daysNumber.className="days";
    
    var calendarLength=getFirstDayOfMonth(yearPosition, monthPosition)+getLengthOfCurrentMonth(yearPosition, monthPosition);
    
    for(var i=0;i<calendarLength-1;i++){
        var day=document.createElement("li");
        if(i+2-getFirstDayOfMonth(yearPosition, monthPosition)<1){
            text="";
        } else {
            text=i+2-getFirstDayOfMonth(yearPosition, monthPosition);
        }
        day.innerHTML=text;
        day.setAttribute("onclick","setDateAppoiment('"+text+"', '"+monthPosition+"', '"+yearPosition+"')");
        if(text==getCurrentDay() && monthPosition==getCurrentMonth() && yearPosition==getCurrentYear()){
            day.className="currentDay";
        }
        if(monthPosition<getCurrentMonth() && yearPosition<=getCurrentYear()){
            day.className="inactiveDays";
            day.setAttribute("onclick", "alert('Ne pare rau, dar nu puteti face o planificare in trecut.')");
        }
        if(monthPosition>getCurrentMonth() && yearPosition<getCurrentYear()){
            day.className="inactiveDays";
            day.setAttribute("onclick", "alert('Ne pare rau, dar nu puteti face o planificare in trecut.')");
        }
        if(text<getCurrentDay() && monthPosition==getCurrentMonth() && yearPosition==getCurrentYear()){
            day.className="inactiveDays";
            day.setAttribute("onclick", "alert('Ne pare rau, dar nu puteti face o planificare in trecut.')");
        }
        daysNumber.appendChild(day);
    }
    
    
    father.appendChild(month);
    father.appendChild(daysName);
    father.appendChild(daysNumber);
}

function getCurrentDay(){
    var date = new Date();
    return date.getDate();
}


function setDateAppoiment(day, month, year){
    document.getElementById("dateAppoiment").value=year+"-"+month+"-"+day;
    document.getElementById("modalHeader").innerHTML=decimalFormat(day)+"-"+decimalFormat(month)+"-"+year;
    
    var father=document.getElementById("modalBody");
    father.innerHTML='';
    var table=document.createElement("table");
    table.className="table table-bordered";
    var tbody=document.createElement("tbody");
    for(var i=8; i<20; i++){
        var row=document.createElement("tr");
        row.className="row";
        var hours=document.createElement("td");
        hours.className="col-sm-2 text-center hours";
        hours.innerHTML=decimalFormat(i)+" - "+decimalFormat((i+1));
        var line=document.createElement("td");
        line.id=decimalFormat(i)+"-"+decimalFormat((i+1));
        line.className="col-sm-10 infoHours";
        line.setAttribute("onclick","reserveIntervalHours(this.id)");
        row.appendChild(hours);
        row.appendChild(line);
        tbody.appendChild(row);
    }
    table.appendChild(tbody);
    father.appendChild(table);
    
    var fatherFooter=document.getElementById("modalFooter");
    var button=document.createElement("button");
    button.setAttribute("type","button");
    button.className="btn btn-success btn-lg";
    button.setAttribute("onclick","submitForm()");
    button.innerHTML="Trimite programare";
    
    fatherFooter.appendChild(button); 
    
    getReservedIntervalHours();
}

function decimalFormat(text){
    text=text+"";
    if(text.length==1){
        return "0"+text;
    }
    return text;
}

function reserveIntervalHours(elem){
    var type=document.getElementById(elem).className;
    if(type.indexOf("hoursSelected")>0){
        document.getElementById(elem).className="col-sm-10 infoHours";
        document.getElementById(elem).innerHTML="";
    } else {
        var allClasses=document.querySelectorAll(".hoursSelected");
        if(allClasses.length>0){
            alert('Nu va este permis mai mult de o singura rezervare intr-o zi la acest doctor.');
        } else {
            document.getElementById(elem).className+=" hoursSelected text-center";
            document.getElementById(elem).innerHTML="Pentru a finaliza programarea, apasati pe butonul de trimitere programare.";
            document.getElementById(elem).style.color="white";
        }
    }
}

function getReservedIntervalHours(){
    var id_doctor=document.getElementById("id_doctor").value;
    var dateAppoiment=document.getElementById("dateAppoiment").value;
    //alert(id_doctor+" "+dateAppoiment);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function() {
        if (this.readyState == 4 && this.status == 200) {
            var response=this.responseText;
            setTimeout(function(){ reservedIntervalHours(response); }, 100);
            
        }
    };
    var date=dateAppoiment.split("-");
    var year=date[0];
    var month=decimalFormat(date[1]);
    var day=decimalFormat(date[2]);
    var dateAppoiment=year+"-"+month+"-"+day;
    xhttp.open("GET", "BackEnd/getReservations.php?id_doctor="+id_doctor+"&dateAppoiment="+dateAppoiment, true);
    xhttp.send();   
    
}



function reservedIntervalHours(intervalHours){
    if(intervalHours!=""){
        intervalHours = intervalHours.split(", ");
        for(var i=0; i<intervalHours.length; i++){
            document.getElementById(intervalHours[i]).className+=" reserved text-center";
            document.getElementById(intervalHours[i]).innerHTML+="Ocupat";
            document.getElementById(intervalHours[i]).style.color+="white";
            document.getElementById(intervalHours[i]).setAttribute("onclick","");
        }
    }
}

function submitForm(){
    var allClasses=document.querySelectorAll(".hoursSelected");
    
    if(allClasses.length==1){
        document.getElementById("timeInterval").value=allClasses[0].id;
        
        if(document.getElementById("id_user").value==""){
            alert("Pentru a face o programare trebuie sa te autentifici.")
        } else {        
            document.getElementById("reservation").submit();
        }
    }else{
        alert("Pentru a face o rezervare, te rugam selecteaza un interval orar.");
    }
}
