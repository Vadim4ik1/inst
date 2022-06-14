<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="../../inc/lesson/update_lesson.php" enctype="multipart/form-data"  method="POST">

<?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id ");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {

            ?>

            <p>Название курса <input type="text" name="name" value="<?=$lesson[1]?>"><br>
  
            <p>Текст лекции : <input type="text" name="text"value="<?=$lesson[2]?>"><br>
            <a href="../../inc/lesson/delete_lesson.php?id=<?=$lesson[0]?>">Удалить</a>
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
            <input type="submit" value="сохранить">
            </form>
         <a href="../test/add_test.php">   Создать тест к этой лекции </a>
</body>
</html>