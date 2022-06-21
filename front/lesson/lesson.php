<?php
session_start();
require_once '../../connect/connect.php';

$id_lesson=$_POST['id_lesson'];
if (empty($id_lesson)){
    $id_lesson=$_GET['id'];
}

$id_kurs=$_POST['id_kurs'];
$id_user=$_SESSION['user']['fio'];
$idl = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson ");
$idl = mysqli_fetch_all($idl);
foreach ($idl as $idl) {
    $id_kurs=$idl[4];
}
$tn = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_kurs`=$id_kurs AND `id_lesson`=$id_lesson ");
$tn = mysqli_fetch_all($tn);
foreach ($tn as $tn) { 
    $id_test=$tn[0];
}
// $id_test=$_GET['id'];
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
        <div class="container-razdels">
            <?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson ");
		    $lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {
           
            ?>

            <p><?=$lesson[1]?> <form action="../lesson/edit_lesson.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_lesson" value="<?=$id_lesson?>">
                    <input type="hidden" name="id_kurs" value="<?=$id_kurs?>">
                    <?php if($status=="admin" || $status=="prepod"){ ?>

                    <input type="submit" value="Редактировать">
                    <?php }?>
                </form>
                <div class="text-lec">
                    <p><?=$lesson[2]?><br>

                </div>
                <div class="button-lec">
                    <a class="button-inlec-back" href="../kurs/kurs.php?id=<?=$id_kurs?>">НАЗАД</a>

       
                    <?php }?>
                    <?php
                     $id_user=$_SESSION['user']['fio'];
                     $th = mysqli_query($connect, "SELECT `type_test` FROM `test_history` WHERE `id_user`='$id_user' AND `id_test`='$id_test' LIMIT 1 ");
                     $th = mysqli_fetch_all($th);
                    //  echo($id_test);
                     foreach ($th as $th) { 
                        $th_ended=$th[0];
                     }
                     if($th_ended=="ended"){
                        echo("Тест пройден");
                     }else{
                       

                        $lesson = mysqli_query($connect, "SELECT * FROM `test_name` WHERE `id_lesson`='$id_lesson'");
                        $lesson = mysqli_fetch_all($lesson);
                        foreach ($lesson as $lesson) {
                            echo($th_ended);
                            if(!empty($lesson[0])){
                                $id_test=$lesson[0];
                                ?>

                                <form action="../test/test_go.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_test" value="<?=$id_test?>">
                                        <input type="submit" class="button-inlec-back" value="ПРОЙТИ ТЕСТ">
                                </div>
                                </form>
                                <?php }
                    } 
                     }?>
                     
                     
                    
                     
                 
                          

</body>

</html>