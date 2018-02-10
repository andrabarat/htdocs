<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";

    $sql="SELECT DISTINCT d.`id_doctor`, d.`first_name`, d.`last_name`, d.`job_title` from `doctors` d join `reservations` r on d.`id_doctor`=r.`id_doctor` join `users` u on r.`id_user`=u.`id_user` join `analysis` a on r.`id_reservation`=a.`id_reservation` WHERE a.`status` = 'Confirmat' and u.`user_name`='".$login_session."'";
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) 
    {
        ?>
        <html>
        <head>
            <title>Rating</title>
            <title>Profilul meu</title>
            <link href="/css/rating.css" rel="stylesheet">
        </head>
        <body>
            <div class="call-to-action" style="background: none">
                <div class="container size">
                    <div class="alert alert-success">
                        <div class="row">
                            <h2 class="col-sm-12 text-center">Ne pare rau, dar nu puteți adăuga un rating pana nu veți fi consultat de către un doctor.</h2>
                        </div>
                        <div class="row">
                            <h2 class="text-center"><a href="/Medici/Doctori.php" class="btn btn-success btn-lg">Rezervări</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
?>
<html>
<head>
    <title>Rating</title>
    <title>Profilul meu</title>
    <link href="/css/rating.css" rel="stylesheet">
    <script src="/js/rating.js"></script>
</head>
<body>
    <div class="call-to-action">
        <div class="container size">
            <div id="setRating"></div>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-center ratingMark">Chestionar</h1>
                    </div>
                    <div class="panel-body survey">
                        <div class="alert alert-success" role="alert" style="display: none" id="succesResponse"></div>
                        <div class="alert alert-danger" role="alert" style="display: none" id="errorResponse"></div>
                        <div class="row bottom">
                            <div class="col-sm-12 form-group">
                            <h3>Nume doctor:</h3>
                            <select class="form-control input-lg" id="doctorsList">
                                <option value="ALL">Selectati un doctor</option>
                            </select>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">1. Cât de mulţumit sunteți de modalităţile de programare la Regna?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue1">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue1" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">2. Cât de mulţumit sunteți de informaţiile şi detaliile primite de la medic?</h3>
                            <h3 class="col-sm-1 text-center markBox">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue2">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue2" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                         <div class="row bottom">
                            <h3 class="col-sm-10">3. Cât de mulţumit sunteți de modul în care a decurs consultația?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue3">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue3" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>   
                        <div class="row bottom">
                            <h3 class="col-sm-10">4. Cât de mulţumit sunteți de indicațiile primite?</h3>
                            <h3 class="col-sm-1 text-center">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue4">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue4" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                        <div class="row bottom">
                            <h3 class="col-sm-10">5. Cât consideraţi că personalul auxiliar v-a ascultat şi v-a oferit informaţii?</h3>
                            <h3 class="col-sm-1 text-center markBox">Nota: </h3>
                            <h3 class="col-sm-1 text-center ratingMark" id="getValue5">3</h3>
                            <div class="form-group col-sm-12">
                                <div class="input-group slidecontainer">
                                    <input type="range" min="1" max="5" value="3" class="slider" id="setValue5" oninput="setMarkValue(this)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center checkButtons">
                                <button type="button" class="btn btn-success btn-lg" onclick="submitRatingDoctor('<?php echo $login_session?>')"><h3>Trimite rezultate chestionar</h3></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</body>
</html>
<script>
<?php
        while($row = $result->fetch_assoc()) {
            ?>addDoctor('<?php echo $row['id_doctor']?>','<?php echo $row['first_name']?>','<?php echo $row['last_name']?>','<?php echo $row['job_title']?>');<?php
        }
    }
?>
</script>