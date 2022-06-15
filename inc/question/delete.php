<?php
session_start();

require_once '../../connect/connect.php';

$id_question = $_GET['id'];
mysqli_query($connect,"DELETE FROM `test` WHERE `id_question` = $id_question ");
header('Location:../../front/test/tests.php?');
?>
