<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

$name=$_POST['name_kurs'];
$date_reg=date("Y-m-d H:i:s"); 
$group=$_POST['group'];


mysqli_query($connect,"INSERT INTO `kurs` (`id_kurs`, `name`, `group`) VALUES (NULL, '$name', '$group')");
header('Location:../../front/kurs/kurses.php');


?>