<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_lesson=$_POST['id'];

$name=$_POST['name'];
$text=$_POST['text'];
// $video=$_POST['video'];
// echo($video);

// if(!empty($video)){
//     $path_n='../../uploads/'.time().$_FILES['video']['name'];
//     move_uploaded_file($_FILES['video']['tmp_name'],'../'.$path_n);
// }else{
//   $path_n=NULL;  
// }



// echo($name);
// echo($creator);
// echo($text);
// echo($path_n);
// echo($video);

mysqli_query($connect,"UPDATE `lesson` SET `name`='$name',`text`='$text' WHERE `id_lesson`='$id_lesson' ");
header('Location:../../front/lesson/lesson.php?id='.$id_lesson);


?>