<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

$thema=$_POST['thema'];
$text=$_POST['text'];
$author=$_SESSION['user']['fio'];
$to=$_POST['to'];
$status="neresh";

mysqli_query($connect,"INSERT INTO `messages` (`id`, `thema`, `text`, `author`, `to`, `status`, `time`) VALUES (NULL, '$thema', '$text', '$author', '$to', '$status', current_timestamp())");
header('Location:../../front/help/help.php');


?>