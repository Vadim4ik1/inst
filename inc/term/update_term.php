<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_term=$_POST['id_term'];
$name=$_POST['name'];
$text=$_POST['text'];
$lesson=$_POST['lesson'];

mysqli_query($connect,"UPDATE `term` SET `lesson`='$lesson', `worth`='$name',`description`='$text'  WHERE `id_term`='$id_term' ");
header('Location:../../front/term/term.php');


?>