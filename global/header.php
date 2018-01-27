<?php 
    include "../global/session.php";
?>
<head>
    <link href="/img/favicon.png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">
    <link href="/css/globalStyle.css" rel="stylesheet">
</head>
<body>
    <header id="header" style="background: #808080;">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="/"><img src="/img/logo.png"></img></a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="#" style="font-size: 17px"><i class="fa fa-phone-square"></i> 0232 . 905</a></li>
                    <li data-toggle="modal" data-target="#appoimentsModal" onclick="createAppoimentModal()"><a href="#" style="font-size: 15px"><i class="fa fa-calendar"></i> Programare online</a></li>
                    <li class="menu-has-children"><a href="">Servicii</a>
                         <ul>
                             <?php if($usertype!='doctors') {?>
                             <li><a href="/Medici/Doctori.php">Medici</a></li>
                             <?php } ?>
                             <li><a href="/Servicii/Spitale.php">Spitale si policlinici</a></li>
                             <li><a href="/Servicii/Laboratoare.php">Laboratoare</a></li>
                             <li><a href="/Servicii/Imagistica.php">Imagistica</a></li>
                             <li><a href="/Servicii/Maternitati.php">Maternitati</a></li>
                             <li><a href="/Servicii/Abonamente.php">Abonamente si pachete</a></li>
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
                            <?php } ?>
                            <li><form action="/Account/BackEnd/logout.php" action="post"><a href="/Account/BackEnd/logout.php">Iesire din cont</a></form></li>
                        </ul>
                    </li>
                    <?php } else {?>
                    <li class="!menu-active"><a href="/Account/Login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        
    </header>
</body>


<script src="/contactform/contactform.js"></script>


<link href="/img/favicon.png" rel="icon">
<link href="/img/apple-touch-icon.png" rel="apple-touch-icon">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/animate/animate.min.css" rel="stylesheet">

<link href="/css/style.css" rel="stylesheet">
<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/jquery/jquery-migrate.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/counterup/counterup.min.js"></script>
<script src="/lib/superfish/hoverIntent.js"></script>
<script src="/lib/superfish/superfish.min.js"></script>
<script src="/js/index.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>

<script src="/js/main.js"></script>