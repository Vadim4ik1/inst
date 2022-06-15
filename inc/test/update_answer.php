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
$answer_4=$_POST['answer_4'];
$answer_5=$_POST['answer_5'];
$answer_6=$_POST['answer_6'];


echo($id_test."-".$number_q."-".$id_question."-".$type_question."-".$user_id."-".$answer."-".$answer_2."-".$answer_3);



// echo($test_name);
// mysqli_query($connect,"INSERT INTO `test_history` (`id_test_history`, `id_user`, `id_test`, `id_question`, `answer`, `answer_2`, `answer_3`, `type_question`) VALUES (NULL,'$user_id','$id_test','$id_question','$answer','$answer_2','$answer_3','$type_question')");
if($type_question=='check' &&(!empty($answer)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(empty($answer)) &&(!empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(empty($answer)) &&(empty($answer_2)) &&(!empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(empty($answer)) &&(empty($answer_2)) &&(empty($answer_3)) &&(!empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_4',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(empty($answer)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(!empty($answer_5)) &&(empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_5',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(empty($answer)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(!empty($answer_6))){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_6',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer)) && (!empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_2',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (empty($answer_2)) &&(!empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_3',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (empty($answer_2)) &&(empty($answer_3)) &&(!empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_4',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(!empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_5',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_6',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) &&(empty($answer)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_3',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) &&(empty($answer_3)) &&(empty($answer_1)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_4',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) &&(empty($answer_3)) &&(empty($answer_1)) &&(empty($answer_4)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_5',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_6)) &&(empty($answer_3)) &&(empty($answer_1)) &&(empty($answer_5)) &&(empty($answer_4)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_6',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_4',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_4)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_5',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_6))  &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_4)) &&(empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_6',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}

if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_5))  &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_4',`answer_2`='$answer_5',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_6))  &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_4',`answer_2`='$answer_6',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer_5)) && (!empty($answer_6)) &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_5',`answer_2`='$answer_6',`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' && (!empty($answer)) && (!empty($answer_2)) && (!empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_2',`answer_3`='$answer_3' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_2)) && (!empty($answer_4)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_2',`answer_3`='$answer_4' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_2)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_2',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_2)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_2',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer)) && (!empty($answer_3)) && (!empty($answer_4)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_3',`answer_3`='$answer_4' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_3)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_3',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_3)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_3',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer)) && (!empty($answer_4)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_4',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer)) && (!empty($answer_4)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_4',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer)) && (!empty($answer_5)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`='$answer_5',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}


if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_4)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_3',`answer_3`='$answer_4' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_3',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_3',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_4',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_4',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_2',`answer_2`='$answer_5',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}



if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_5)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_4',`answer_3`='$answer_5' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_4',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_3',`answer_2`='$answer_5',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}



if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_5)) && (!empty($answer_6)) ){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer_4',`answer_2`='$answer_5',`answer_3`='$answer_6' WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}



if($type_question=='input'){
    mysqli_query($connect,"UPDATE `test_history` SET `answer`='$answer',`answer_2`=NULL,`answer_3`=NULL WHERE `id_user`='$user_id' AND `id_test`='$id_test' AND `id_question`='$id_question'");
}
