<?php
session_start();

require_once '../../connect/connect.php';
$id=$_POST['id'];
$fio=$_POST['fio'];

$dateborn=$_POST['dateborn'];
$status=$_POST['status'];
$city=$_POST['city'];

$phone=$_POST['phone'];
$email=$_POST['email'];
$login=$_POST['login'];
$groupp=$_POST['groupp'];
$picture=$_POST['picture'];

if(!empty($_FILES['picture']['name'])){
    $path='uploads/'.time().$_FILES['picture']['name'];
    move_uploaded_file($_FILES['picture']['tmp_name'],'../../'.$path);
    mysqli_query($connect,"UPDATE `user`  SET `fio`='$fio',`date_born`='$dateborn', `phone`='$phone', `email`='$email', `login`='$login', `groupp`='$groupp', `city`='$city',`status`='$status',`picture`='$path' WHERE `id_user`='$id'");
}
if(empty($picture)){
    mysqli_query($connect,"UPDATE `user`  SET `fio`='$fio',`date_born`='$dateborn', `phone`='$phone', `email`='$email', `login`='$login', `groupp`='$groupp', `city`='$city',`status`='$status' WHERE `id_user`='$id'");
}


// mysqli_query($connect,"UPDATE `user`  SET `fio`='$fio',`date_born`='$dateborn', `phone`='$phone', `email`='$email', `login`='$login', `groupp`='$groupp', `city`='$city',`status`='$status',`picture`='$path' WHERE `id_user`='$id'");
// $_SESSION['message'] = 'Данные успешно изменены';
header('Location:../../admin_page.php');
?>
