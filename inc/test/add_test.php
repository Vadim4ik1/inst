<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];
$question=$_POST['question'];

$type_question=$_POST['type_question'];
$true_answer=$_POST['true_answer'];
$true_answer_2=$_POST['true_answer_2'];
$true_answer_3=$_POST['true_answer_3'];
$wrong_answer=$_POST['wrong_answer'];
$wrong_answer_2=$_POST['wrong_answer_2'];
$wrong_answer_3=$_POST['wrong_answer_3'];

// $video=$_POST['video'];
// echo($video);
echo("id lesson");
echo($id_lesson);
echo("Вопрос");
echo($question);
echo("Тип вопроса");
echo($type_question);
echo("Неправильный ответ");
echo($wrong_answer);
echo("Неправильный ответ2:");
echo($wrong_answer_2);
echo("Неправильный ответ3:");
echo($wrong_answer_3);

if($type_question=='check' && (!empty($true_answer_2))){
    echo("Работает");
}
if($type_question=='input'|| $type_question=='radio'){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_lesson`, `id_kurs`, `type_question`) VALUES (NULL, '$question', '$true_answer', NULL, NULL, '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_lesson', NULL, '$type_question')");
}
if($type_question=='check' && (!empty($true_answer_2))&& (!empty($true_answer_3))){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_lesson`, `id_kurs`, `type_question`) VALUES (NULL, '$question', '$true_answer', '$true_answer_2', '$true_answer_3', '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_lesson', NULL, '$type_question')");
}
if($type_question=='check' && (!empty($true_answer_2))){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_lesson`, `id_kurs`, `type_question`) VALUES (NULL, '$question', '$true_answer', '$true_answer2', NULL, '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_lesson', NULL, '$type_question')");
}

// echo($id_kurs);
// echo($name);
// echo($creator);
// echo($text);

// echo($video);

// echo($number);
// mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_lesson`, `id_kurs`, `type_question`) VALUES (NULL, '', '', NULL, NULL, '', '', '', NULL, '', '')");
// header('Location:../../front/kurs/edit_kurs.php?id='.$id_kurs);


if($type_question=='check' &&(!empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
}
if($type_question=='check' &&(empty($answer_1)) &&(!empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
}
if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(!empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
}
if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(!empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
}
if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(!empty($answer_5)) &&(empty($answer_6) ){
 
}
if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(!empty($answer_6) ){
 
}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) &&(empty($answer_2) &&(empty($answer_3) &&(empty($answer_5)) &&(empty($answer_6) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_5)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_3)) &&(empty($answer_6) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_6)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_3) ){

}



if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_6)) ){

}


if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) ){

}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_6)) ){

}

if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_6)) ){

}


if($type_question=='check' &&(!empty($answer_5)) && (!empty($answer_6)) ){

}


if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_3)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_4)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_6)) ){

}

if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_4)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_6)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) && (!empty($answer_6)) ){

}
if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_5)) && (!empty($answer_6)) ){

}


if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_4)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_6)) ){

}

if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_6)) ){

}
if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) && (!empty($answer_6)) ){

}


if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_5)) ){

}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_6)) ){

}
if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) && (!empty($answer_6)) ){

}