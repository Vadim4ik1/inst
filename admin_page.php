<?php 
session_start();
require_once 'connect/connect.php';
// if(isset($user['status'])){
//     header('Location: index.php');
//     }
$id_user=$_SESSION['user']['id_user'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>

<body>
    <div class="container-up">
    <?php echo($_SESSION['user']['fio']);?>
        <img src="style/img/image5.png" alt="">
    </div>
    <div class="sidenav">
  <div class="hr"> <hr> </div>
  <a href="#about"><?= $_SESSION['user']['groupp']?></a>
  <div class="hr"> <hr> </div>
  <a style="color:red;" href="#services">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <a href="front/people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div>
  <a href="front/kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <a href="#contact">ТЕСТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/otchet/otchet_fordir.php">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="front/group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/help/help.php">Вопросы</a>
<div class="hr"> <hr> </div>
  <a href="front/signinup/admin_signin.php">зарегать человека</a>
  <div class="hr"> <hr> </div>
<a href="front/kurs/add_kurs.php">Добавить курс</a>
<div class="hr"> <hr> </div>
<a href="front/signinup/signin.php">Удалить курс</a>
<div class="hr"> <hr> </div>
<a href="front/help/help.php">Вопросы</a>
<div class="hr"> <hr> </div>
<a href="inc/singup/logout.php">выйти</a>
</div>





<!-- <a href="front/signinup/signup.php">войти</a> -->


<div class="main">
 <div class="container-osnova">
 <?php 
     $users = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
     $users = mysqli_fetch_all($users);
     foreach ($users as $users) {?>
   <div class="avatar">
     <img style="border-radius:30px;" src="<?=$users[3]?>" width="250px" alt="">
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
   </div>
  <?php }?>
 </div>
</div>
     
</body>
</html> 