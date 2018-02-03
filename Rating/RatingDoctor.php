<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";

    $sql="SELECT DISTINCT d.`id_doctor`, d.`first_name`, d.`last_name`, d.`job_title` from `doctors` d join `reservations` r on d.`id_doctor`=r.`id_doctor` join `users` u on r.`id_user`=u.`id_user` join `analysis` a on r.`id_reservation`=a.`id_reservation` WHERE a.`status` = 'Confirmat' and u.`user_name`='".$login_session."'";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) 
    {
        echo "nu e nimic aici";
    } else {
?>
<html>
<head>
    <title>Rating</title>
    <title>Profilul meu</title>
    <link href="/css/rating.css" rel="stylesheet">
</head>
<body>
    <div class="call-to-action">
        <div class="container size">
            <div id="setRating"></div>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-center ratingMark">Chestionar</h1>
                    </div>
                    <div class="panel-body survey">
                        <div class="alert alert-success" role="alert" style="display: none" id="succesResponse"></div>
                        <div class="alert alert-danger" role="alert" style="display: none" id="errorResponse"></div>
                        <div class="row bottom">
                            <div class="col-sm-12 form-group">
                            <h3>Nume doctor:</h3>
                            <select class="form-control input-lg" id="doctorsList">
                                <option value="ALL">Selectati un doctor</option>
                            </select>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">1. Cât de mulţumit sunteți de modalităţile de programare la Regna?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue1">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue1" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">2. Cât de mulţumit sunteți de informaţiile şi detaliile primite de la medic?</h3>
                            <h3 class="col-sm-1 text-center markBox">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue2">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue2" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                         <div class="row bottom">
                            <h3 class="col-sm-10">3. Cât de mulţumit sunteți de modul în care a decurs consultația?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue3">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue3" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>   
                        <div class="row bottom">
                            <h3 class="col-sm-10">4. Cât de mulţumit sunteți de indicațiile primite?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue4">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue4" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">5. Cât consideraţi că personalul auxiliar v-a ascultat şi v-a oferit informaţii?</h3>
                            <h3 class="col-sm-1 text-center markBox">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue5">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue5" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center checkButtons">
                                <button type="button" class="btn btn-success btn-lg" onclick="submitRatingDoctor('<?php echo $login_session?>')"><h3>Trimite rezultate chestionar</h3></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>

<script>    
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
                document.getElementById("getValue1").innerHTML="5";
                document.getElementById("setValue1").value="5";
                document.getElementById("getValue2").innerHTML="5";
                document.getElementById("setValue2").value="5";
                document.getElementById("getValue3").innerHTML="5";
                document.getElementById("setValue3").value="5";
                document.getElementById("getValue4").innerHTML="5";
                document.getElementById("setValue4").value="5";
                document.getElementById("getValue5").innerHTML="5";
                document.getElementById("setValue5").value="5";
                
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
</script>

<style>
#succesResponse{
    font-size: 20px;
    text-align: center;
}

#errorResponse{
    font-size: 20px;
    text-align: center;
}
    
.survey{
    padding: 35px;
}
.ratingMark{
    color: #2dc997;
    font-weight: 900;
    padding-bottom: 25px;
}

.slidecontainer {
    width: 100% !important; 
}

.slider {
    -webkit-appearance: none;
    width: 100%;
    height: 15px;
    border-radius: 5px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #2dc997;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #2dc997;
    cursor: pointer;
}

.bottom {
    margin-bottom: 50px;
}
</style>
<script>
<?php
        while($row = $result->fetch_assoc()) {
            ?>addDoctor('<?php echo $row['id_doctor']?>','<?php echo $row['first_name']?>','<?php echo $row['last_name']?>','<?php echo $row['job_title']?>');<?php
        }
    }
?>
</script>