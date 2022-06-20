<?php
session_start();
require_once '../../connect/connect.php';

$login=$_POST['login'];
$password=md5($_POST['password']);
// print($login);
// print($password);

$checkuser=mysqli_query($connect,"SELECT * FROM `user` WHERE `login` = '$login' AND `password`='$password'");
if (mysqli_num_rows($checkuser) > 0) {
    $user = mysqli_fetch_assoc($checkuser);

    $_SESSION['user'] = [
        "id_user" => $user['id_user'],
        "fio" => $user['fio'],
        "status" => $user['status'],
        "groupp" => $user['groupp']
    ];
    // print($user['status']);
    if($user['status']=='admin'){
    header('Location: ../../admin_page.php');
    }
    if($user['status']=='student'){
        header('Location: ../../admin_page.php');
    }
    if($user['status']=='prepod'){
        header('Location: ../../admin_page.php');
    }
}
else {
    $_SESSION['message']= 'Неверный логин или пароль';
    header('Location: ../../index.php');
}
?>