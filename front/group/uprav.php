<?php
session_start();
require_once '../../connect/connect.php';
$id_gr=$_GET['id'];
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
        <h1 class="name-of">Управление группой
        </h1>
 <a class="button-inlec-back" href="group.php">Назад</a>
</div>
  
  <table class="tablica-user">


     
    <tr>
      <td>№</td>
      <td>ф ФИО</td>
      <td>ВОЗРАСТ</td>
      <td>ГОРОД</td>
      <td>ДОЛЖНОСТЬ</td>
      <td>EMAIL</td>
      <td>ТЕЛЕФОН</td>
      <td>ГРУППА</td>
    </tr>
   
    <?php
     $cifra=0;
     $people = mysqli_query($connect, "SELECT * FROM `user` WHERE `groupp`='$id_gr' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {
            $cifra++;
                if(empty($people[13])){
                    $people[13]="Не присвоена";
                }
                $birthday_timestamp = strtotime($people[2]);
                $age = date('Y') - date('Y', $birthday_timestamp);
                if (date('md', $birthday_timestamp) > date('md')) {
                  $age--;
                }
                        ?>
            <tr>
            <td> <?=$cifra ?></td>
      <td>
        
      <a href="full_profile.php?id=<?=$people[0]?>"> <?=$people[1] ?>
    
    
    
    </a></td>
      <td><?= $age ?></td>
      <td><?=$people[5] ?></td>
      <td><?=$people[4] ?></td>
      <td><?=$people[7] ?></td>
      <td><?=$people[6] ?></td>
      <td><?=$people[13] ?></td>
      <!-- <td  class="drop<?= $people[0]?>">Действия
          <div style="display:none;	box-shadow: 0 4px 10px rgba(10, 20, 30, .4); position:absolute; background:#fff;" class="dropdown<?= $people[0]?>">   
          <a class="link-inpeople" href="edit_people.php?id=<?=$people[0]?>">Редактировать</a>
          <hr>
            <a class="link-inpeople" href="edit_people_pass.php?id=<?=$people[0]?>">Поменять пароль</a>
            <hr>
            <a class="link-inpeople" href="full_profile.php?id=<?=$people[0]?>">Просмотр профиля</a>
            <hr>
            <a class="link-inpeople" href="../../inc/people/delete_profile.php?id=<?=$people[0]?>">Удалить профиль</a>
        
        </div> 
     </td>       -->
     </tr>
     <!-- <script>
    $(".drop<?= $people[0]?>")
  .mouseover(function() {
  $(".dropdown<?= $people[0]?>").show(300);
});
$(".drop<?= $people[0]?>")
  .mouseleave(function() {
  $(".dropdown<?= $people[0]?>").hide(300);     
});

</script> -->
    <?php }?>  
    
  </table>
 </div>


            </body>
</html> 
