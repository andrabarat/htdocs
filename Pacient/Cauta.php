<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";
?>
<html>
<head>
    <title>Cauta pacient</title>
    <link href="/css/istoricPacient.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="/js/istoricPacient.js"></script>
</head>
<body>
    <div class="call-to-action">
        <div class="container size">
            <div class="row">
                <h1 class="text-center search">Cauta pacient</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h3 class="text-white text-center">CNP pacient</h3>
                    <div class="input-group">
                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                        <input type="text" class="form-control input-lg cnp" placeholder="CNP pacient" id="cnp">
                    </div>
                </div>
                <div class="col-sm-6 form-group">
                    <h3 class="text-white text-center">Telefon pacient</h3>
                    <div class="input-group">
                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                        <input type="text" class="form-control input-lg phone" placeholder="Telefon pacient" id="phone">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <button type="submit" class="btn btn-success btn-lg col-sm-6 col-sm-offset-3" onclick="getPacient()">Cauta</button>
            </div>
            <hr>
            <div class="row">
                <div class="alert alert-danger" style="display: none" id="error">
                </div>
            </div>
            <div class="row">
                <div id="pacientList" class="pacients" >
                </div>
            </div>
        </div>
    </div>
</body>
</html>