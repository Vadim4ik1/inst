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
  <div class="hr"> <hr> </div>


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
  <a  style="color:red;"  href="term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="../group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="../signinup/admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
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
<div class="box-inmain">             
 <h1 class="name-of">Изменение термина</h1>
 <a class="button-inlec-back" href="term.php">Назад</a>
</div>
  <div class="secion-add" >
<form action="../../inc/term/update_term.php" method="post" enctype="multipart/form-data">
<?php 
$term = mysqli_query($connect, " SELECT * FROM `term` WHERE `id_term` = '$id' ");
$term = mysqli_fetch_all($term);
foreach ($term as $term) {
    $lesson_true=$term[4];
    echo($term[4]); ?>
<input type="hidden" name="id_term" value="<?= $term[0] ?>">
<p>Термин
    <input type="text" name="name" value="<?= $term[1] ?>"></p>
<p>Объяснение
  <textarea  name="text" id="" cols="10" rows="5"><?= $term[2] ?></textarea>
   </p>
            <?php }?>
        <select name="lesson" id="">
       <?php $les = mysqli_query($connect, " SELECT * FROM `lesson` ");
        $les = mysqli_fetch_all($les);
        foreach ($les as $les) {
           
      if($lesson_true==$les[1]){ ?>
        <option selected value="<?= $les[1]?>"><?=$les[1]?></option>
    <?php  }else{?>
        <option  value="<?= $les[1]?>"><?=$les[1]?></option>
     
    
 <?php  } }?>
</select>
<div class="but-in-test">
<button type="submit" class="button-inlec-back">Cохранить</button></div>
            </div>
            </form>

</body>
</html>

