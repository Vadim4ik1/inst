<?php
session_start();

require_once '../../connect/connect.php';

$id = $_GET['id'];

mysqli_query($connect,"DELETE FROM `user` WHERE `id_user` = $id ");
header('Location:../../front/people/allpeople.php');
?>