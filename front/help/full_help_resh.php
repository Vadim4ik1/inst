<?php 
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
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
  <a href="#contact">ОТЧЕТЫ</a>
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
<?php $ms = mysqli_query($connect, "SELECT * FROM `messages` WHERE `thema`='$id' ORDER BY `time` ");
		$ms = mysqli_fetch_all($ms);
		foreach ($ms as $ms) {
         $thema=$ms[1];
         $to=$ms[3];
         if($user_id=="to"){
            $to=$ms[4]; 
         }
         ?>
    <p><?=$ms[3]?>:<?=$ms[2]?></p><br>
      <?php  } ?>

<form action="../../inc/help/add_msg.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="to" value="<?=$to?>">
<input type="hidden" name="thema" value="<?= $thema?>">    
<!-- <input type="submit/ "> -->
     
        </form>

       

  
  
  <!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->
 </div>
  
  </body>
  
  
  </html>
 
</body>
</html> 