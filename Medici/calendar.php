<html lang="en">

<head>
<title>Calendar</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Bootstrap Example</title>
    <link rel="stylesheet" href="/css/doctors.css">

</head>

<body>
    <div class="container" style="margin-top: 10%">
        <h2>Modal Example</h2>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="createCalendar(0)">Open Modal</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center" id="modalHeader"></h4>
                    </div>
                    <div class="modal-body" id="modalBody">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>

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
    var getCurrentYear=document.createElement("span");
    getCurrentYear.style.fontSize="18px";
    getCurrentYear.innerHTML=getCurrentYearText(currentYearGlobal);
    currentMonth.appendChild(getCurrentYear);
    
    monthList.appendChild(prev);
    monthList.appendChild(next);
    monthList.appendChild(currentMonth);
    
    month.appendChild(monthList);
    
    var daysName=document.createElement("ul");
    daysName.className="weekdays";
    var luni=document.createElement("li");
    luni.innerHTML="Luni";
    var marti=document.createElement("li");
    marti.innerHTML="Marti"; 
    var miercuri=document.createElement("li");
    miercuri.innerHTML="Miercuri"; 
    var joi=document.createElement("li");
    joi.innerHTML="Joi"; 
    var vineri=document.createElement("li");
    vineri.innerHTML="vineri"; 
    var sambata=document.createElement("li");
    sambata.innerHTML="Sambata"; 
    var duminica=document.createElement("li");
    duminica.innerHTML="Duminica"; 
    
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
        daysNumber.appendChild(day);
    }
    
    
    father.appendChild(month);
    father.appendChild(daysName);
    father.appendChild(daysNumber);
    console.info(currentYearGlobal);

}
</script>