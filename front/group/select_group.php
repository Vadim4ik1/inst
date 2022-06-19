<?php
session_start();
require_once '../../connect/connect.php';
$user_id=$_SESSION['user']['fio'];
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
  <a href="../kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="../test/tests.php">ТЕСТЫ</a>
  <?php } ?>
  <div class="hr"> <hr> </div>
  <a href="../otchet/otchet_fordir.php">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="../term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="../group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="../signinup/admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
  <div class="hr"> <hr> </div>
<a    href="../kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a   href="../help/help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a style="color:red;" href="select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="../../inc/singup/logout.php">ВЫЙТИ</a>
    </div>


    <div class="main">
        <h1 class="name-of">Термин
        </h1> 
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