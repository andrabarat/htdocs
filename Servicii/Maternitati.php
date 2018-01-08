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
<head>
    <title>Maternitati</title>
    <link href="/css/maternitati.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h1 class="project-name">Maternitati</h1>
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>Nasterea unui copil este cel mai emotionant si memorabil moment din viata unei mamici.
De aceea, ne-am pregatit cu dotari la standarde internationale si o echipa de medici experimentati, pentru venirea pe lume a copilului tau.</h4>
        </div>
    </div>
    
    
    <div class="row margin">
        <div class="col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-hospital-o"></i></div></div>
                <h4 class="title"><div>UNIC</div></h4>
                <p class="description">Singurul centru fetal din Romania</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-wow-delay="0.4s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-h-square"></i></div></div>
                <h4 class="title"><div>PRIMUL</div></h4>
                <p class="description">Spital din Romania acreditat JCI</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" data-wow-delay="0.6s">
            <div class="box">
                <div class="icon"><div><i class="fa fa-user-md"></i></div></div>
                <h4 class="title"><div>SPECIALIZAT</div></h4>
                <p class="description">in ingrijirea nou nascutilor prematuri incepand cu saptamana 24</p>
            </div>
        </div>
    </div>
</div>
    
    <div class="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-12 text-lg-left">
                    <h3 class="cta-title text-center">CELULE STEM</h3>
                    <p class="cta-text">Medicina a ajuns departe si in viitor va ajunge si mai departe. Alege sa stochezi celule stem la nasterea copilului tau si el se va bucura de progresele medicinei regenerative si va avea o sansa in plus la viata.</p>
                    <h3 class="cta-title text-center">NEONATOLOGIE</h3>
                    <p class="cta-text">Echipa de medici neonatologi din cadrul REGNA are o experienta relevanta si consistenta in gestionarea cazurilor de bebelusi nascuti prematur sau cu afectiuni grave. Departamentul de neonatologie este echipat cu unit-uri speciale, de ultima generatie, pentru reanimare si monitorizare nou nascuti si echipa completa de asistenta medicala: medici si asistenti,  24/24h.</p>
                    <h3 class="cta-title text-center">ABC-UL PARINTILOR</h3>
                    <p class="cta-text">Nasterea este un moment unic, o bucurie extraordinara care iti împlineste existenta. Asadar te asteapta emotii puternice cu care trebuie sa te obisnuiesti, pentru ca nasterea este o experienta unica, care se invata. De aceea ne-am gandit sa-ti oferim ABC-ul parintilor - un curs adresat viitorilor parinti. Cursul va ajuta la o parcurgere echilibrata a acestei perioade de formare a bebelusului, atat in pantecul mamei cat si dupa ce va veni pe lume.</p>
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
      </div>
</div>

</body>
</html>