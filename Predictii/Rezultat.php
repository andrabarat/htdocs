<?php
    include "../global/session.php";
    include "../global/header.php";
    include "../global/dbConnect.php";
    include "../Predictii/BackEnd/dec_tree3.php";

    function getBoolean($param){
        if($param==1){
            echo "Da";
        } else {
            echo "Nu";
        }
    }

    function getGender($param){
        if($param=="m"){
            echo "Masculin";
        } else {
            echo "Feminin";
        }
    }

    $id_session=0;
    $sql = "SELECT id_user FROM users WHERE user_name='".$login_session."'";
    $result = $conn->query($sql);        
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id_session=$row["id_user"];
        }
    }

    $question1=$_POST["question1"];
    $question2=$_POST["question2"];
    $question3=$_POST["question3"];
    $question4=$_POST["question4"];
    $question5=$_POST["question5"];

    $answear1=$_POST["answear1"];
    $answear2=$_POST["answear2"];
    $answear3=$_POST["answear3"];
    $answear4=$_POST["answear4"];
    $answear5=$_POST["answear5"];

    $list = array (
        array('Sex', 'Peste50', 'Diabetic', 'Puls', 'EKG'),
        array($answear1, $answear2, $answear3, $answear4, $answear5)
    );

    $fp = fopen('../Predictii/BackEnd/input_data.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
    $dec_tree = new DecisionTree('../Predictii/BackEnd/data.csv', 0);
    $result="";
    $result=$dec_tree->predict_outcome('../Predictii/BackEnd/input_data.csv');
    //echo $result;
?>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <link href="/css/test.css" rel="stylesheet">
    <script src="/js/doctors.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <form action="/Predictii/BackEnd/testAritmieBackEnd.php" method="post" id="prediction">
        <div class="timeline-container">
            <h1 class="project-name">Resultat: </h1>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h4>Acesta este un rezultat informativ.</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2><?php echo $result ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center text"><?php echo $question1?></h3></div>
                        <div class="panel-body"><h4 class="text-center text"><?php echo getGender($answear1)?></h4></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center text"><?php echo $question2?></h3></div>
                        <div class="panel-body"><h4 class="text-center text"><?php echo getBoolean($answear2)?></h4></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center text"><?php echo $question3?></h3></div>
                        <div class="panel-body"><h4 class="text-center text"><?php echo getBoolean($answear3)?></h4></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center text"><?php echo $question4?></h3></div>
                        <div class="panel-body"><h4 class="text-center text"><?php echo getBoolean($answear4)?></h4></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading"><h3 class="text-center text"><?php echo $question5?></h3></div>
                        <div class="panel-body"><h4 class="text-center text"><?php echo getBoolean($answear5)?></h4></div>
                    </div>
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
<style>
    .text{
        margin-bottom: 0;
    }
</style>