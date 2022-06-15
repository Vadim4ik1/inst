
<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
echo($id);
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


<?php  
$oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_question`='$id' ");
$oik = mysqli_fetch_all($oik);
foreach ($oik as $oik) {
?>
<form action="">


<p>Вопрос </p><input type="text" name="question" value="<?= $oik[1] ?>" ><br>


<p>Правильный ответ<input type="text" name="true_answer" value="<?= $oik[2]?>" ></p><br>
<p>Правильный ответ 2<input type="text" name="true_answer_2" value="<?= $oik[3]?>" ></p><br>
<p>Правильный ответ 3<input type="text" name="true_answer_3" value="<?= $oik[4]?>" ></p><br>
<p>Неправильный ответ <input type="text" name="wrong_answer" value="<?= $oik[5]?>" ></p><br>
<p>Неправильный ответ 2 <input type="text" name="wrong_answer_2" value="<?= $oik[6]?>" ></p><br>
<p>Неправильный ответ 3<input type="text" name="wrong_answer_3" value="<?= $oik[7]?>" ></p><br>

    
<?php }?>

<a href="">Удалить</a>
<button type="submit">Обновить</button>
</form>


</body>
</html>
