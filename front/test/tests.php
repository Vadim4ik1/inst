<?php
session_start();
require_once '../../connect/connect.php';
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
  <a style="color:red;"  href="tests.php">ТЕСТЫ</a>
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
  <h1 class="name-of">Список тестов
  </h1>
  <table class="tablica-user">
    <tr>
      <td>№</td>
      <td>Название</td>
      <td>Раздел</td>
      <td>Лекция</td>
      <td>Вопросов</td>

    </tr>
   
    <?php $cifra=0;
     $test = mysqli_query($connect, "SELECT * FROM `test_name` ");
		$test = mysqli_fetch_all($test);
		foreach ($test as $test) {
            $cifra++; 
                        ?>
            <tr>
            <td> <?=$cifra ?></td>
      <td> <?=$test[1] ?></td>
      <td>    
        <?php 
         $id_test=$test[0];
        $id_kurs=$test[2];
        $id_lesson=$test[3];
        $les = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `id_kurs`='$id_kurs' ");
		$les = mysqli_fetch_all($les);
		foreach ($les as $les) {
            echo($les[1]);
        } ?> </td>
    <td>    
        <?php 
        $lec = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`='$id_lesson' ");
		$lec = mysqli_fetch_all($lec);
		foreach ($lec as $lec) {

            echo($lec[1]);
        } ?> </td> <td>
        <?php 
        $te = mysqli_query($connect, "SELECT COUNT(*)  FROM `test` WHERE `id_test`='$id_test' ");
        $te = mysqli_fetch_all($te);
		foreach ($te as $te) {
            echo($te[0]);
        } ?>
     </td>

      <td>   <form action="../test/edit_test.php" enctype="multipart/form-data" method="POST">
              <input type="hidden" value="<?=$id_test?>" name="id_test">
              <input type="hidden" value="<?=$id_lesson?>" name="id_lesson">
              <input type="submit" value="Изменить">
          </form>
        </td>
      <!-- <td  class="drop<?= $test[0]?>">Действия
          <div style="display:none;	box-shadow: 0 4px 10px rgba(10, 20, 30, .4); position:absolute; background:#fff;" class="dropdown<?= $test[0]?>">   
       
      <a class="link-inpeople" href="edit_test.php?id=">Редактировать</a> -->
        </div>  
     </td>      
     </tr>
     <script>
    $(".drop<?= $test[0]?>")
  .mouseover(function() {
  $(".dropdown<?= $test[0]?>").show(300);
});
$(".drop<?= $test[0]?>")
  .mouseleave(function() {
  $(".dropdown<?= $test[0]?>").hide(300);     
});

</script>
    <?php }?>  
    
  </table>
 </div>


            </body>
</html> 
