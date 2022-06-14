<?php
session_start();

require_once '../../connect/connect.php';

$name=$_POST['name_kurs'];
$date_reg=date("Y-m-d H:i:s"); 
$password=$_POST['password'];
$creator=$user['fio'];
$prepod=$_POST['prepod'];
$prepod_2=$_POST['prepod_2'];
$prepod_3=$_POST['prepod_3'];

mysqli_query($connect,"INSERT INTO `kurs` (`id_kurs`, `name`, `date_reg`, `password`, `creator`, `prepod`) VALUES (NULL, '$name', '$date_reg', '$password', '$creator', '$prepod')");


?>