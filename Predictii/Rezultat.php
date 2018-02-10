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

    $category="";
    if($_SESSION["test".$id_session]=="aritmie"){
        
        $category="cardiologie";
        
        $list = array (
            array('Puls', 'EKG', 'Peste50', 'Diabet', 'Sex'),
            array($answear4, $answear5, $answear2, $answear3, $answear1)
        );
        $fp = fopen('../Predictii/BackEnd/input_data_artimie.csv', 'w');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        $dec_tree = new DecisionTree('../Predictii/BackEnd/data_aritmie.csv', 0);
        $result="";
        $result=$dec_tree->predict_outcome('../Predictii/BackEnd/input_data_artimie.csv');
        //echo $result;
    }
    if($_SESSION["test".$id_session]=="obezitate"){
        
        $category="nutritie";
                
        $list = array (
            array('Alimentatie', 'Cazuri', 'Sport', 'Varsta', 'Sex'),
            array($answear3, $answear5, $answear4, $answear2, $answear1)
            
        );
        $fp = fopen('../Predictii/BackEnd/input_data_obezitate.csv', 'w');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
        $dec_tree = new DecisionTree('../Predictii/BackEnd/data_obezitate.csv', 0);
        $result="";
        $result=$dec_tree->predict_outcome('../Predictii/BackEnd/input_data_obezitate.csv');
        //echo $result;
    }

    $rezultat="";
    if($result=="YES"){
        $rezultat="Pozitiv";
    } else {
        $rezultat="Negativ";
    }
    $testType=$_SESSION["test".$id_session];

?>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <script src="/js/doctors.js"></script>
    <link href="/css/doctors.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <form action="/Predictii/BackEnd/testAritmieBackEnd.php" method="post" id="prediction">
            <div class="results">
                <h1 class="text-center">Rezultat: </h1>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><strong><?php echo $rezultat ?></strong></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4>Acesta este un rezultat informativ. Pentru mai multe detalii faceti-va o programare la unul dintre medicii nostri din categoria: <strong><?php echo $category ?></strong></h4>
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
        <hr>
        <div id="doctorsList">
            <h2 class="text-center">Sugestii medici din departamentul: <strong><?php echo $category?></strong></h2>
            <br>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-center" id="modalHeader"></h4>
                    </div>
                    <div class="modal-body" id="modalBody">
                    </div>
                    <div class="modal-footer">
                        <h4 class="text-center" id="modalFooter">
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <form action="/Medici/BackEnd/appointments.php" method="post" style="display: none" id="reservation">
            <input type="text" name="user_name" id="id_user" value="<?php echo $id_session?>" required>
            <input type="text" name="id_doctor" id="id_doctor" value="">
            <input type="text" name="dateAppoiment" id="dateAppoiment" value="">
            <input type="text" name="timeInterval" id="timeInterval" value="">
        </form>
    </div>
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
<?php
    $sql="  SELECT d.`id_doctor`, d.`grade`, d.`first_name`, d.`last_name`, d.`description`, d.`job_title`, truncate(ifnull(r.`rating`,0),1) as 'rating' 
            FROM doctors d left join ratings r on d.`id_doctor`=r.`id_doctor`
            where lower(d.`job_title`) like '".$category."'
            group by d.`id_doctor";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            create("doctorsList", "<?php echo $row["id_doctor"]?>", "<?php echo $row["grade"]?>", "<?php echo $row["first_name"]?>", "<?php echo $row["last_name"]?>", "<?php echo $row["description"]?>", "<?php echo $row["job_title"]?>", "<?php echo $row["rating"]?>");
            <?php
        }
    }
?>
</script>
<style>
.text{
    margin-bottom: 0;
}
.results{
    margin-top: 10%;
}
</style>