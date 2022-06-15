<?php
session_start();
require_once '../../connect/connect.php';
$id_lesson=$_POST['id_lesson'];
$id_kurs=$_POST['id_kurs'];
echo('Лекция'.$id_lesson);
echo('id_курса'.$id_kurs);
$id_test=$_GET['id'];
?>
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
    <div class="hr">
      <hr>
    </div>
    <a href="#about"><?= $_SESSION['user']['groupp']?></a>
    <div class="hr">
      <hr>
    </div>
    <a href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
    <div class="hr">
      <hr>
    </div>
    <a href="../people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
    <div class="hr">
      <hr>
    </div>
    <a style="color:red;" href="../kurs/kurses.php">РАЗДЕЛЫ</a>
    <div class="hr">
      <hr>
    </div>
    <a href="#contact">ТЕСТЫ</a>
    <div class="hr">
      <hr>
    </div>
    <a href="#contact">ОТЧЕТЫ</a>
    <div class="hr">
      <hr>
    </div>
    <a href="../term/term.php">БАЗА ЗНАНИЙ</a>
    <div class="hr">
      <hr>
    </div>
    <a href="../group/group.php">ГРУППЫ</a>
    <a href="../signinup/admin_signin.php">зарегать человека</a> <br>
    <a href="../kurs/add_kurs.php">Добавить курс</a> <br>
    <a href="../signinup/signin.php">Удалить курс</a> <br>
    <a href="../inc/singup/logout.php">выйти</a>
  </div>
  <div class="main-lec">
    <div class="container-razdels">
      <form style="display: grid; justify-items: center" enctype="multipart/form-data" action="../../inc/lesson/update_lesson.php" method="POST">

        <?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson ");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {
            ?>
        <div class="name-lesson">
          Название лекции <input type="text" name="name" value="<?=$lesson[1]?>">
        </div>
        <div class="text-lesson">
          Текст лекции : <textarea name="text" id="" cols="30" rows="10"><?=$lesson[2]?></textarea>
        </div>
        <div class="inputs-red-test">
          <a class="button-inlec-back" href="../../inc/lesson/delete_lesson.php?id=<?=$lesson[0]?>">Удалить лекцию</a>
          <a class="button-inlec-back" href="lesson.php?id=<?=$lesson[0]?>">НАЗАД</a>
          <input type="hidden" name="id" value="<?=$lesson[0]?>">
          <?php if(!empty($lesson[5])){?>
          Видео лекции:<?= $lesson[5]  ?>
          <video width="400" height="300" controls="controls" poster="video/duel.jpg">
            <source src="video/duel.ogv" type='video/ogg; codecs="theora, vorbis"'>
            <source src="video/duel.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
            <source src="video/duel.webm" type='video/webm; codecs="vp8, vorbis"'>
            Тег video не поддерживается вашим браузером.
            <a href="video/duel.mp4">Скачайте видео</a>.
            <?php }else{
                
             }?>

          </video>



          <?php }?>

          <input type="submit" class="button-inlec-back" value="СОХРАНИТЬ">
      </form>
      </div>
      <?php  $oik = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_lesson`='$id_lesson'");
            $oik = mysqli_fetch_all($oik);
            foreach ($oik as $oik) {
            $test_empty=$oik[0];
            $name_mpty=$oik[1];
                }
                // echo($test_empty);
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

        <input type="submit" class="button-inlec-back" value="СОЗДАТЬ ТЕСТ ">
      </form>
      <?php }
              ?>
 
</body>

</html>