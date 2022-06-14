<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_kurs=$_POST['id_kurs'];

$name=$_POST['name'];


mysqli_query($connect,"UPDATE `kurs` SET `name`='$name' WHERE `id_kurs`='$id_kurs' ");
header('Location:../../front/kurs/kurs.php?id='.$id_kurs);


?>