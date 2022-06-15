<?php
session_start();
require_once '../../connect/connect.php';
$id=$_POST['id_test'];

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


            <div class="main-lec">
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
</tr>   
  <?php 
            $oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`='$id' ");
            $oik = mysqli_fetch_all($oik);
            foreach ($oik as $oik) {?>

<tr>
    <td></td>
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
    <td><a href="edit_q.php?id=<?=$oik[0]?>">Изменить вопрос</a> </td>

</tr>         

            <?php  } ?>





  
 </div>


            </body>
</html> 
