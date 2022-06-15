<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$prepod=$_POST['prepod'];
$group=$_POST['group'];
$id=$_POST['id'];
// echo($id_user."sndkja");
// echo($group);
mysqli_query($connect,"UPDATE `group` SET `name`='$group',`prepod`='$prepod' WHERE `id`='$id' ");
header('Location:../../front/group/group.php');


?>