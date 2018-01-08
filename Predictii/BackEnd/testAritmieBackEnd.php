
<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    include "./dec_tree3.php";

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

    echo $question1." ".$question2." ".$question3." ".$question4." ".$question5;
    echo '<br>';
    echo $answear1." ".$answear2." ".$answear3." ".$answear4." ".$answear5;
    echo '<br>';

    $list = array (
        array('Sex', 'Peste50', 'Diabetic', 'Puls', 'EKG'),
        array($answear1, $answear2, $answear3, $answear4, $answear5)
    );

    $fp = fopen('input_data.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
    $dec_tree = new DecisionTree('data.csv', 0);
    $result="";
    $result=$dec_tree->predict_outcome('input_data.csv');
    echo $result;
    exit();

?>