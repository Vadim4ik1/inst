
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
  <h1 class="name-of">Изменение тестов
  </h1>

<?php  
$oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_question`='$id' ");
$oik = mysqli_fetch_all($oik);
foreach ($oik as $oik) {
?>
  <div class="secion-add" >
<form action="../../inc/question/update.php" method="post" enctype="multipart/form-data">


<p>Вопрос <input type="text" name="question" value="<?= $oik[1] ?>" ></p>

<p>Правильный ответ ᅠᅠ<input type="text" name="true_answer" value="<?= $oik[2]?>" ></p>
<p>Правильный ответ 2ᅠᅠ<input type="text" name="true_answer_2" value="<?= $oik[3]?>" ></p>
<p>Правильный ответ 3ᅠᅠ<input type="text" name="true_answer_3" value="<?= $oik[4]?>" ></p>
<p>Неправильный ответ ᅠ<input type="text" name="wrong_answer" value="<?= $oik[5]?>" ></p>
<p>Неправильный ответ 2ᅠ<input type="text" name="wrong_answer_2" value="<?= $oik[6]?>" ></p>
<p>Неправильный ответ 3ᅠ<input type="text" name="wrong_answer_3" value="<?= $oik[7]?>" ></p>
<input type="hidden" name="type" value="<?= $oik[10]?>" >
<input type="hidden" name="id_question" value="<?=$oik[0]?>">
<?php }?>


<div class="butons-update">
<a class="button-inlec-back" href="">Удалить</a>
<button class="button-inlec-back"  type="submit">Добавить вопрос</button></div>
</div>
</form>
</div>

</body>
</html>
