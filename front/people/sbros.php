<?php
session_start();
$id_student=$_GET['id'];
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

  <div class="box-inmain">
  <h1 class="name-of">
    Сброс попытки
  </h1>
              <a class="button-inlec-back" href="../../admin_page.php">На главную</a>
               </div>
  <div class="pust-blok">
    
  </div>
  
  <table class="tablica-user">


     
    <tr>
      <td>№</td>
      <td>ФИО</td>
      <td>ГРУППА</td>
      <td>РАЗДЕЛ</td>
      <td>ЛЕКЦИЯ</td>
      <td>НАЗВАНИЕ ТЕСТА</td>
      <td>ОЦЕНКА</td>

    </tr>
   
    <?php $cifra=0;
     $people = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_student' ");
		$people = mysqli_fetch_all($people);
    // echo($id_student);
    $cifra=1;
		foreach ($people as $people) { 
      $id_user_test=$people[1];
      $id_user_group=$people[13];
      
      $test = mysqli_query($connect, "SELECT DISTINCT `id_test` FROM `test_history` WHERE `id_user`='$id_user_test' AND `type_test`='ended' ");
      $test = mysqli_fetch_all($test);
      foreach ($test as $test) {
      $id_test_end=$test[0]; 
      } 
      $from_test = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_test`='$id_test_end' ");
      $from_test = mysqli_fetch_all($from_test);
      foreach ($from_test as $from_test) {
        $id_user_lesson=$from_test[3];
        // echo($id_test_end);
        $from_les = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`='$id_user_lesson' ");
        $from_les = mysqli_fetch_all($from_les);
        foreach ($from_les as $from_les) {
          $id_user_kurs=$from_les[4];
          $from_kurs = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `id_kurs`='$id_user_kurs' ");
          $from_kurs = mysqli_fetch_all($from_kurs);

          foreach ($from_kurs as $from_kurs) {

            $bacll = mysqli_query($connect, "SELECT * FROM `ball` WHERE `id_test`='$id_test_end' AND `id_user`='$id_user_test'   ");
            $bacll = mysqli_fetch_all($bacll);
            foreach ($bacll as $bacll) {
      ?>
            <tr>
         <td> <?=$cifra ?></td>
      <td> <?=$people[1] ?></td>
      <td><?=$id_user_group?></td>
      <td><?=$from_kurs[1] ?></td>
      <td><?=$from_les[1] ?></td>
      <td><?=$from_test[1]?></td>
      <td><?=$bacll[3] ?></td>
      <form action="../../inc/people/sbros.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_test" value="<?=$id_test_end?>">
        <input type="hidden" name="id_user" value="<?=$id_user_test?>">
        <td> <input type="submit" value="Сбросить попытку"></td>   
      </form>

     </tr>

    <?php $cifra++; }}}} }?>  
    
  </table>
 </div>


            </body>
</html> 
