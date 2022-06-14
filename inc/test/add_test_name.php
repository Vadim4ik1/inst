<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];
$test_name=$_POST['test_name'];
// echo($id_lesson);
// echo($id_kurs);
// echo($test_name);


// echo($test_name);
mysqli_query($connect,"INSERT INTO `test_name` (`id_test`, `test_name`, `id_kurs`, `id_lesson`) VALUES (NULL, '$test_name', '$id_kurs', '$id_lesson')");

$oik = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `test_name`='$test_name' AND `id_kurs`='$id_kurs' ");
$oik = mysqli_fetch_all($oik);
foreach ($oik as $oik) {
   $id_test=$oik[0];
   echo($id_test);
 }

header('Location:../../front/test/add_test.php?id='.$id_test);