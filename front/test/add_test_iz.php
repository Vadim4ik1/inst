
<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];

$kurs = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`='$id' ");
$kurs = mysqli_fetch_all($kurs);
echo($kurs);
foreach ($kurs as $kurs) { 
    $id_kurs=$kurs[4];
}
$idt = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_lesson`='$id' ");
$idt = mysqli_fetch_all($idt);
echo($kurs);
foreach ($idt as $idt) { 
    $id_test=$idt[0];
}
echo($id_kurs);
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
    <?php  echo($_SESSION['user']['fio']);?>
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

<div class="main-lec">

<form action="../../inc/test/add_test.php" method="post" enctype="multipart/form-data">
    <p>Номер вопроса
<select name="number_question" id="">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select></p>
<select name="type_question" id="mySelect" onchange="myFunction()">
<option value=" ">Выбрать тип вопроса</option>
    <option value="check">Чекбокс</option>
    <!-- <option value="radio" id="radio">радиобутон</option> -->
    <option value="input">Инпут Текст</option>
</select>
<input type="hidden" value="<?= $id_kurs?>" name="id_kurs">
<input type="hidden" value="<?= $id?>" name="id_lesson">
<input type="hidden" value="<?= $id_test?>" name="id_test">
<div id="demo">
<p>Вопрос </p><input type="text" name="question"><br>

<div id="true_answer" class="disp-none">
<p>Правильный ответ<input type="text" name="true_answer"></p><br>
</div>
<div id="true_answer_2" class="disp-none">
<p>Правильный ответ 2<input type="text" name="true_answer_2"></p><br>
</div>
<div id="true_answer_3" class="disp-none">
<p>Правильный ответ 3<input type="text" name="true_answer_3"></p><br>
</div>
<div id="wrong_answer" class="disp-none">
<p>Неправильный ответ <input type="text" name="wrong_answer" id="wrong_answer"></p><br>
</div>
<div id="wrong_answer_2" class="disp-none">
<p>Неправильный ответ 2<input type="text" name="wrong_answer_2" id="wrong_answer_2"></p><br>
</div>
<div id="wrong_answer_3" class="disp-none">
<p>Неправильный ответ 3 <input type="text" name="wrong_answer_3" id="wrong_answer_3"></p><br>
</div>

<button type="submit">Добавить вопрос</button>
<a href="">Закрыть тест</a>

</form>

<script>    
function myFunction() {
  var x = document.getElementById("mySelect").value;
  var element_true_answer = document.getElementById("true_answer");
  var element_true_answer_2 = document.getElementById("true_answer_2");
  var element_true_answer_3 = document.getElementById("true_answer_3");
  var element_wrong_answer = document.getElementById("wrong_answer");
  var element_wrong_answer_2 = document.getElementById("wrong_answer_2");
  var element_wrong_answer_3 = document.getElementById("wrong_answer_3");

  if (x == "radio") {

    element_true_answer.classList.remove('disp-none'); 
    element_true_answer_2.classList.add('disp-none'); 
    element_true_answer_3.classList.add('disp-none'); 
    element_wrong_answer.classList.remove('disp-none'); 
    element_wrong_answer_2.classList.remove('disp-none'); 
    element_wrong_answer_3.classList.remove('disp-none'); 

} else if (x == "check"){
    element_true_answer.classList.remove('disp-none'); 
    element_true_answer_2.classList.remove('disp-none'); 
    element_true_answer_3.classList.remove('disp-none'); 
    element_wrong_answer.classList.remove('disp-none'); 
    element_wrong_answer_2.classList.remove('disp-none'); 
    element_wrong_answer_3.classList.remove('disp-none');
} else if (x == "input"){
    element_true_answer.classList.remove('disp-none'); 
    element_true_answer_2.classList.add('disp-none'); 
    element_true_answer_3.classList.add('disp-none'); 
    element_wrong_answer.classList.add('disp-none'); 
    element_wrong_answer_2.classList.add('disp-none'); 
    element_wrong_answer_3.classList.add('disp-none');
}
}
</script>


</body>
</html>