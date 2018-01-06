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
    <h1 class="project-name">Imagistica</h1>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>Acuratetea unui diagnostic este de o importanta cruciala in tratarea cu succes a cazurilor medicale cu care medicii se confrunta zilnic.</h4>
        </div>
    </div>
    
    
    <div class="row margin">
        <div class="col-lg-4 col-md-6 " data-wow-delay="0.2s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-hospital-o"></i></div></div>
                <h4 class="title"><div>5 DEPARTAMENTE</div></h4>
                <p class="description">RMN, TC, RADIOLOGIE, MAMOGRAFIE, OSTEODENSITOMETRIE (DXA)</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 " data-wow-delay="0.4s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-h-square"></i></div></div>
                <h4 class="title"><div>11 CENTRE IMAGISTICA</div></h4>
                <p class="description">Aceste centre ofera spitalizare de zi.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user-md"></i></div></div>
                <h4 class="title"><div>30 MEDICI</div></h4>
                <p class="description">Echipa noastra este formata din peste 30 cadre medicale.</p>
            </div>
        </div>
    </div>
</div>
    
    <div class="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-12 text-lg-left">
                    <h3 class="cta-title text-center">REZONANTA MAGNETICA</h3>
                    <p class="cta-text">Imagistica prin Rezonanta Magnetica (IRM) sau Rezonanta Magnetica Nucleara (RMN) este o tehnologie imagistica moderna care foloseste combinatia dintre un camp magnetic cu o putere foarte mare si unde radio pentru a produce o imagine cu o claritate superioara a structurilor si organelor corpului.</p>
                    <h3 class="cta-title text-center">TOMOGRAFIE COMPUTERIZATA</h3>
                    <p class="cta-text"> Acuratetea unui diagnostic este de o importanta cruciala in tratarea cu succes a cazurilor medicale cu care medicii se confrunta zilnic</p>
                    <h3 class="cta-title text-center">RADIOLOGIE</h3>
                    <p class="cta-text">Radiografia este in continuare cea mai frecvent folosita metoda imagistica radiologica. Este o examinare sigura atunci cand este efectuata de catre radiologi si tehnicieni special pregatiti sa minimizeze expunerea la radiatii. </p>
                    <h3 class="cta-title text-center">MAMOGRAFIE</h3>
                    <p class="cta-text">Cancerul mamar reprezinta principala cauza de deces la femeile peste 40 de ani. Totusi, controlul regulat cu ajutorul mamografiei este cea mai buna metoda de a descoperi cancerul de san inainte sa apara semne sau simptome evidente. Acest lucru reduce mult mortalitatea si pemite prin mijloace terapeutice optime vindecarea bolii.</p>
                    <h3 class="cta-title text-center">OSTEODENSITOMETRIE</h3>
                    <p class="cta-text">Determinarea densitatii minerale osoase prin metoda DXA (dual x-ray absorbtiometry) este metoda de referinta atat pentru diagnosticarea, cat si pentru monitorizarea tratamentului osteoporozei. Osteoporoza este astazi o problema de sanatate publica, fiind considerata de catre Organizatia Mondiala a Sanatatii in primele zece cele mai serioase boli cu raspandire larga.</p>
                </div>
            </div>
        </div>
    </div>

   
  <div class="container">
    <div class="row boxx wow fadeIn">
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        CENTRUL DE IMAGISTICA BANEASA</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Singurul computer tomograf din tara noastra cu un diametru de 80 cm, special conceput pentru examinarea persoanelor cu o greutate de pana la 300 kg.</p>
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
                        CENTRUL DE IMAGISTICA PONDERAS</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Cel mai inalt nivel de expertiza din reteaua REGNA in investigatii imagistice moderne - RMN, CT, Mamografie digitala, Osteodensitometrie si Radiologie Digitala</p>
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
                        CENTRUL DE IMAGISTICA BRASOV</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Diagnostic imagistic rapid si precis, echipamente de ultima generatie si o echipa medicala cu vasta expertiza in interpretarea unei game complexe de investigatii imagistice</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Dobrogeanu Gherea, nr 85</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 9268</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>office@regna.ro</li>
                </ul>
            </div>  
        </div>
        <div class="col-md-4 wow fadeInUp">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">
                        CENTRUL DE IMAGISTICA IASI</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Tehnologia ultraperformanta utilizata conduce la obtinerea unei scanari complete a corpului uman, deosebit de utila in evaluarea pacientilor oncologici sau in examinarile de mare acoperire.</p>
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
                        CENTRUL DE IMAGISTICA HELIOS</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Expertiza la nivel inalt in imagistica oncologica, in special a cancerului mamar, echipamente de ultima generatie, pentru acuratetea si calitatea diagnosticului imagistic</p>
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
                        CENTRUL DE IMAGISTICA EUROCLINIC</h4>
                </div>
                <div class="panel-body">
                    <p>
                        Echipament de inalta performanta, timp de examinare redus, aplicatii clinice avansate si un ambient placut, relaxant pentru pacientii nostri de zi cu zi.</p>
                    <i class="icons fa fa-h-square"></i>
                    <i class="icons fa fa-ambulance"></i>
                    <i class="icons fa fa-medkit"></i>
                    <i class="icons fa fa-plus-square"></i>
                    <i class="icons fa fa-heartbeat"></i>
                    <i class="icons fa fa-user-md"></i>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><div class="address">Adresă:</div>Str. Iuliu Maniu 22</li>
                    <li class="list-group-item"><div class="address">Telefon:</div>021 2286</li>
                    <li class="list-group-item"><div class="address">E-mail:</div>campuseuroclinic@regna.ro</li>
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