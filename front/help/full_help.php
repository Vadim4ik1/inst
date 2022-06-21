<?php 
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
$user_id=$_SESSION['user']['fio'];
$id_user=$_SESSION['user']['fio'];
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
<a  style="color:red;" href="help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="../group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="../../inc/singup/logout.php">ВЫЙТИ</a>
    </div>


    <div class="main">

  
        <div class="box-inmain">
        <h1 class="name-of"><?= $id ?>
        </h1>
              <a class="button-inlec-back" href="help.php">Назад</a>
               </div>
        <div class="block-messages">
<?php $ms = mysqli_query($connect, "SELECT * FROM `messages` WHERE `thema`='$id' ORDER BY `time` ");
		$ms = mysqli_fetch_all($ms);
		foreach ($ms as $ms) {
      $thema=$ms[1];
      // if($user_id==$ms[3]){
        $fio = preg_split('/\s+/', $ms[3]);
      //   $fio_2 = preg_split('/\s+/', $ms[4]);
      // }

      if($user_id=="to"){
         $to=$ms[4]; 
      }
      ?>
      <?php if($ms[3]==$user_id){ ?>
      <div class="float-left">
      <?=$fio[1]?>:<?= $ms[2]?>
      </div>
      <?php }else{  ?>
      <div class="float-right">
      <?=$ms[2]?>:<?=$fio[1]?>
      </div>
   <?php }} ?>
      </div>
<form action="../../inc/help/add_msg.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="to" value="<?=$to?>">
<input type="hidden" name="thema" value="<?= $thema?>">    

<input type="text" name="text">
<input type="submit">
     
        </form>
       <?php
       
 
       $user_ = mysqli_query($connect, "SELECT * FROM `user` WHERE `fio`='$user_id' ");
		$user_ = mysqli_fetch_all($user_);
		foreach ($user_ as $us) {
            $user=$us[4];
        }

        if($user=="admin" || $user=="prepod"){
            ?> 
<form action="../../inc/help/close_thema.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="thema" value="<?= $thema?>">
    <input type="submit" value="Закрыть вопрос">

        <?php }?>
  
  
  <!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->
 </div>
  
  </body>
  
  
  </html>
 
</body>
</html> 