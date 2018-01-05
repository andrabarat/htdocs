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
    <h1 class="project-name">Abonamente si Pachete</h1>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>Asigură-te că ai mereu acces la cele mai bune servicii medicale, contra unei sume avantajoase. Alege-ţi abonamentul care acoperă cel mai bine nevoile tale de sănătate şi bucură-te de privilegiile dedicate abonaţilor Rețelei de sănătate REGNA.</h4>
        </div>
    </div>
    
    
    <div class="row margin">
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-birthday-cake"></i></div></div>
                <h4 class="title"><div>EXPERIENTA</div></h4>
                <p class="description">cea mai mare expertiza de pe piata, de peste 20 de ani</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-h-square"></i></div></div>
                <h4 class="title"><div>PERSONALIZARE</div></h4>
                <p class="description">n functie de profilul companiilor: corporate, IMM, start-up, individuale</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user-md"></i></div></div>
                <h4 class="title"><div>CONSULTANTA CUSTOMIZATA</div></h4>
                <p class="description">Medical Advisor, Patient Care, Account Manager</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user"></i></div></div>
                <h4 class="title"><div>PORTAL HR</div></h4>
                <p class="description">platforma digitala creata pentru specialistii de HR si acces complet digitalizat la fisele de Medicina Muncii</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-group"></i></div></div>
                <h4 class="title"><div>SISTEM DE FEEDBACK</div></h4>
                <p class="description">integrat, care monitorizeaza satisfactia pacientilor dupa vizita in clinica</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-tablet"></i></div></div>
                <h4 class="title"><div>FACILITATI DIGITALE</div></h4>
                <p class="description">contul Meu, aplicatie de mobil, aplicatie de sarcina</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-heart-o"></i></div></div>
                <h4 class="title"><div>SISTEM INTEGRAT DE PREVENTIE</div></h4>
                <p class="description">inclusiv campanii de informare si educatie medicala</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-diamond"></i></div></div>
                <h4 class="title"><div>RECUNOASTERE INTERNATIONALA</div></h4>
                <p class="description">prin singurele doua spitale din Romania acreditate international</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-file-text-o"></i></div></div>
                <h4 class="title"><div>TESTE PREDICTIE</div></h4>
                <p class="description">cateva teste pentru a fi sigur ca stii unde sa mergi</p>
            </div>
        </div>
    </div>
</div>
    
    <div class="row call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-12 text-lg-left">
                    <h3 class="cta-title text-center">ABONAMENTE SI PACHETE</h3>
                    <p class="cta-text">Abonamentele medicale sunt deductibile, în limita a 400 de euro/persoană/an. Acest beneficiu fiscal se aplică în egală măsură abonamentelor corporate, oferite de companii angajaților, dar și abonamentelor individuale, pentru persoane fizice.</p>
                    <p class="cta-text">Concret, abonamentele medicale suportate de angajator nu mai sunt considerate beneficii în natură supuse aplicării impozitului pe venitul din salarii și a contribuțiilor de asigurări sociale, în limita unei sume anuale de 400 de euro/persoană. Scutirea de la plata impozitului și a contribuțiilor de asigurări sociale se aplică și în cazul abonamentelor individuale, contractate de persoanele fizice.</p>
                    <p class="cta-text">Acum, este mai simplu ca niciodată să ai grijă de sănătatea ta și a celor dragi ție!</p>
                    <p class="cta-text">*Notă: Acestă este un mesaj comercial și nu are rolul unei opinii fiscale. Pentru o informare completă asupra dispozițiilor legale aplicabile, inclusiv în ceea ce privește noțiunea de “deductibilitate”, vă recomandăm să solicitați o opinie fiscală de specialitate.</p>
                </div>
            </div>
        </div>
    </div>

   
  <div class="container">
      
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
</style>