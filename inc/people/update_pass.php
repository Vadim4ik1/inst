<?php
session_start();

require_once '../../connect/connect.php';
$id=$_POST['id'];
$password=$_POST['password'];



$password=md5($password);

mysqli_query($connect,"UPDATE `User`  SET `password`='$password' WHERE `id_user`='$id'");
// $_SESSION['message'] = 'Данные успешно изменены';
header('Location:../../front/people/allpeople.php');
?>