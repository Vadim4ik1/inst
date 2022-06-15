<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

echo($name);
echo($text);
$name=$_POST['name'];
$user=$_SESSION['user']['fio'];
$text=$_POST['text'];
$lesson=$_POST['lesson'];
echo($name);
echo($text);
mysqli_query($connect,"INSERT INTO `term` (`id_term`, `worth`, `description`, `user`,`lesson`) VALUES (NULL, '$name', '$text', '$user','$lesson')");
header('Location:../../front/term/term.php');


?>