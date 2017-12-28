<?php 
    include "../global/session.php";
?>
<head>
    <link href="/img/favicon.png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <header id="header" style="background: #808080;">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href="/"><img src="/img/logo.png"></img></a>
                <!-- Uncomment below if you prefer to use a text logo -->
                <!--<h1><a href="#hero">Regna</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="/Medici/Doctori.php">Medici</a></li>
                    <?php if($login_session!='') {?>
                    <li class="!menu-active menu-has-children"><a href="#"><?php echo $_SESSION["usernameLogin"];?></a>
                        <ul>
                            <li><a href="#">Editeaza profil</a></li>
                            <li><a href="#">Programarile mele</a></li>
                            <li><a href="/Account/MyProfile.php">Iesire din cont</a></li>
                        </ul>
                    </li>
                    <?php } else {?>
                    <li class="!menu-active"><a href="/Account/Login.php">Login</a></li>
                    <?php } ?>
                    <!--
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#team">Team</a></li>
                        <ul>
                            <li><a href="#"></a></li>
                            <li class="menu-has-children"><a href="#">Drop Down 2</a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                            <li><a href="#">Drop Down 5</a></li>
                        </ul>
                    <li><a href="#contact">Contact Us</a></li>
                    <li class="menu-has-children"><a href="/Account/Login.php">Login</a>
                    -->
                </ul>
            </nav><!-- #nav-menu-container -->
        
    </header><!-- #header -->
</body>

<!-- JavaScript Libraries -->
<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/jquery/jquery-migrate.min.js"></script>
<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/lib/easing/easing.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>

<script src="/lib/waypoints/waypoints.min.js"></script>
<script src="/lib/counterup/counterup.min.js"></script>
<script src="/lib/superfish/hoverIntent.js"></script>
<script src="/lib/superfish/superfish.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="/contactform/contactform.js"></script>

<!--==========================
Header
============================-->
<!-- Favicons -->
<link href="/img/favicon.png" rel="icon">
<link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!-- Libraries CSS Files -->
<link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="/lib/animate/animate.min.css" rel="stylesheet">

<!-- Main Stylesheet File -->
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
<!-- Contact Form JavaScript File -->
<!-- Template Main Javascript File -->
<script src="/js/main.js"></script>