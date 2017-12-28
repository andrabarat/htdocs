<?php
    include "../../global/dbConnect.php";
    include "../../global/session.php";
    include "./dec_tree3.php";

    $gender=$_POST["optionsGender"];
    $age=$_POST["optionsAge"];
    $diabetes=$_POST["optionsDiabetes"];
    $puls=$_POST["optionsPuls"];
    $ekg=$_POST["optionsEKG"];

    echo $puls." ".$ekg." ".$age." ".$diabetes." ".$gender;

    $list = array (
        array('Sex', 'Peste50', 'Diabetic', 'Puls', 'EKG'),
        array($gender, $age, $diabetes, $puls, $ekg)
    );

    $fp = fopen('input_data.csv', 'w');

    foreach ($list as $fields) {
        fputcsv($fp, $fields);
    }

    fclose($fp);
    $dec_tree = new DecisionTree('data.csv', 0);
    $dec_tree->predict_outcome('input_data.csv');
    exit();

?>