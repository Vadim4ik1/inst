<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_user=$_POST['id_user'];
$group=$_POST['group'];

// echo($id_user."sndkja");
// echo($group);
mysqli_query($connect,"UPDATE `User` SET `groupp`='$group' WHERE `id_user`='$id_user' ");
header('Location:group.php');


?>