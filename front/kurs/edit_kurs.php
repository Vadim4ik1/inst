<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
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
  <div class="box-inmain">             
 <h1 class="name-of">Редактирование номеров</h1>
 <a class="button-inlec-back" href="../kurs/kurs.php?id=<?=$id?>">Назад</a>
</div>
<?php 




$kurs = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_kurs`=$id ");
		$kurs = mysqli_fetch_all($kurs);
		foreach ($kurs as $kurs) {
     
            $count = mysqli_query($connect, "SELECT COUNT(*) FROM `lesson` WHERE `id_kurs`=$id ");
            $count = mysqli_fetch_all($count);
            foreach ($count as $count) {
            ?>
            <form action="../../inc/lesson/change_number.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_lesson" value="<?= $kurs[0] ?>">
            <input type="hidden" name="id_kurs" value="<?= $id ?>">
            <div class="block-inedit">
              <div>
           Название :<?=$kurs[1]  ?>  
           </div><div>
           Порядковый номер: <select name="number" >
               
           <?php
             for ($i = 1; $i <= $count[0] ; $i++):
                if($i!=$kurs[6]){
                    ?>
                <option value="<?=$i?>"><?=$i?></option>
                <?php } 
                else{?>
                  <option selected value="<?=$i?>"><?=$i?></option>
               <?php }
                ?>
                   <?php endfor;    ?>
  
                   </select>

               <?php }  ?></div>
               <input type="submit"  class="button-inlec-back" value="Изменить">
               </div>
               </form>

               <br>

            <!-- <a href="edit_people_pass.php?id=<?=$people[0]?>">Поменять пароль</a>-->

            <?php }?>


            <!-- <?php $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_kurs`='$id' ORDER BY `number` ");
		    $lesson = mysqli_fetch_all($lesson);
		    foreach ($lesson as $lesson) {?>
            <a href="../lesson/lesson.php?id=<?=$lesson[0]?>"> <?= $lesson[1]?> </a>



            <?php }?> -->
 
            </body>
</html>