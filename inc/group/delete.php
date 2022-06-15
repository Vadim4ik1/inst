<?php
session_start();

require_once '../../connect/connect.php';

$id = $_GET['id'];
mysqli_query($connect,"DELETE FROM `group` WHERE `id` = $id ");
header('Location:../../front/group/group.php');
?>