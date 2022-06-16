<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];
$id_test=$_POST['id_test'];
$question=$_POST['question'];
$number_question=$_POST['number_question'];

$type_question=$_POST['type_question'];
$true_answer=$_POST['true_answer'];
$true_answer_2=$_POST['true_answer_2'];
$true_answer_3=$_POST['true_answer_3'];
$wrong_answer=$_POST['wrong_answer'];
$wrong_answer_2=$_POST['wrong_answer_2'];
$wrong_answer_3=$_POST['wrong_answer_3'];


echo($id_test);
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
if($type_question=="input"|| $type_question=="radio"){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_test`, `id_kurs`, `type_question`, `number_q`) VALUES (NULL, '$question', '$true_answer', NULL, NULL, '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_test', '$id_kurs', '$type_question','$number_question')");
}
if($type_question=='check' && (!empty($true_answer_2))&& (!empty($true_answer_3))){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_test`, `id_kurs`, `type_question`,`number_q`) VALUES (NULL, '$question', '$true_answer', '$true_answer_2', '$true_answer_3', '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_test', '$id_kurs', '$type_question','$number_question')");
}
if($type_question=='check' && (!empty($true_answer_2)) && (empty($true_answer_3)) ){
    mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_test`, `id_kurs`, `type_question`,`number_q`) VALUES (NULL, '$question', '$true_answer', '$true_answer2', NULL, '$wrong_answer', '$wrong_answer_2', '$wrong_answer_3', '$id_test', '$id_kurs', '$type_question','$number_question')");
}


// echo($number);
// mysqli_query($connect,"INSERT INTO `test` (`id_question`, `question`, `true_answer`, `true_answer_2`, `true_answer_3`, `wrong_answer`, `wrong_answer_2`, `wrong_answer_3`, `id_lesson`, `id_kurs`, `type_question`) VALUES (NULL, '', '', NULL, NULL, '', '', '', NULL, '', '')");
header('Location:../../front/test/add_test.php?id='.$id_lesson);


// if($type_question=='check' &&(!empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
// }
// if($type_question=='check' &&(empty($answer_1)) &&(!empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
// }
// if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(!empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
// }
// if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(!empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){
 
// }
// if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(!empty($answer_5)) &&(empty($answer_6) ){
 
// }
// if($type_question=='check' &&(empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(!empty($answer_6) ){
 
// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) &&(empty($answer_3) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_6) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) &&(empty($answer_2) &&(empty($answer_3) &&(empty($answer_5)) &&(empty($answer_6) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_5)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_3)) &&(empty($answer_6) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_6)) &&(empty($answer_2) &&(empty($answer_4) &&(empty($answer_5)) &&(empty($answer_3) ){

// }



// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_6)) ){

// }


// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) ){

// }
// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_6)) ){

// }

// if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_4)) && (!empty($answer_6)) ){

// }


// if($type_question=='check' &&(!empty($answer_5)) && (!empty($answer_6)) ){

// }


// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_3)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_4)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_2)) && (!empty($answer_6)) ){

// }

// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_4)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_3)) && (!empty($answer_6)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_4)) && (!empty($answer_6)) ){

// }
// if($type_question=='check' &&(!empty($answer_1)) && (!empty($answer_5)) && (!empty($answer_6)) ){

// }


// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_4)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_3)) && (!empty($answer_6)) ){

// }

// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_4)) && (!empty($answer_6)) ){

// }
// if($type_question=='check' &&(!empty($answer_2)) && (!empty($answer_5)) && (!empty($answer_6)) ){

// }


// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_5)) ){

// }
// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_4)) && (!empty($answer_6)) ){

// }
// if($type_question=='check' &&(!empty($answer_3)) && (!empty($answer_5)) && (!empty($answer_6)) ){

// }