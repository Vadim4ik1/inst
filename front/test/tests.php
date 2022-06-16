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


            <div class="main">
  <div class="pust-blok">
    
  </div>
  
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
        </div>  -->
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
