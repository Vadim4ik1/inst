<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
echo($id);
$user_id=$_SESSION['user']['fio'];
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
  <?php $kurs = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `id_kurs`='$id'");
		$kurs = mysqli_fetch_all($kurs);
		foreach ($kurs as $kurs) {  

            ?>
  <a  style="color:red;"  href="../kurs/kurses.php">РАЗДЕЛЫ</a>
  <a  style="color:white;" ><?=$kurs[1]?></a>
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
     <a class="button-razdel" style="justify-content: space-between;"><?=$kurs[1]?>
          <input class="drop<?=$kurs[0]?>" type="submit" value="Действия"> </a>
          <div style="display:none;	box-shadow: 0 4px 10px rgba(10, 20, 30, .4); position:absolute;left: 1008px;top: 200pxpx;width: 290px; background:#fff;" class="dropdown<?=$kurs[0]?>">   
          <a class="link-inpeople" href="../lesson/add_lesson.php?id=<?=$kurs[0]?>">Добавить лекцию </a>
            <hr>
            <a class="link-inpeople" href="../../inc/kurs/delete_kurs.php?id=<?=$kurs[0]?>">Удалить этот курс </a>
            <hr>
            <a class="link-inpeople" href="edit_kurs.php?id=<?=$kurs[0]?>">Изменить этот курс </a>
            <hr>
            <a class="link-inpeople" href="../test/add_test_name.php?id=<?=$kurs[0]?>">Создать тест </a>
            <hr>
            <a class="link-inpeople" href="edit_name_kurs.php?id=<?=$kurs[0]?>">Изменить имя курса </a>
        </div> 

<script>
    $(".drop<?=$kurs[0]?>")
  .mouseover(function() {
  $(".dropdown<?=$kurs[0]?>").show(300);
});
$(".drop<?=$kurs[0]?>")
  .mouseleave(function() {
  $(".dropdown<?=$kurs[0]?>").hide(300);     
});
</script>

            <?php }?>
            <?php $number_question=0; 
            $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_kurs`='$id' ORDER BY `number` ");
		    $lesson = mysqli_fetch_all($lesson);
		    foreach ($lesson as $lesson) { 
                $id_kurs_itog=$lesson[4]?>
            <form action="../lesson/lesson.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_lesson" value="<?=$lesson[0]?>">
                <input type="hidden" name="id_kurs" value="<?=$lesson[4]?>">
                
               <input type="submit"class="button-razdel-podr" value="<?=$lesson[1]?>">
            </form>
            <!-- <a href="../lesson/lesson.php?id=<?=$lesson[0]?>"> < </a> -->
        
            <?php }?>
            </div>
            <?php  $test = mysqli_query($connect, "SELECT * FROM `test_itog` WHERE `id_test`='$id_kurs' AND `id_user`='$user_id' ");
		              $test = mysqli_fetch_all($test);
		              foreach ($test as $test) {
                    if(empty($test[0])){?>
                      <form action="../test/test_itog.php" method="post" enctype="multipart/form-data">
                      <?php
                      $count=1;
                      ?>
                    
                       <input type="hidden" name="id_kurs" value="<?=$id_kurs_itog?>">
                       <input type="hidden" name="count" value="<?=$count?>">
                       <input type="submit" value="Пройти итоговый тест">
                    </form>
                   <?php  }
                  }  ?> 
            
 </div>
            </body>
</html>

