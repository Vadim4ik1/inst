<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_test=$_POST['id_test'];
$user_id=$_SESSION['user']['fio'];
$type_test="ended";
// echo($id_test.$user_id);
// mysqli_query($connect,"INSERT INTO `test_history` (`type_test`) VALUES ('$type_test')");
mysqli_query($connect,"UPDATE `test_history` SET `type_test`='$type_test' WHERE `id_test`='$id_test' AND `id_user`='$user_id'");
header('Location:../../front/kurs/kurses.php');