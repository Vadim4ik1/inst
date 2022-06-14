<?php
session_start();

require_once '../../connect/connect.php';
$fio=$_POST['fio'];
$date_born=$_POST['date_born'];
$date_born=date("Y-m-d", strtotime($date_born));
$status=$_POST['status'];
$city=$_POST['city'];
$phone=$_POST['phone'];
$date_reg=$today = date("Y-m-d H:i:s"); 
$email=$_POST['email'];
$login=$_POST['login'];
$password=$_POST['password'];
$password=md5($password);
// $groupp=$_POST['groupp'];

$path='uploads/Umolch.jpeg';
mysqli_query($connect,"INSERT INTO `User` (`id_user`,`fio`, `date_born`, `picture`, `status`, `city`, `phone`, `email`, `login`, `password`, `date_reg`, `test_kolvo`, `kurs_kolvo`, `groupp`, `level`) VALUES (NULL,'$fio', '$date_born', '$path', '$status', '$city', '$phone', '$email', '$login', '$password', '$date_reg', NULL, NULL, NULL, NULL)");


print($fio);
print("\r");
print($date_born);
print("\r");
print($path);
print("\r");
print($status);
print("\r");
print($city);
print("\r");
print($phone);
print("\r");
print($email);
print("\r");
print($login);
print("\r");
print($password);
print("\r");
print($date_reg);
print("\r");
print($groupp);


header('Location:../../index_.php');
?>