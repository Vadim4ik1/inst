<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');

echo($name);
echo($text);
$name=$_POST['name'];
$user=$_SESSION['user']['fio'];
$text=$_POST['text'];
echo($name);
echo($text);
mysqli_query($connect,"INSERT INTO `term` (`id_term`, `worth`, `description`, `user`) VALUES (NULL, '$name', '$text', '$user')");
header('Location:../../front/term/term.php');


?>