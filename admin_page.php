<?php 
session_start();
require_once 'connect/connect.php';
// if(isset($user['status'])){
//     header('Location: index.php');
//     }
$id_user=$_SESSION['user']['id_user'];
$user_id=$_SESSION['user']['fio'];
$user_gr=$_SESSION['user']['groupp'];

$users = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
$users = mysqli_fetch_all($users);
foreach ($users as $users) {
  $status = $users[4];
  $user_pic=$users[3];}
$gotov=0;  

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

<body class="body-white">
 
    <div class="container-up">
      <div class="podcont-up" style="display: flex;align-items:center;margin-left:10px; padding-right:5px;"> 
       
      <img style="border-radius:30px;" src="<?=$user_pic?>" width="50px" alt="">
      <div style="width: 10px;"></div>
      <?php echo($_SESSION['user']['fio']);?>
      </div>
        <img src="style/img/image5.png" alt="">
        
</div>
  <div class="sidenav">
  <div class="hr"> <hr> </div>


  <a style="color:red;" href="#services">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="front/people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div> 
  <?php } ?>
  <a href="front/kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="front/test/tests.php">ТЕСТЫ</a>
  <?php } ?>
  <div class="hr"> <hr> </div>
  <a href="front/otchet/otchet_fordir.php">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="front/group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/signinup/admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
  <div class="hr"> <hr> </div>
<a href="front/kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a href="front/help/help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="front/group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="inc/singup/logout.php">ВЫЙТИ</a>
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
     <p>ДОЛЖНОСТЬ:<?php if($users[4]=="admin"){?>
      Администратор
     <?php } if($users[4]=="student"){?>
      Студент
     <?php } if($users[4]=="student"){?>
    Студент
    <?php }?> </p>
     <hr>
     <p>ПОЧТА: <?=$users[7]?></p>
     <hr>
     <p>ТЕЛ: <?=$users[6]?></p>
     <?php $status= $users[4]; ?>
     <hr>
   </div>
  <?php }?>
 </div>
 <?php if($status=="student"){ ?>
 <div class="grafiki">


 <div class="box">
  <div class="box-inner">
    <?php 
    $kolvo3=0;
    $kolvo4=0;
    $kolvoingr=0;
    $uspevaem=0;
    $peop = mysqli_query($connect, "SELECT * FROM `user` WHERE `groupp`='$user_gr'");
    $peop = mysqli_fetch_all($peop);
    foreach ($peop as $peop) {
      $kolvoingr++;
     }
      $usp = mysqli_query($connect, "SELECT * FROM `ball` WHERE `id_user`='$user_id' ");
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
     $uspevaem=($kolvo3+$kolvo4+$kolvo5)/$kolvoingr;
     $gotov=ceil($uspevaem*100);
     ?>
      <span> Успеваемость</span>
    <span><?= ceil($uspevaem*100) ?>% </span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
  <?php
  $kolvokurs=0;
  $kolvoitogtest=0;
   $prdk = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `group`='$user_gr'");
    $prdk = mysqli_fetch_all($prdk);
    foreach ($prdk as $prdk) {
      $kolvokurs++;

     $prittest = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_itog` WHERE `id_user`='$user_id'");
     $prittest = mysqli_fetch_all($prittest);
     foreach ($prittest as $prittest) {
        if($prdk[0]==$prittest[2]){
          $kolvoitogtest++;
      }
      }     
    }
    $prittest = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_itog` WHERE `id_user`='$user_id'");
     $prittest = mysqli_fetch_all($prittest);
     foreach ($prittest as $prittest) {
          $kolvoitogtest_true++;
      } 
      $proc_itog_test= ($kolvoitogtest_true*100)/$kolvokurs;
      $gotov=$gotov+ceil($proc_itog_test);
     ?>
      <span> Пройденных курсов</span>
      <span><?=  $kolvoitogtest_true ?> Проценты <?= ceil($proc_itog_test) ?>% </span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
  <?php  $reshen_test=0;
   $prittest = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_history` WHERE `id_user`='$user_id'");
     $prittest = mysqli_fetch_all($prittest);
     foreach ($prittest as $prittest) {
          $reshen_test++;
      } ?>
      <span> Решенных тестов</span>
    <span><?= $reshen_test ?></span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
    <?php
  
     $sred_ball=0;   
     $ocenki=0;
     $srednily_ball=0;
      $srb = mysqli_query($connect, "SELECT * FROM `ball` WHERE `id_user`='$user_id' ");
      $srb = mysqli_fetch_all($srb);

     foreach ($srb as $srb) {
      $sred_ball++;
      $ocenki = $ocenki+$srb[3];
     } 
     $srednily_ball=$ocenki/$sred_ball;
  ?>
      <span> Cредняя оценка</span>
    <span><?=  $srednily_ball ?></span>
  </div>
</div>
<div class="box">
  <div class="box-inner">
      <span>Готовый сотрудник</span>
    <span><?= ($gotov/2)+ $srednily_ball ?>%</span>
  </div>
</div>
<?php }?>
</div>
</div>
     
</body>
</html> 