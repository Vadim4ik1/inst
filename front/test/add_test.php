
<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">

    <title>Document</title>
</head>
<body>

<form action="../../inc/test/add_test.php" method="post" enctype="multipart/form-data">

<select name="type_question" id="mySelect" onchange="myFunction()">
<option value=" ">Выбрать тип вопроса</option>
    <option value="check">Чекбокс</option>
    <option value="radio" id="radio">радиобутон</option>
    <option value="input">Инпут Текст</option>
</select>
<input type="hidden" value="<?= $id?>" name="id_lesson">
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
<p>Неправильный ответ 2<input type="text" name="wrong_answer" id="wrong_answer_2"></p><br>
</div>
<div id="wrong_answer_3" class="disp-none">
<p>Неправильный ответ 3 <input type="text" name="wrong_answer" id="wrong_answer_3"></p><br>
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
    element_wrong_answer.classList.remove('disp-none'); 
    element_wrong_answer_2.classList.remove('disp-none'); 
    element_wrong_answer_3.classList.remove('disp-none');
}
}
</script>


</body>
</html>