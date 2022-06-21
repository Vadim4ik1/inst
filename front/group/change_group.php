<?php
session_start();
require_once '../../connect/connect.php';
$group=$_GET['id'];
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
  <div class="box-inmain">             
 <h1 class="name-of">Управление группой</h1>
 <a class="button-inlec-back" href="group.php">Назад</a>
</div>

      <form style="display:grid; justify-content: center;" action="../../inc/group/update.php" method="post" enctype="multipart/form-data">
        <?php $term = mysqli_query($connect, "SELECT * FROM `group` WHERE `name`='$group' ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {
            ?>
        <input type="hidden" name="id" value="<?=$term[0]?>">
        Название группы : <input type="text" name="group" value="<?=$term[1]?>"> <br>
        Преподаватель :
        <select name="prepod" id="">
          <?php 
                      $pr = mysqli_query($connect, "SELECT * FROM `user` where `status`='prepod' ");
                        $pr = mysqli_fetch_all($pr);
                        foreach ($pr as $pr) {
                            ?>
          <option value="<?=$pr[1]?>"><?=$pr[1]?></option>
          <?php } ?>

        </select>
        <div style="margin-top: 30px;" class="butons-update">
          <input class="button-inlec-back" type="submit" value="Сохранить">
          <a class="button-inlec-back" href="../../inc/group/delete.php?id=<?=$term[0]?>">Удалить</a>
        </div>
    </div>
    <?php }?>



</body>

</html>