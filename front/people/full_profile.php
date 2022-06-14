<?php
session_start();
require_once '../../connect/connect.php';
$id_user=$_GET['id'];
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

<body>
    <div class="container-up">
        <img src="../../style/img/image5.png" alt="">
    </div>
    <div class="sidenav">
  <div class="hr"> <hr> </div>
  <a href="#about"><?= $_SESSION['user']['groupp']?></a>
  <div class="hr"> <hr> </div>
  <a href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <a  style="color:red;" href="allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div>
  <a href="../kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <a href="#contact">ТЕСТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="#contact">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="../term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="../group/group.php">ГРУППЫ</a>
  <a href="../signinup/admin_signin.php">зарегать человека</a> <br>
<a href="../kurs/add_kurs.php">Добавить курс</a> <br>
<a href="../signinup/signin.php">Удалить курс</a> <br>
<a href="../inc/singup/logout.php">выйти</a>
</div>

  <div class="main">
 <div class="container-osnova">
 <?php 
     $users = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
     $users = mysqli_fetch_all($users);
     foreach ($users as $users) {?>
   <div class="avatar">
     <img style="border-radius:30px;" src="../../<?=$users[3]?>" width="250px" alt="">
   </div>
   <div class="opisanie">
     <p><?=$users[1]?></p>
     <hr>
     <p>ДОЛЖНОСТЬ:<?=$users[4]?></p>
     <hr>
     <p>ПОЧТА: <?=$users[7]?></p>
     <hr>
     <p>ТЕЛ: <?=$users[6]?></p>
     <hr>
     <p>ПРОЙДЕНО ТЕСТОВ: <?=$users[6]?></p>
     <hr>
   </div>
  <?php }?>
 </div>
<div class="grafiki">


 <div class="box">
  <div class="box-inner">
      <span> Успеваемость</span>
    <span>68%</span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
      <span> Прочитанных лекций</span>
    <span>50%</span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
      <span> Решенных тестов</span>
    <span>33%</span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
      <span> Cредняя оценка</span>
    <span>5</span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
      <span>Готовый сотрудник</span>
    <span>42%</span>
  </div>
</div>

</div>
</div>
</body>
</html>

