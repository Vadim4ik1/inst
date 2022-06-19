<?php
session_start();
require_once '../../connect/connect.php';
$id=$_POST['id_test'];
$id_lesson=$_POST['id_lesson'];
$cifra=1;
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
  <div class="pust-blok">
    
  </div>  

  <table class="tablica">
<tr>
  <td>№</td>
  <td>Вопрос</td>
  <td>Тип вопроса</td>
  <td>Правильный ответ</td>
  <td>Правильный ответ 2</td>
  <td>Правильный ответ 3</td>
  <td>Неправильный ответ 1</td> 
  <td>Неправильный ответ 2</td> 
  <td>Неправильный ответ 3</td> 
  <td>Номер вопроса</td> 
</tr>   
  <?php 
            $oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`='$id' ");
            $oik = mysqli_fetch_all($oik);
            foreach ($oik as $oik) {?>

<tr>
    <td><?= $cifra ?></td>
    <td><?=$oik[1]?></td>
    <td><?=$oik[10]?></td>
    <td><?=$oik[2]?></td>
    <td>
        <?php if(!empty($oik[3])){ ?>  
        <?=$oik[3]?>
       <?php }else{
            echo("-");
        }?>
    </td>
    <td>
        <?php if(!empty($oik[4])){ ?>  
        <?=$oik[4]?>
       <?php }else{
            echo("-");
        }?>
    </td>
    <td>
        <?php if(!empty($oik[5])){ ?>  
        <?=$oik[5]?>
       <?php }else{
            echo("-");
        }?>
    </td>
    <td>
        <?php if(!empty($oik[6])){ ?>  
        <?=$oik[6]?>
       <?php }else{
            echo("-");
        }?>
    </td>
    <td>
        <?php if(!empty($oik[7])){ ?>  
        <?=$oik[7]?>
       <?php }else{
            echo("-");
        }?>
    </td>
    <td>
        <?=$oik[11]?>
    </td> <?php $cifra++; ?>
    <td><a href="edit_q.php?id=<?=$oik[0]?>">Изменить вопрос</a> </td>

</tr>         

            <?php  } ?>





  </table>
  <div class="but-in-test" style="margin-right:100px;">
            <a class="button-inlec-back" href="add_test.php?id=<?=$id_lesson?>">Добавить вопрос</a>
 </div>
 </div>


            </body>
</html> 
