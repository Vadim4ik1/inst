<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

$group=$_POST['group'];
$prepod=$_POST['prepod'];
echo($group.$prepod);
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
mysqli_query($connect,"INSERT INTO `group` (`id`,`name`, `prepod`) VALUES (NULL, '$group', '$prepod')");
header('Location:../../front/group/group.php');


?>