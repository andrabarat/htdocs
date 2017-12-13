<?php
    include "../global/session.php";
    if($login_session != ''){
         header("Location: /Account/MyProfile.php");
    } else {    
        include "../global/header.php";
?>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" style="margin-top: 10%">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-1"><h4>Cauta</h4></div>
                <div class="col-sm-6">
                    <select id="profile-country" class="form-control" name="country">
                        <option value="">Specialitate</option>
                        <option value="India">India</option>
                        <option value="China">China</option>
                        <option value="Asia">Asia</option>
                    </select>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="profile-region" placeholder="Nume medic..." value="">
                </div>
            </div>
        </div>
        <br>
        <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar1.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Vasile</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Director Medical Reteaua privata de sanatate REGINA MARIA, fondator si presedinte Societatea Româna de Uroginecologie</h5>
                        <h5><strong>Experienta</strong>: Prima zi aici</h5>
                    </div>
                    <h5 class="col-sm-3">CHIRURGIE GENERALA</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-success col-sm-12 fa fa-calendar" onclick='alert("sunt diferit")'>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar2.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Mihai</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Asistent</h5>
                        <h5><strong>Experienta</strong>: Destula</h5>
                    </div>
                    <h5 class="col-sm-3">CARDIOLOG</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
         <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar2.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Mihai</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Asistent</h5>
                        <h5><strong>Experienta</strong>: Destula</h5>
                    </div>
                    <h5 class="col-sm-3">CARDIOLOG</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
         <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar2.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Mihai</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Asistent</h5>
                        <h5><strong>Experienta</strong>: Destula</h5>
                    </div>
                    <h5 class="col-sm-3">CARDIOLOG</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
         <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar2.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Mihai</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Asistent</h5>
                        <h5><strong>Experienta</strong>: Destula</h5>
                    </div>
                    <h5 class="col-sm-3">CARDIOLOG</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        
        <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar3.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. George</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Spalator de vase</h5>
                        <h5><strong>Experienta</strong>: A mai spalat la viata lui</h5>
                    </div>
                    <h5 class="col-sm-3">GINECOLOG</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar4.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Andra</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Cea mai cea</h5>
                        <h5><strong>Experienta</strong>: Nici nu se pune problema</h5>
                    </div>
                    <h5 class="col-sm-3">ZEITA</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="media">
            <div class="media-left media-middle">
                <img src="img_avatar1.png" class="media-object" style="width:80px">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Dr. Vasile</h4>
                <div class="row">
                    <div class="col-sm-7">
                        <h5><strong>Specialitate</strong>: Profesor</h5>
                        <h5><strong>Experienta</strong>: Prima zi aici</h5>sfdf
                    </div>
                    <h5 class="col-sm-3">CHIRURGIE GENERALA</h5>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-default col-sm-12 fa fa-calendar">
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>
<?php } ?>

