<?php
session_start();
require_once '../../connect/connect.php';
$user_id=$_SESSION['user']['fio'];
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
  <a  style="color:red;" href="#">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
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
  <div class="pust-blok">
    
  </div>
  <?php 
        $term = mysqli_query($connect, "SELECT * FROM `group` WHERE `prepod`='$user_id' ");
		$term = mysqli_fetch_all($term);

		foreach ($term as $term) {
            $user_gr=$term[1];
 
            ?>
             <a href="uprav.php?id=<?=$term[1]?>"><?=$term[1]?></a>


    <?php 
    $kolvo3=0;
    $kolvo4=0;
    $kolvoingr=0;
    $uspevaem=0;
    echo($user_gr);
    $peop = mysqli_query($connect, "SELECT * FROM `user` WHERE `groupp`='$user_gr'");
    $peop = mysqli_fetch_all($peop);
   
    foreach ($peop as $peop) {
        $nujniy_chel=$peop[1];
      $kolvoingr++;
     }
      $usp = mysqli_query($connect, "SELECT * FROM `ball` WHERE  `id_user`='$nujniy_chel'  ");
      $usp = mysqli_fetch_all($usp);
     foreach ($usp as $usp) {
      if($usp[3]=="3"){
        $kolvo3++;
      }
      if($usp[3]=="4"){
        $kolvo4++;
      }
      if($usp[3]=="5"){
        $kolvo5++;
      }
     } 
     echo($uspevaem);
     $uspevaem=($kolvo3+$kolvo4+$kolvo5)/$kolvoingr;
     if($uspevaem==0){
       $usprevaem=0;
     }
     $gotov=ceil($uspevaem*100);
     ?>
      <span> Успеваемость</span>
    <span><?= ceil($uspevaem*100) ?>% </span>  <?php }?>
  </div>          
</div>
</body>
</html>