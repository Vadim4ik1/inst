<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_test=$_POST['id_test'];
$number_q=$_POST['number_question'];
$id_question=$_POST['id_question'];
$type_question=$_POST['type_question'];
$user_id=$_SESSION['user']['fio'];
$answer=$_POST['answer'];
$answer_2=$_POST['answer_2'];
$answer_3=$_POST['answer_3'];





// echo($test_name);
mysqli_query($connect,"UPDATE `test_history` SET (`answer`='$answer', `answer_2`='$answer_2', `answer_3`='$answer_3' WHERE `number_question`='$number_q'");
$number_q=$number_q+1;
?>
