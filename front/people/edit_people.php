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
unset($null);
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
  <a style="color:red;"  href="allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
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
<a href="../kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a href="../help/help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="../group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="../../inc/singup/logout.php">ВЫЙТИ</a>
</div>


            <div class="main">
            <h1 class="name-of">
   Изменение профиля
  </h1>
<?php 
$people = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {

            ?>   <div class="obsh">
<form style="display:flex; line-height:40px;" action="../../inc/people/update_people.php" method="post" enctype="multipart/form-data">
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
            <p> Группа:</p>
   
            </div>
            <div class="second-update">
           <input class="input-update" name="fio" type="text" value="<?=$people[1]?>">
           <input class="input-update" name="dateborn" type="text" value="<?=$people[2]?>">
           
            <input style="margin-bottom: 10px;margin-top:-3px;" type="file" name="picture" >
            <!-- <img src="../../<?=$people[3]?>" alt=""> -->
             <input class="input-update" type="text" name="status" value="<?=$people[4]?>">
           <input  class="input-update" type="text" name="city" value="<?=$people[5]?>">
           <input class="input-update" type="text" name="phone" value="<?=$people[6]?>">
           <input  class="input-update" type="text" name="email" value="<?=$people[7]  ?>">
         <input  class="input-update" type="text" name="login" value="<?=$people[8]  ?>">
      
         <select name="groupp" id="">
           
            <option value="<?=$null?>">Нет группы</option>
                      <?php 
                      $gr = mysqli_query($connect, "SELECT * FROM `group` ");
                        $gr = mysqli_fetch_all($gr);
                        foreach ($gr as $gr) {
                           if($gr[1]==$user_gr){?>
                        <option selected value="<?=$gr[1]?>"><?=$gr[1]?></option>

                          <?php }else{?>
                                                    <option value="<?=$gr[1]?>"><?=$gr[1]?></option>

                       <?php   }
                           ?>
                        <?php } ?>

                    </select>
            </div></div>
<div class="butons-update">
<input type="submit" class="button-inlec-back" value="СОХРАНИТЬ">
<a class="button-inlec-back" href="allpeople.php" value="Назад">НАЗАД</a>

</div>

</form>

            <?php }?>
            
</body>
</html>

