<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

$id_kurs=$_POST['id'];
$name=$_POST['name'];
$creator=$_SESSION['user']['fio'];
$text=$_POST['text'];
$number=$_POST['number'];

// $video=$_POST['video'];
// echo($video);

// if(!empty($video)){
//     $path_n='../../uploads/'.time().$_FILES['video']['name'];
//     move_uploaded_file($_FILES['video']['tmp_name'],'../'.$path_n);
// }else{
//   $path_n=NULL;  
// }


// echo($id_kurs);
// echo($name);
// echo($creator);
// echo($text);

// echo($video);

// echo($number);
mysqli_query($connect,"INSERT INTO `lesson` (`id_lesson`, `name`, `text`, `creator`, `id_kurs`,`number`) VALUES (NULL, '$name', '$text', '$creator', '$id_kurs','$number')");
header('Location:../../front/kurs/edit_kurs.php?id='.$id_kurs);


?>