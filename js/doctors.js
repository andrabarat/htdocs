
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
    titleJob.style.color="#2dc996";
    
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
    document.getElementById("id_doctor").value=id;
    document.getElementById("modalHeader").innerHTML=grade+" "+firstname+" "+lastname;
    createCalendar(0);
}


function getCurrentMonthText(position) {
    var month = new Array();
    month[0] = "January";
    month[1] = "February";
    month[2] = "March";
    month[3] = "April";
    month[4] = "May";
    month[5] = "June";
    month[6] = "July";
    month[7] = "August";
    month[8] = "September";
    month[9] = "October";
    month[10] = "November";
    month[11] = "December";

    var date = new Date();
    var monthText = month[(date.getMonth()+position)%12];
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
        if(text==getCurrentDay() && monthPosition==getCurrentMonth() && yearPosition==getCurrentYear()){
            day.className="currentDay";
        }
        day.setAttribute("onclick","setDateAppoiment('"+text+"', '"+monthPosition+"', '"+yearPosition+"')");
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
    document.getElementById("dateAppoiment").value=day+"-"+month+"-"+year;
    document.getElementById("modalHeader").innerHTML=day+"-"+month+"-"+year;
    
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
        hours.innerHTML=hourFormat(i)+" - "+hourFormat((i+1));
        var line=document.createElement("td");
        line.className="col-sm-10";
        row.appendChild(hours);
        row.appendChild(line);
        tbody.appendChild(row);
    }
    table.appendChild(tbody);
    father.appendChild(table);

}

function hourFormat(text){
    text=text+"";
    if(text.length==1){
        return "0"+text;
    }
    return text;
}