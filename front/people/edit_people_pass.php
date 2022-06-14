<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
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
$people = mysqli_query($connect, "SELECT * FROM `User` WHERE `id_user`='$id' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {

            ?>
<form action="../../inc/people/update_pass.php" method="post" enctype="multipart/form-data">
            <p>
            
            <p>Новый пароль <input type="text" name="password" value=""></p>
            <input type="hidden" name="id" value="<?=$people[0]?>">


            <div class="butons-update">
<input type="submit" class="button-inlec-back" value="СОХРАНИТЬ">
<a class="button-inlec-back" href="allpeople.php" value="Назад">НАЗАД</a>
</div>
</form>
            <?php }?>
            
</body>
</html>
