<?php 
    include "global/session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Regna</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/globalStyle.css" rel="stylesheet">
    <link href="css/chat.css" rel="stylesheet">
</head>
<body>
    <header id="header">
        <div class="container">
            <div id="logo" class="pull-left">
                <a href="#hero"><img src="img/logo.png" alt="" title="" >
                </a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="" style="font-size: 17px"><i class="fa fa-phone-square"></i> 0232 . 905</a></li>
                    <?php if($usertype!='doctors') {?>
                    <li data-toggle="modal" data-target="#appoimentsModal" onclick="createAppoimentModal()"><a href="#" style="font-size: 15px"><i class="fa fa-calendar"></i> Programare online</a></li>
                    <?php } ?>
                    <li class="menu-has-children"><a href="">Servicii</a>
                         <ul>
                             <?php if($usertype!='doctors') {?>
                             <li><a href="/Medici/Doctori.php">Medici</a></li>
                             <?php } ?>
                             <li><a href="/Servicii/Spitale.php">Spitale și policlinici</a></li>
                             <li><a href="/Servicii/Laboratoare.php">Laboratoare</a></li>
                             <li><a href="/Servicii/Imagistica.php">Imagistică</a></li>
                             <li><a href="/Servicii/Maternitati.php">Maternitați</a></li>
                             <li><a href="/Servicii/Abonamente.php">Abonamente și pachete</a></li>
                         </ul>
                    </li>
                    <li class="menu-has-children"><a href="">Informații</a>
                         <ul>
                             <li><a href="#about">Despre noi</a></li>
                             <li><a href="#services">Servicii</a></li>
                             <li><a href="#contact">Contact</a></li>
                         </ul>
                    </li>
                    <?php if($login_session!='') {?>
                    <li class="!menu-active menu-has-children"><a href="#"><?php echo $_SESSION["usernameLogin"];?></a>
                        <ul>
                            <?php if($usertype=='users') {?>
                            <li><a href="/Account/Profil.php">Profilul meu</a></li>
                            <li><a href="/Rating/RatingDoctor.php">Adaugă un rating</a></li>
                            <?php } else {?>
                            <li><a href="/Account/ProfilDoctor.php">Profilul meu</a></li>
                            <li><a href="/Pacient/Cauta.php">Istoric pacient</a></li>
                            <?php } ?>
                            <li><form action="/Account/BackEnd/logout.php" action="post"><a href="/Account/BackEnd/logout.php">Iesire din cont</a></form></li>
                        </ul>
                    </li>
                    <?php } else {?>
                    <li class="!menu-active"><a href="/Account/Login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>
    <section id="hero">
        <div class="hero-container">
            <h1>REGNA îți urează bun venit!</h1>
            <h2>Suntem aici zi de zi ca să știm că ești bine.</h2>
        </div>
    </section>
    <main id="main">
        <section id="about">
            <div class="container">
                <div class="row about-container">
                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h2 class="title">Câteva cuvinte despre noi</h2>
                        <div class="icon-box wow fadeInUp">
                            <div class="icon"><i class="fa fa-user-md"></i></div>
                            <h4 class="title"><a href="">Oamenii REGNA</a></h4>
                            <p class="description">Echipa noastră de medici este sufletul reţelei private de sănătate REGNA. Pregătirea şi implicarea lor neobosită, atenţia acordată fiecărui pacient şi performanţele medicale pe care le-au atins sunt garanţii ale excelenţei pe care o promovăm.</p>
                        </div>
                        <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-medkit"></i></div>
                            <h4 class="title"><a href="">Stiința REGNA</a></h4>
                            <p class="description"> Priceperea specialiștilor noștri se îmbina cu precizia celei mai performante aparaturi din România. Laboratorul Central REGNA are eticheta Roche Diagnostic pentru linia de biochimie și imunologie și e un reper tehnologic pentru sistemul medical românesc. </p>
                        </div>
                        <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <h4 class="title"><a href="">Experiența REGNA</a></h4>
                            <p class="description">Asigură-te că ai mereu acces la cele mai bune servicii medicale, contra unei sume avantajoase. </p>
                        </div>
                    </div>
                    <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
                </div>
            </div>
        </section>
        <section id="call-to-action">
            <div class="container wow fadeIn">
                <div class="row">
                    <div class="col-lg-9 text-center text-lg-left">
                        <h3 class="cta-title">Ai grijă de sănătatea ta!</h3>
                        <p class="cta-text"> Fii sigur că duci o viață sănătoasă. Noi te ajutăm să afli la ce ai putea să fii predispus. Completează formularele apăsând butonul din dreapta.</p>
                    </div>
                    <div class="col-lg-3 cta-btn-container text-center">
                        <div class="row">
                            <?php if($login_session!='') { ?>
                            <a class="cta-btn align-middle col-sm-6" href="/Predictii/TestAritmie.php">Test Aritmie</a>
                            <a class="cta-btn align-middle col-sm-6" href="/Predictii/TestObezitate.php">Test Obezitate</a>
                            <?php } else { ?>
                            <a class="cta-btn align-middle col-sm-6" href="/Account/Login.php">Test Aritmie</a>
                            <a class="cta-btn align-middle col-sm-6" href="/Account/Login.php">Test Obezitate</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="services">
            <div class="container wow fadeIn">
                <div class="section-header">
                    <h3 class="section-title">Servicii</h3>
                    <p class="section-description">Suntem siguri că ai ales locul potrivit pentru a te face bine!</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box">
                            <div class="icon"><a href="Medici/Doctori.php"><i class="fa fa-user-md"></i></a></div>
                            <h4 class="title"><a href="Medici/Doctori.php">Medici</a></h4>
                            <p class="description">Echipa noastră de medici este sufletul Reţelei private de sănătate REGNA.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box">
                            <div class="icon"><a href="Servicii/Spitale.php"><i class="fa fa-h-square"></i></a></div>
                            <h4 class="title"><a href="Servicii/Spitale.php">Spitale și policlinici</a></h4>
                            <p class="description">Suntem mereu aproape de pacienții noștri, prin intermediul celor 6 de policlinici, 4 spitale, 2 Campusuri și 50 de clinici partenere în toată țara.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box">
                            <div class="icon"><a href="Servicii/Laboratoare.php"><i class="fa fa-hospital-o"></i></a></div>
                            <h4 class="title"><a href="Servicii/Laboratoare.php">Laboratoare</a></h4>
                            <p class="description">Laboratorul Central REGNA are eticheta Roche Diagnostic pentru linia de biochimie și imunologie și e un reper tehnologic pentru sistemul medical românesc.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box">
                            <div class="icon"><a href="Servicii/Imagistica.php"><i class="fa fa-heartbeat"></i></a></div>
                            <h4 class="title"><a href="Servicii/Imagistica.php">Imagistică</a></h4>
                            <p class="description">Acuratețea unui diagnostic este de o importanță crucială în tratarea cu succes a cazurilor medicale cu care medicii se confrunta zilnic.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box">
                            <div class="icon"><a href="Servicii/Abonamente.php"><i class="fa fa-medkit"></i></a></div>
                            <h4 class="title"><a href="Servicii/Abonamente.php">Abonamente și pachete</a></h4>
                            <p class="description">Asigură-te că ai mereu acces la cele mai bune servicii medicale, contra unei sume avantajoase. </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="box">
                            <div class="icon"><a href="Servicii/Maternitati.php"><i class="fa fa-ambulance"></i></a></div>
                            <h4 class="title"><a href="Servicii/Maternitati.php">Maternități</a></h4>
                            <p class="description">Nașterea unui copil este cel mai emoționant și memorabil moment din viața unei mamici.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section id="contact">
            <div class="container wow fadeInUp">
                <div class="section-header">
                    <h3 class="section-title">Contact</h3>
                </div>
            </div>
            <div id="google-map"></div>
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="info">
                            <div>
                                <i class="fa fa-map-marker"></i>
                                <p>Str. Nicolina
                                    <br>Iasi, IS</p>
                            </div>
                            <div>
                                <i class="fa fa-envelope"></i>
                                <p>regna@gmail.com</p>
                            </div>
                            <div>
                                <i class="fa fa-phone"></i>
                                <p>0232.905</p>
                            </div>
                        </div>
                        <div class="social-links">
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8">
                        <div class="form">
                            <div id="sendmessage"></div>
                            <div id="errormessage"></div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nume" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subiect" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea id="message" class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Mesaj"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" onclick="submitContactForm()">Trimite mesaj</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div id="live-chat" onclick="sayHello()">
        <header class="clearfix">
            <a href="#" class="chat-close"><i class="fa fa-times" aria-hidden="true"></i></a>
            <h5 class="chatHeader"><p id="status" class="statusInactive"></p>Regna Chat</h5>
            <!--span class="chat-message-counter">!</span-->
        </header>
        <div id="chat-body" class="chat" style="display: none">
            <div class="chat-history" id="chat">

            </div>
            <!-- end chat-history -->
            <div class="waiting"><p id="typingeffect" class="typingeffect">Asteptam o intrebare ...</p></div>
            <div class="typeBox">
                <div class="form-group">
                    <input type="text" class="form-control" id="messageChat" placeholder="Type your message..." onkeypress="return postQuestion(event, this.value, 'admin')">
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">
    </footer>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVCUz4TI_tpltoP1V3oXf2Tlimtr7JYFg"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/superfish/hoverIntent.js"></script>
    <script src="lib/superfish/superfish.min.js"></script>
    <!--<script src="contactform/contactform.js"></script>-->
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
    <script src="js/global.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/chat.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
</body>
</html>
<script>
myMap();
</script>