<?php
session_start();

require_once '../../connect/connect.php';

$id_kurs = $_GET['id'];
mysqli_query($connect,"DELETE FROM `kurs` WHERE `id_kurs` = $id_kurs");
header('Location:../../front/kurs/kurses.php');
?>