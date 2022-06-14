
<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
echo($id);
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


<?php  
$oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_question`='$id' ");
$oik = mysqli_fetch_all($oik);
foreach ($oik as $oik) {
?>
<p>Вопрос </p><input type="text" name="question" value="<?= $oik[1] ?>" ><br>


<p>Правильный ответ<input type="text" name="true_answer" value="<?= $oik[2] ?>" ></p><br>



<?php }?>
<select name="type_question" id="mySelect" >
<option value=" ">Выбрать тип вопроса</option>
    <option value="check">Чекбокс</option>
    <option value="radio" id="radio">радиобутон</option>
    <option value="input">Инпут Текст</option>
</select>
<input type="hidden" value="<?= $id?>" name="id_lesson">
<div id="demo">



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




</body>
</html>