
<?php
session_start();
unset($null);
require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_user=$_SESSION['user']['id_user'];
$user_id=$_SESSION['user']['fio'];
$user_gr=$_SESSION['user']['groupp'];
$users = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
$users = mysqli_fetch_all($users);
foreach ($users as $users) {
  $status = $users[4];
  $user_pic=$users[3];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/normalize.css">
    <link rel="stylesheet" href="../../style/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body class="body-white">

    <header class="header">
        <div class="container-up">
            <div>
                <!-- <div class="podcont-up" style="display: flex;align-items:center;margin-left:10px; padding-right:5px;">  -->

                <img style="border-radius:30px;" src="../../<?=$user_pic?>" width="50px" alt=""></div>
            <div style="width: 10px;"></div>
            <?php echo($_SESSION['user']['fio']);?>
        </div>
        <div>
            <img src="../../style/img/image5.png" alt="">
        </div>
        </div>
    </header>
    <div class="sidenav">
        <div class="hr">
            <hr>
        </div>


        <a  href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="../people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div> 
  <?php } ?>
  <a   href="../kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="../test/tests.php">ТЕСТЫ</a>
  <?php } ?>
  <div class="hr"> <hr> </div>
  <a href="../otchet/otchet_fordir.php">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a   href="../term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a   href="../group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a  style="color:red;" href="admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
  <div class="hr"> <hr> </div>
<a href="../kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a href="../help/help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="../group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="../../inc/singup/logout.php">ВЫЙТИ</a>
    </div>


    <div class="main">

        <h1 class="name-of">Добавление нового человека 
        </h1>
<div class="block-inedit">
<form action="../../inc/register/register.php" method="post" enctype="multipart/form-data">
<p>ФИОᅠᅠ<input type="text" name="fio"></p>
<p>Дата рожденияᅠᅠ<input type="date" name="date_born"></p>
<p>Должностьᅠᅠ
<select name="status">
<option value="student">Студент</option>
<option value="prepod">Преподаватель</option>
<option value="admin">Администратор</option>
</select></p>


<p>Город ᅠᅠ<input type="text" name="city"></p>
<p>Телефон ᅠᅠ<input type="text" name="phone"></p>
<p>Почтаᅠᅠ<input type="email" name="email"></p>
<p>Логинᅠᅠ<input type="text" name="login"></p>
<p>Пароль ᅠᅠ<input type="password" name="password"></p>
Группаᅠᅠ
<select name="groupp" id="">
	<option value="<?= $null?>">Нет группы</option>
<?php $gr = mysqli_query($connect, "SELECT * FROM `group` ");
		$gr = mysqli_fetch_all($gr);
		foreach ($gr as $gr) { ?>
<option value="<?=$gr[1]?>"><?=$gr[1]?></option>
<?php }?></select>
<div class="but-in-test">
<button type="submit" class="button-inlec-back">Добавить</button></div>

</form>
</div>