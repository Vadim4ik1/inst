<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$thema=$_POST['thema'];
$resh="resh";
// echo($id_test.$user_id);
// mysqli_query($connect,"INSERT INTO `test_history` (`type_test`) VALUES ('$type_test')");
mysqli_query($connect,"UPDATE `messages` SET `status`='$resh' WHERE `thema`='$thema'");
header('Location:../../front/help/help.php');