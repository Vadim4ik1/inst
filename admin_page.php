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
      $user_id=$users[1];
      $user_gr=$users[13];
     }
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
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
  </script>
    
    <title>Document</title>
</head>

<body class="body-white">
<header class="header">
    <div class="container-up">
      <div>
      <!-- <div class="podcont-up" style="display: flex;align-items:center;margin-left:10px; padding-right:5px;">  -->
       
      <img style="border-radius:30px;" src="<?=$user_pic?>" width="50px" alt=""></div>
      <div style="width: 10px;"></div>
      <?php echo($_SESSION['user']['fio']);?>
      </div>  
      <div>
        <img src="style/img/image5.png" alt="">
        </div>
</div>
</header>



  <div class="sidenav">
  <div class="hr"> <hr>
 </div>


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

  <div class="hr"> <hr> </div>  <?php } ?>
  <a href="front/otchet/otchet_fordir.php">ОТЧЕТ</a>
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
<!-- <a href="front/group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div> -->

<a href="inc/singup/logout.php">ВЫЙТИ</a>
</div>





<!-- <a href="front/signinup/signup.php">войти</a> -->


<div class="main">
  <div class="box-inmain">
<h1 class="name-of">
    Личный кабинет
  </h1>
  <a class="button-inlec-back" href="front/people/edit_people_user.php?id=<?=$id_user?>">Редактировать</a>
  </div>
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
     <p><?php if($users[4]=="admin"){?>
      Администратор
     <?php } if($users[4]=="student"){?>
      Студент гр. <?= $users[13] ?>
     <?php } if($users[4]=="prepod"){?>
    Преподаватель
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
  
  <div class="circle">
  
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
       if($uspevaem==0){
         $usprevaem=0;
       }
       $gotov=ceil($uspevaem*100);
       ?>
        <!-- <span> Успеваемость</span>
      <span><?= ceil($uspevaem*100) ?>% </span> -->
  
  <?php 
  $circle_1=$uspevaem;
  $shetchik_1=$uspevaem*100;
  ?>
  
  Успеваемость 
  <div id="circle-container_1" style="display: flex;"> <div class="contador_1">
  </div><!-- .contador --><script>
    var $numero_1 = <?= $shetchik_1?>;
  $(".contador_1").html($numero_1);
  
  $inicio_porcentagem_1 = 0;
  $fim_porcentagem_1 = $('.contador_1').html();
  
  setInterval(function(){ 
    $(".contador_1").html($inicio_porcentagem_1);
    if($inicio_porcentagem_1 < $fim_porcentagem_1){
      $inicio_porcentagem_1 = $inicio_porcentagem_1 + 1;
    }
  }, 20);
  </script> </div>
          <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
          </script>
        <script>
          var
           circleBar1 = new ProgressBar.Circle('#circle-container_1', {
      color: 'red',
      strokeWidth: 4,
      trailWidth: 60,
      trailColor: 'black',
      easing: 'easeInOut'
  });
  
  circleBar1.animate(<?=$circle_1?>, {
      duration: 2500
  });
  </script>
  
  </div>
  
  
  <div class="circle">
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
    $kolvoitogtest=0;
    $proc_itog_test=0;
    $kolvoitogtest_true=0;
      $prittest = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_itog` WHERE `id_user`='$user_id'");
       $prittest = mysqli_fetch_all($prittest);
       if(empty($prittest)){?>
        <span> Пройденных курсов</span>
        <span> 0% </span>
      <?php }else{   
       foreach ($prittest as $prittest) {
        $kolvoitogtest_true++;
        } 
        // echo($kolvokurs);
        $proc_itog_test=($kolvoitogtest_true*100)/$kolvokurs;
        $gotov=$gotov+ceil($proc_itog_test); ?>
  
        <!-- <span><?=  $kolvoitogtest_true ?> Проценты <?= ceil($proc_itog_test) ?>% </span> -->
      <?php }?> 
      <?php 
              $circle_2=$kolvoitogtest_true/10;
              $shetchik_2=$proc_itog_test/100;
      
      ?>
      Пройденных курсов
  <div id="circle-container_2"> <div class="contador_2">
  </div><!-- .contador --> <script>
    var $numero_2 = <?= $shetchik_2?>;
  $(".contador_2").html($numero_2);
  
  $inicio_porcentagem_2 = 0;
  $fim_porcentagem_2 = $('.contador_2').html();
  
  setInterval(function(){ 
    $(".contador_2").html($inicio_porcentagem_2);
    if($inicio_porcentagem_2 < $fim_porcentagem_2){
      $inicio_porcentagem_2 = $inicio_porcentagem_2 + 1;
    }
  }, 4);
  </script> 
  </div>
          <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
          </script>
        <script>
          var
           circleBar4 = new ProgressBar.Circle('#circle-container_2', {
      color: 'red',
      strokeWidth: 4,
      trailWidth:60,
      trailColor: 'black',
      easing: 'easeInOut'
  });
  
  circleBar4.animate(<?=$circle_2?>, {
      duration: 1500
  });
  </script>
  </div>
  
  
  
  
  
  <div class="circle">
    <?php  $reshen_test=0;
     $prittest = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_history` WHERE `id_user`='$user_id'");
       $prittest = mysqli_fetch_all($prittest);
       foreach ($prittest as $prittest) {
            $reshen_test++;
        } ?>
  
     <?php 
          $circle_3=$reshen_test/10;
          $shetchik_3=$reshen_test;
     
     ?>Решенных тестов 
     <div id="circle-container_3"><div class="contador_3">
  </div><!-- .contador --> <script>
    var $numero_3 = <?= $shetchik_3?>;
  $(".contador_3").html($numero_3);
  
  $inicio_porcentagem_3 = 0;
  $fim_porcentagem_3 = $('.contador_3').html();
  
  setInterval(function(){ 
    $(".contador_3").html($inicio_porcentagem_3);
    if($inicio_porcentagem_3 < $fim_porcentagem_3){
      $inicio_porcentagem_3 = $inicio_porcentagem_3 + 1;
    }
  }, 4);
  </script></div>
          <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
          </script>
        <script>
          var
           circleBar3 = new ProgressBar.Circle('#circle-container_3', {
      color: 'red',
      strokeWidth: 4,
      trailWidth: 100,
      trailColor: 'black',
      easing: 'easeInOut'
  });
  
  circleBar3.animate(<?=$circle_3?>, {
      duration: 1500
  });
  </script>
  </div>
  
  
  
  <div class="circle">
      <?php
    
       $sred_ball=0;   
       $ocenki=0;
       $srednily_ball=0;
        $srb = mysqli_query($connect, "SELECT * FROM `ball` WHERE `id_user`='$user_id' ");
        $srb = mysqli_fetch_all($srb);
        if(!empty($srb)){
       foreach ($srb as $srb) {
        $sred_ball++;
        $ocenki = $ocenki+$srb[3];
       } 
       $srednily_ball=$ocenki/$sred_ball;}
       else{
        $srednily_ball=0; 
       }
       $circle_4=$srednily_ball/10;
       $shetchik_4=$srednily_ball;
  
    ?>
    
  
  
    Средний балл
    <div id="circle-container_4"> <div class="contador_4">
  </div><!-- .contador --> <script>
    var $numero_4 = <?= $shetchik_4?>;
  $(".contador_4").html($numero_4);
  
  $inicio_porcentagem_4 = 0;
  $fim_porcentagem_4 = $('.contador_4').html();
  
  setInterval(function(){ 
    $(".contador_4").html($inicio_porcentagem_4);
    if($inicio_porcentagem_4 < $fim_porcentagem_4){
      $inicio_porcentagem_4 = $inicio_porcentagem_4 + 1;
    }
  }, 1);
  </script></div>
          <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
          </script>
        <script>
          var
           circleBar4 = new ProgressBar.Circle('#circle-container_4', {
      color: 'red',
      strokeWidth: 4,
      trailWidth: 10,
      trailColor: 'black',
      easing: 'easeInOut'
  });
  
  circleBar4.animate(<?=$circle_4?>, {
      duration: 1500
  });
  </script>
  </div>
  
  
      
  
  
  
  
  
  
  
  
  <div class="circle">
  <?php $circle_5=(($gotov/2)+ $srednily_ball)/100;
        $shetchik_5=($gotov/2)+ $srednily_ball;
  ?>
   
  <!-- <div class="box">
    <div class="box-inner">
        <span>Готовый сотрудник</span>
      <span><?= ($gotov/2)+ $srednily_ball ?>%</span>
    </div>
  </div> -->Готовый сотрудник
  <div id="circle-container_5"> <div class="contador_5">
  </div><!-- .contador --> <script>
    var $numero =<?= $shetchik_5?>;
  $(".contador_5").html($numero);
  
  $inicio_porcentagem = 0;
  $fim_porcentagem = $('.contador_5').html();
  
  setInterval(function(){ 
    $(".contador_5").html($inicio_porcentagem);
    if($inicio_porcentagem < $fim_porcentagem){
      $inicio_porcentagem = $inicio_porcentagem + 1;
    }
  }, 30);
  </script></div>
          <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js">
  
          </script>
        <script>
          var
           circleBar = new ProgressBar.Circle('#circle-container_5', {
      color: 'red',
      strokeWidth: 4,
      trailWidth: 10,
      trailColor: 'black',
      easing: 'easeInOut'
  });
  
  circleBar.animate(<?=$circle_5?>, {
      duration: 1500
  });
  </script>
  </div>
  </div>     <?php } ?>
  <?php if($status=="admin" || $status=="prepod"){ ?>
    <h3>Памятка для преподавателей</h3>
    <div class="obsh">
     Мы выпускаем готовых сотрудников, которые могут помочь развиться нашей компании, они прекрасные люди, не стоит на них агрессировать, лучше заварите чай с ромашкой и остыньте. Будьте здоровы!
  </div>
</div>

     <?php }?>
</body>
</html> 