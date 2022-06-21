<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];

$user_id=$_SESSION['user']['fio'];
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
  <a  style="color:red;"  href="kurses.php">РАЗДЕЛЫ</a>
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

  <?php $kurs = mysqli_query($connect, "SELECT * FROM `kurs` WHERE `id_kurs`='$id'");
		$kurs = mysqli_fetch_all($kurs);
		foreach ($kurs as $kurs) {  

            ?>   <div class="box-inmain">
               <h1 class="name-of"><?=$kurs[1]?></h1>  
              <a class="button-inlec-back" href="kurses.php">Назад</a>
               </div>
               <?php if($status=="admin"||$status=="prepod"){ ?>
                <div class="but-inlec">
               <a class="but-deys-lec" href="../lesson/add_lesson.php?id=<?=$kurs[0]?>">Добавить лекцию </a>
            <a class="but-deys-lec" href="edit_kurs.php?id=<?=$kurs[0]?>">Изменить этот курс </a>
            <a class="but-deys-lec" href="../test/add_test_name.php?id=<?=$kurs[0]?>">Создать тест </a>
            <a class="but-deys-lec" href="edit_name_kurs.php?id=<?=$kurs[0]?>">Изменить имя курса </a>  
            <a class="but-deys-lec" href="../../inc/kurs/delete_kurs.php?id=<?=$kurs[0]?>">Удалить этот курс </a>   
            <?php }?>    </div>               
 <div class="container-razdels">




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

