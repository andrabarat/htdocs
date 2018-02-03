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
                <h1 class="text-center search">Caută pacient</h1>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-6 form-group">
                    <h3 class="text-center">CNP pacient</h3>
                    <div class="input-group">
                        <span class="input-group-addon input-lg glyphicon glyphicon-user" aria-hidden="true"></span>
                        <input type="text" class="form-control input-lg cnp" placeholder="CNP pacient" id="cnp">
                    </div>
                </div>
                <div class="col-sm-6 form-group">
                    <h3 class="text-center">Telefon pacient</h3>
                    <div class="input-group">
                        <span class="input-group-addon input-lg glyphicon glyphicon-phone" aria-hidden="true"></span>
                        <input type="text" class="form-control input-lg phone" placeholder="Telefon pacient" id="phone">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-lg col-sm-6 col-sm-offset-3" onclick="getPacient()">Caută</button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="alert alert-danger" style="display: none" id="error">
                </div>
            </div>
            <div class="row">
                <div id="pacientsList" class="col-sm-12">
                </div>
                <div id="prescriptionsList" class="col-sm-12">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
        <div class="modal fade" id="prescriptionModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center" id="modalHeader"></h3>
                    </div>
                    <div class="modal-body" id="modalBody">
                    </div>
                    <div class="modal-footer">
                        <h4 class="text-center">
                            <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">Închide</button>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>