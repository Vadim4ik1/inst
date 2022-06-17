<?php
session_start();
require_once '../../connect/connect.php';
$id_gr=$_GET['id'];
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
        <img src="../../style/img/image5.png" alt="">
    </div>
    <div class="sidenav">
  <div class="hr"> <hr> </div>
  <a href="#about"><?= $_SESSION['user']['groupp']?></a>
  <div class="hr"> <hr> </div>
  <a href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <a  style="color:red;" href="#">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div>
  <a href="../kurs/kurses.php">РАЗДЕЛЫ</a>
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


            <div class="main">
  <div class="pust-blok">
    
  </div>
  
  <table class="tablica-user">


     
    <tr>
      <td>№</td>
      <td>ф ФИО</td>
      <td>ВОЗРАСТ</td>
      <td>ГОРОД</td>
      <td>ДОЛЖНОСТЬ</td>
      <td>EMAIL</td>
      <td>ТЕЛЕФОН</td>
      <td>ГРУППА</td>
    </tr>
   
    <?php
     $cifra=0;
     $people = mysqli_query($connect, "SELECT * FROM `user` WHERE `groupp`='$id_gr' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {
            $cifra++;
                if(empty($people[13])){
                    $people[13]="Не присвоена";
                }
                $birthday_timestamp = strtotime($people[2]);
                $age = date('Y') - date('Y', $birthday_timestamp);
                if (date('md', $birthday_timestamp) > date('md')) {
                  $age--;
                }
                        ?>
            <tr>
            <td> <?=$cifra ?></td>
      <td><a href="../people/full_profile.php?id=<?= $people[0] ?>"> <?=$people[1] ?>></a></td>
      <td><?= $age ?></td>
      <td><?=$people[5] ?></td>
      <td><?=$people[4] ?></td>
      <td><?=$people[7] ?></td>
      <td><?=$people[6] ?></td>
      <td><?=$people[13] ?></td>
      <!-- <td  class="drop<?= $people[0]?>">Действия
          <div style="display:none;	box-shadow: 0 4px 10px rgba(10, 20, 30, .4); position:absolute; background:#fff;" class="dropdown<?= $people[0]?>">   
          <a class="link-inpeople" href="edit_people.php?id=<?=$people[0]?>">Редактировать</a>
          <hr>
            <a class="link-inpeople" href="edit_people_pass.php?id=<?=$people[0]?>">Поменять пароль</a>
            <hr>
            <a class="link-inpeople" href="full_profile.php?id=<?=$people[0]?>">Просмотр профиля</a>
            <hr>
            <a class="link-inpeople" href="../../inc/people/delete_profile.php?id=<?=$people[0]?>">Удалить профиль</a>
        
        </div> 
     </td>       -->
     </tr>
     <!-- <script>
    $(".drop<?= $people[0]?>")
  .mouseover(function() {
  $(".dropdown<?= $people[0]?>").show(300);
});
$(".drop<?= $people[0]?>")
  .mouseleave(function() {
  $(".dropdown<?= $people[0]?>").hide(300);     
});

</script> -->
    <?php }?>  
    
  </table>
 </div>


            </body>
</html> 
