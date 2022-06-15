<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

$id_question=$_POST['id_question'];
$question=$_POST['question'];
$true_answer=$_POST['true_answer'];
$true_answer_2=$_POST['true_answer_2'];
$true_answer_3=$_POST['true_answer_3'];
$wrong_answer=$_POST['wrong_answer'];
$wrong_answer_2=$_POST['wrong_answer_2'];
$wrong_answer_3=$_POST['wrong_answer_3'];
$type=$_POST['type'];
echo($id_question."-".$true_answer);
if($type=="check"){
mysqli_query($connect,"UPDATE `test` SET `question`='$question',`true_answer`='$true_answer',`true_answer_2`='$true_answer_2', `true_answer_3`='$true_answer_3',`wrong_answer`='$wrong_answer',`wrong_answer_2`='$wrong_answer_2',`wrong_answer_3`='$wrong_answer_3' WHERE `id_question`='$id_question' ");
}
if($type=="input"){
    mysqli_query($connect,"UPDATE `test` SET `question`='$question',`answer`='$answer' ");
}
header('Location:../../front/test/edit_q.php?id='.$id_question);


?>