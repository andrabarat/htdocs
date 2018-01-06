<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";

    $id_session=0;
    $sql = "SELECT id_user FROM users WHERE user_name='".$login_session."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id_session=$row["id_user"];
        }
    }
?>

<html>
<body>
    
<div class="container">
    <h1 class="project-name">Spitale si Policlinici</h1>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>Suntem mereu aproape de pacientii nostri, prin intermediul celor 36 de policlinici, 4 spitale, 8 Campusuri si 180 de clinici partenere in toată tara.</h4>
        </div>
    </div>
    
    
    <div class="row margin">
        <div class="col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-hospital-o"></i></div></div>
                <h4 class="title"><div>4 SPITALE</div></h4>
                <p class="description">Spitalele sunt atat pentru adulti cat si pentru copii.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-wow-delay="0.4s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-h-square"></i></div></div>
                <h4 class="title"><div>3 CENTRE</div></h4>
                <p class="description">Aceste centre ofera spitalizare de zi.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user-md"></i></div></div>
                <h4 class="title"><div>100 MEDICI</div></h4>
                <p class="description">Echipa noastra este formata din peste 100 cadre medicale.</p>
            </div>
        </div>
    </div>
    
    
    <div class="row boxx wow fadeIn">
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        SPITALUL EUROCLINIC</h4>
                </div>
                <div class="panel-body">
                    <p>
                        La Spitalul Euroclinic ne-am specializat in chirurgia oncologica primara. Oferim condiții de tratament, intervenții chirurgicale și de cazare la standarde internaționale, echipe de profesioniști multi-disciplinare și de renume, devenind astfel o alternativă locală a clinicilor din străinătate.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Nicolae Caramfil 85A, București</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 9886</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>birouinternari@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        SPITALUL ACADEMIC</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Singurul spital de chirurgie avansata din Romania cu cinci acreditari internationale.Oferim condiții de tratament, intervenții chirurgicale și de cazare la standarde internaționale, echipe de profesioniști și de renume devenind astfel o alternativă locală a clinicilor din străinătate.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Calea Floreasca nr. 14a, sector 1</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 9208</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>office.ponderas@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        SPITALUL BANEASA</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Spitalul Baneasa este primul si singurul spital din Romania acreditat international (JCI) pentru siguranta ingrijirii pacientului. Totul este controlat, fiecare moment inseamna grija si precizie.Oferim condiții de tratament, intervenții chirurgicale și de cazare la standarde internaționale</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Dobrogeanu Gherea, nr 85, sector 1</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 9268</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>office@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        POLICLINICA MED IASI</h4>
                </div>
                <div class="panel-body">
                    <p>
                        La Policlinica Med Iasi avem grija ca pacientii sa aiba parte de cea mai buna ingrijire. Echipa mare de medici, atat romani cat si straini, sunt specilizati pe mai multe ramuri, aflandu-se mereu acolo unde este nevoie. Aparaturile noastre sunt cele ce va pot oferi mai multa incredere.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Nicolae Iorga 85A, Iasi</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 3486</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>policlinica@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        CAMPUS MED BACAU</h4>
                </div>
                <div class="panel-body">
                    <p>
                        In Campusul Medical Bacau, pacientii au acces la peste 15 specialitati medicale si 30 de medici cu experienta in diagnosticarea, tratarea si urmarirea pacientilor cu afectiuni acute sau cronice. Totul este controlat, fiecare moment inseamna grija si precizie pentru pacinetii nostri.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Calea Romanului 32A, Bacau</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 9656</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>campusbacau@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        CAMPUSUL DE PEDIATRIE BRAȘOV</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Este parte integranta a singurului Campus Medical privat din Brasov si ofera toate solutiile medicale pentru mama si copil, atat in ambulatoriu, cat si in cadrul spitalului.Fiecare moment inseamna grija si precizie pentru pacinetii nostri.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Iuliu Maniu 22, Brașov</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 2286</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>campusbrasov@regna.ro</li>
                </ul>
            </div>  
        </div>
        
    </div>
</div>   
</body>
</html>

<style>
    .boxx
    { 
        padding-top: 20;
    }
    .project-name {
        text-align: center;
        padding-top: 120;
    }
    .icons{
        font-size:36px;
        width: 50;
        color: #2dc997
    }
    .address{
        color: #2dc996;
        float: left;
        font-weight: bold; 
    }
.box {
  padding: 50px 20px;
  margin-bottom: 50px;
  text-align: center;
  border: 1px solid #e6e6e6;
  height: 200px;
  position: relative;
  background: #fafafa;
}

 .icon {
  position: absolute;
  top: -36px;
  left: calc(50% - 36px);
  transition: 0.2s;
  border-radius: 50%;
  display: inline-block;
  border: 6px solid #fff;
}

.icon a {
  display: inline-block;
  background: #2dc997;
  border: 2px solid #2dc997;
  padding: 16px;
  border-radius: 50%;
  transition: 0.3s;
}

.icon i {
  color: #fff;
  font-size: 24px;
}

.box:hover .icon i {
  color: #2dc997;
}

.box:hover .icon a {
  color: #2dc997;
  background: #fff;
}

.title {
  font-weight: 700;
  font-size: 18px;
  margin-bottom: 15px;
  text-transform: uppercase;
}

.title a {
  color: #111;
}

.description {
  font-size: 14px;
  line-height: 24px;
}

    .margin{
        padding-top: 50;
    }
    
    

.box:hover .icon div {
    color: #2dc997;
    background: #fff;
}

.icon div {
    display: inline-block;
    background: #2dc997;
    border: 2px solid #2dc997;
    padding: 16px;
    border-radius: 50%;
    transition: 0.3s;
}
</style>