<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];
$number=$_POST['number'];
echo("Id Лекции: ");
echo($id_lesson);
echo("Порядковый номер: ");
echo($number);

mysqli_query($connect,"UPDATE `lesson` SET `number`='$number' WHERE `id_lesson`='$id_lesson' ");
// header('Location:../../front/kurs/edit_kurs.php?id='.$id_kurs);


?>