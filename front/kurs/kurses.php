<?php
session_start();
require_once '../../connect/connect.php';
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
    <?php echo($_SESSION['user']['fio']);?>
        <img src="../../style/img/image5.png" alt="">
    </div>
    <div class="sidenav">
  <div class="hr"> <hr> </div>
  <a href="#about"><?= $_SESSION['user']['groupp']?></a>
  <div class="hr"> <hr> </div>
  <a href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <a href="../people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div>
  <a  style="color:red;"  href="../kurs/kurses.php">РАЗДЕЛЫ</a>
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
<div class="container-razdels">
<?php $cifra=1;
 $gr=$_SESSION['user']['groupp'];
 $kurs = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `group`= '$gr' ");
		$kurs = mysqli_fetch_all($kurs);
		foreach ($kurs as $kurs) {

            ?>
            <!-- <p>Название курса <br>
           Дата создания :<?=$kurs[2]  ?><br>
            Создатель :<?=$kurs[4]  ?>
            Препод 1 :<?=$kurs[5]  ?>
            <?php if(!empty($kurs[6])){?>
                Препод 2:<?= $kurs[6]  ?>
            <?php }else{
                
             }?>
          
          <?php if(!empty($kurs[7])){?>
                Препод 3:<?= $kurs[7]  ?>
            <?php }else{
                
             }?> -->
                     <a class="button-razdel" href="kurs.php?id=<?=$kurs[0]?>"> <?=$cifra?>.<?=$kurs[1]?></a> 
   
            <?php $cifra++; }?>
         

</div>
 </div>
            </body>


</html> 
