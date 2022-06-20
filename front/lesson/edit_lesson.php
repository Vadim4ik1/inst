<?php
session_start();
require_once '../../connect/connect.php';
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];

$id_test=$_GET['id'];
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
    <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

    
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
  <a  href="../../front/people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div> 
  <?php } ?>
  <a style="color:red;" href="kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="front/test/tests.php">ТЕСТЫ</a>
  <?php } ?>
  <div class="hr"> <hr> </div>
  <a href="front/otchet/otchet_fordir.php">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="front/group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/signinup/admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
  <div class="hr"> <hr> </div>
<a href="front/kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a href="front/help/help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="front/group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="inc/singup/logout.php">ВЫЙТИ</a>
</div>
  <div class="main-lec">
  <h1 class="name-of">Редактирование лекции</h1>
    <div class="container-razdels">
      <form  enctype="multipart/form-data" action="../../inc/lesson/update_lesson.php" method="POST">

        <?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson ");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {
            ?>
        <div class="name-lesson">
          Название лекции <input type="text" name="name" value="<?=$lesson[1]?>">
        </div>
        <div class="text-lesson">
        <textarea name="text"><?=$lesson[2]?></textarea>
                <script>
                        CKEDITOR.replace( 'text' );
                </script>
        </div>
        <div class="inputs-red-test">
          <a class="button-inlec-back" href="../../inc/lesson/delete_lesson.php?id=<?=$lesson[0]?>">Удалить лекцию</a>
          <a class="button-inlec-back" href="lesson.php?id=<?=$lesson[0]?>">Назад</a>
          <input type="hidden" name="id" value="<?=$lesson[0]?>">
          <?php }?>

 
          <input type="submit" class="button-inlec-back" value="Сохранить">
      </form>
      <?php  
      $oik = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_lesson`='$id_lesson'");
            $oik = mysqli_fetch_all($oik);
            foreach ($oik as $oik) {
            $test_empty=$oik[0];
            $name_mpty=$oik[1];
                }
                echo($test_empty);
              if(!empty($test_empty)){ ?>
   
      <form action="../test/edit_test.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" value="<?=$test_empty?>" name="id_test">
        <input type="submit" class="button-inlec-back" value="Редактировать">
      </form>
      <?php
              }
              else{?>
      <form action="../test/add_test_name.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="id_lesson" value="<?=$id_lesson?>">
        <input type="hidden" name="id_kurs" value="<?=$id_kurs?>">
        <input type="submit" class="button-inlec-back" value="Создать тест">
      </form>
      <?php }
              ?>
      </div>
  </div>
              </form>
</body>

</html>