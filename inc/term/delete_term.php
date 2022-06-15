<?php
session_start();

require_once '../../connect/connect.php';

$id = $_GET['id'];
mysqli_query($connect,"DELETE FROM `term` WHERE `id_term` = $id ");
header('Location:../../front/term/term.php');
?>