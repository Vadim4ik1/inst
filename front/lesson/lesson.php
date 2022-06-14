<?php
session_start();
require_once '../../connect/connect.php';

$id_lesson=$_POST['id_lesson'];
if (empty($id_lesson)){
    $id_lesson=$_GET['id'];
}
$id_kurs=$_POST['id_kurs'];
echo('Лекция'.$id_lesson);
echo('id_курса'.$id_kurs);

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
            <?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson ");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {
           
            ?>

            <p><?=$lesson[1]?> <form action="../lesson/edit_lesson.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_lesson" value="<?=$id_lesson?>">
                    <input type="hidden" name="id_kurs" value="<?=$id_kurs?>">
                    <input type="submit" value="Редактировать">

                </form>
                <div class="text-lec">
                    <p><?=$lesson[2]?><br>

                </div>
                <div class="button-lec">
                    <a class="button-inlec" href="../kurs/kurs.php?id=<?=$id_kurs?>">НАЗАД</a>

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
                    <?php
         $lesson = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_lesson`=$id_lesson");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {

            if(!empty($lesson[0])){
                $id_test=$lesson[0];
                ?>
                    <form action="../test/test_go.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_test" value="<?=$id_test?>">
                        <input type="submit" class="button-inlec-back" href="" value="ПРОЙТИ ТЕСТ">
                </div>
                </form>
                <?php }
            ?>
                <?php }
        ?>

</body>

</html>