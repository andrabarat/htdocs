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
    <h1 class="project-name">Laboratoare</h1>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>Priceperea specialistilor nostri se imbina cu precizia celei mai performante aparaturi din Romania. Laboratorul Central REGNA are eticheta Roche Diagnostic pentru linia de biochimie si imunologie si e un reper tehnologic pentru sistemul medical romanesc.</h4>
        </div>
    </div>
    
    
    <div class="row margin">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-hospital-o"></i></div></div>
                <h4 class="title"><div>17</div></h4>
                <p class="description">Ne facem treaba cu grija si atentie in cele 17 laboratoare de analize dotate cu aparaturi performante.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-h-square"></i></div></div>
                <h4 class="title"><div>19</div></h4>
                <p class="description">Avem 19 puncte de recoltare proprii pentru pacientii nostri.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-stethoscope"></i></div></div>
                <h4 class="title"><div>900</div></h4>
                <p class="description">In cadrul policlinicilor si spitalelor putem efectua pana la 900 tipuri de analize.</p>
            </div>
        </div>
         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-search"></i></div></div>
                <h4 class="title"><div>5</div></h4>
                <p class="description">De asemenea avem 5 departamente cu o experienta bogata in medicina de laborator si nu numai.</p>
            </div>
        </div>
         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user-md"></i></div></div>
                <h4 class="title"><div>100</div></h4>
                <p class="description">Suntem echipa medicala mare, formata din aproximativ 100 medici.</p>
            </div>
        </div>
         <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-medkit"></i></div></div>
                <h4 class="title"><div>18.000</div></h4>
                <p class="description">Efectuma zilnic aproximativ 18.000 teste,cu un verdict gata in 24 de ore.</p>
            </div>
        </div>
    </div>
 </div> 
    
    <div class="row call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-9 text-lg-left">
                    <h3 class="cta-title text-center">LABORATORUL ESTE O COMPONENTA ESENTIALA A PROCESULUI DE INGRIJIRE MEDICALA</h3>
                    <p class="cta-text"> Cu fiecare test realizat, prin fiecare rezultat corect trimis catre pacientii pe care ii avem in grija, construim indicatorii de calitate care ne diferentiaza.</p>
                    <p class="cta-text"> Pentru ca detaliile sunt cele care pun amprenta calitatii intr-un laborator, iar medicii au nevoie de buletine de analize concludente pentru a oferi cele mai eficiente tratamente.</p>
                    <p class="cta-text"> LINIA ROCHE DIAGNOSTIC inseamna cea mai noua generatie pentru diagnosticul in vitro, campionul tacut al medicinei, care influenteaza peste 60% din deciziile specialistilor. Este un sistem complet automatizat, care furnizeaza rezultate de inalta acuratete, cu cea mai mare viteza de lucru. 2200 de tuburi trec, zilnic, prin circuitul Roche, iar capacitatea totala de procesare este de 4 milioane de teste/an. </p>
                    <p class="cta-text"><strong>DEPARTAMENTE: </strong>anatomie patologica, biochimie si imunologie, microbiologie, hematologie - coagular, biologie moleculara si genetica</p>
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <div class="row">
                        <img src="../image/lab.jpg" alt="Lab" border-radius="50%" width="500" heigh="300">
                    </div>
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
    
.call-to-action {
  background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(../img/call-to-action-bg.jpg) fixed center center;
  background-size: cover;
  padding: 80px 0;
}
 .cta-title {
  color: #fff;
  font-size: 28px;
  font-weight: 700;
}
 .cta-text {
  color: #fff;
}
.labimg {
    border-radius: 50%;
    width: 300;
    height: 300;
}   
</style>