<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";

    $id_session=0;
    $sql = "SELECT id_".substr($usertype, 0, -1)." FROM ".$usertype." WHERE user_name='".$login_session."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id_session=$row["id_".substr($usertype, 0, -1)];
        }
    }
    $_SESSION["test".$id_session] = "obezitate";
?>
<html lang="en">

<head>
    <title>Test Obezitate</title>
    <meta charset="utf-8">
    <link href="/css/test.css" rel="stylesheet">
    <script src="/js/doctors.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <form action="/Predictii/Rezultat.php" method="post" id="prediction">
        <input type="text" name="question1" value="Sexul" style="display: none">
        <input type="text" name="question2" value="Aveti peste 45 de ani?" style="display: none">
        <input type="text" name="question3" value="Pe ce este bazata alimentatia?" style="display: none">
        <input type="text" name="question4" value="Care este stilul de viata?" style="display: none">
        <input type="text" name="question5" value="Sunt in familie rude de grad I cu caz de obezitate?" style="display: none">
        <div class="timeline-container">
            <h1 class="project-name">Test de Obezitate</h1>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Acest test vă ajută în a afla dacă suferiți sau nu de obezitate. Raspunsul nu este într-un procentaj maxim corect. Consultați un medic în urma efectuarii testului.</h4>
                </div>
            </div>
            <div id="timeline">
                <div class="timeline-item">
                    <div class="timeline-icon success">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                        <h2>Alegeți sexul:</h2>
                        <div class="row question">
                            <div class="col-sm-12 text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear1" value="m" autocomplete="off" required> Masculin
                                    </label>
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear1" value="f" autocomplete="off"> Feminin
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content right">
                        <h2>Aveți peste 45 de ani?</h2>
                        <div class="row question">
                            <div class="col-sm-12 text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear2" value="1" autocomplete="off" required> Da
                                    </label>
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear2" value="0" autocomplete="off"> Nu
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon success">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                        <h2>Pe ce este bazată alimentația dumneavoastră?</h2>
                        <div class="row question">
                            <div class="col-sm-12 text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear3" value="1" autocomplete="off" required> Vegetale
                                    </label>
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear3" value="0" autocomplete="off"> Grăsimi
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content right">
                        <h2>Care este stilul de viață pe care îl aveți?</h2>
                        <div class="row question">
                            <div class="col-sm-12 text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear4" value="1" autocomplete="off" required> Activ
                                    </label>
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear4" value="0" autocomplete="off"> Sedentar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-icon success">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="timeline-content">
                        <h2>Sunt în familie rude de grad I cu caz de obezitate?</h2>
                        <div class="row question">
                            <div class="col-sm-12 text-center">
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear5" value="1" autocomplete="off" required> Da
                                    </label>
                                    <label class="btn btn-warning btn-lg">
                                        <input type="radio" name="answear5" value="0" autocomplete="off"> Nu
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
            <div class="row">
                <div class="col-sm-12 text-center checkButtons">
                    <button type="button" class="btn btn-secondary btn-lg">Elimină date</button>
                    <button type="submit" class="btn btn-success btn-lg">Trimite date</button>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script>
    $(function() {
	var timelineBlocks = $('.timeline-item'),
		offset = 0.8;

	hideBlocks(timelineBlocks, offset);

	$(window).on('scroll', function(){
		(!window.requestAnimationFrame) 
			? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
			: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
	});

	function hideBlocks(blocks, offset) {
		blocks.each(function(){
		    ($(this).offset().top > $(window).scrollTop() + $(window).height() * offset) && $(this).find('.timeline-icon, .timeline-content').addClass('is-hidden');
		});
	}

	function showBlocks(blocks, offset) {
		blocks.each(function(){
		    ($(this).offset().top <= $(window).scrollTop() + $(window).height() * offset && $(this).find('.timeline-icon').hasClass('is-hidden')) && $(this).find('.timeline-icon, .timeline-content').removeClass('is-hidden').addClass('animate-it');

		});
	}
});
</script>