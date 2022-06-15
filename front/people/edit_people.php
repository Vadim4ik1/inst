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
$people = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {

            ?>   <div class="obsh">
<form style="display:flex;" action="../../inc/people/update_people.php" method="post" enctype="multipart/form-data">
            <p>
            <input type="hidden" name="id" value="<?=$people[0]?>">
         
            <div class="first-update">
            <p>ФИО:</p>
            <p>Дата рождения: </p>
            <p>Фотка: </p>
            <p> Должность </p>
            <p> Город: </p>
            <p> Телефон: </p>
            <p> Почта: </p>
            <p> Логин: </p>
            </div>
            <div class="second-update">
           <input class="input-update" name="fio" type="text" value="<?=$people[1]?>">
           <input class="input-update" name="dateborn" type="text" value="<?=$people[2]?>">
           
         <input style="margin-bottom: 10px;margin-top:-3px;" type="file" name="picture" src="../../<?=$people[3]?>" value="../../<?=$people[3]?>">
             <input class="input-update" type="text" name="status" value="<?=$people[4]?>">
           <input  class="input-update" type="text" name="city" value="<?=$people[5]?>">
           <input class="input-update" type="text" name="phone" value="<?=$people[6]?>">
           <input  class="input-update" type="text" name="email" value="<?=$people[7]  ?>">
         <input  class="input-update" type="text" name="login" value="<?=$people[8]  ?>">
            <!-- <p> Пароль <input type="text" value="<?=$people[9]?>"></p> -->
            <p> Перевести из  <input type="text" readonly  value="<?=$people[13]  ?>">
            В
            <select name="groupp" id="">
                      <?php 
                      $gr = mysqli_query($connect, "SELECT DISTINCT `groupp` FROM `user` ");
                        $gr = mysqli_fetch_all($gr);
                        foreach ($gr as $gr) {
                            ?>
                        <option value="<?=$gr[0]?>"><?=$gr[0]?></option>
                        <?php } ?>

                    </select></p>

            </div></div>
<div class="butons-update">
<input type="submit" class="button-inlec-back" value="СОХРАНИТЬ">
<a class="button-inlec-back" href="allpeople.php" value="Назад">НАЗАД</a>
</div>

</form>

            <?php }?>
            
</body>
</html>

