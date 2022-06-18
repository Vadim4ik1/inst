<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];

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
 
    <div class="container-up">
      <div class="podcont-up" style="display: flex;align-items:center;margin-left:10px; padding-right:5px;"> 
       
      <img style="border-radius:30px;" src="../../<?=$user_pic?>" width="50px" alt="">
      <div style="width: 10px;"></div>
      <?php echo($_SESSION['user']['fio']);?>
      </div>
        <img src="../../style/img/image5.png" alt="">
        
</div>
  <div class="sidenav">
  <div class="hr"> <hr> </div>


  <a  href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a style="color:red;" href="allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
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
<div class="main">
  <div class="pust-blok">
    
  </div>
<?php 
$people = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {

            ?>
<form action="../../inc/people/update_pass.php"  method="post" enctype="multipart/form-data">
         
            
            <p style="margin-left:20%;">Новый пароль <input type="text" name="password" value=""></p>
            <input type="hidden" name="id" value="<?=$people[0]?>">


            <div class="butons-update">
<input type="submit" class="button-inlec-back" value="СОХРАНИТЬ">
<a class="button-inlec-back" href="allpeople.php" value="Назад">НАЗАД</a>
</div>
</form>
            <?php }?>
            
</body>
</html>
