<?php 
session_start();
require_once '../../connect/connect.php';
// if(isset($user['status'])){
//     header('Location: index.php');
//     }
$id_user=$_SESSION['user']['fio'];
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
        <div class="hr">
            <hr>
        </div>


        <a  href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <?php if($status=="admin"){ ?>
  <a href="../people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div> 
  <?php } ?>
  <a href="../kurs/kurses.php">РАЗДЕЛЫ</a>
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
<a    href="../kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr"> <hr> </div>
<a  style="color:red;" href="help.php">ВОПРОСЫ</a>
<div class="hr"> <hr> </div>
<a href="../group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr"> <hr> </div>
<a href="../../inc/singup/logout.php">ВЫЙТИ</a>
    </div>


    <div class="main">

        <h1 class="name-of">Мои вопросы
        </h1>
        <div class="secion-vopr">
        <div class="secion-add">
                  МОИ РЕШЕННЫЕ ВОПРОСЫ:
<?php

$ms = mysqli_query($connect, "SELECT DISTINCT `thema` FROM `messages` WHERE `status`='resh' AND `author`='$user_id' OR `to`='$user_id' AND `status`='resh' ");
		$ms = mysqli_fetch_all($ms);
        $cifra_1=1;
		foreach ($ms as $ms) { ?>
                <?= $cifra_1 ?>.    <a href="full_help_resh.php?id=<?=$ms[0]?>"><?= $ms[0] ?></a>
      <?php $cifra_1++;  }?>
      </div>
      <br>
      <div class="secion-add">
        
    МОИ Нерешенные ВОПРОСЫ:
<?php
 $ms = mysqli_query($connect, "SELECT DISTINCT `thema` FROM `messages` WHERE `status`='neresh' AND `author`='$user_id' OR `to`='$user_id' AND `status`='neresh'  ");
		$ms = mysqli_fetch_all($ms);
        $cifra_2=1;
		foreach ($ms as $ms) {
              ?>
        <?= $cifra_2 ?>.
            <a href="full_help.php?id=<?=$ms[0]?>"><?= $ms[0] ?></a>
      <?php $cifra_2++;  }?> 
      </div>
      <br>
      </div>
      <div class="mybut">
      <a class="js-open-modal"  data-modal="1"class="button-inlec-back" href="">Задать вопрос</a>
     
     </div>
      </div>
  
  
  
  <!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->
  
  
  
  <div class="modal" data-modal="1">
      <img src="../../style/img/image 5_modal.png" class="img-modal"  alt="">
     <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
     <p class="modal__title">   </p>
     <form action="../../inc/help/add_thema.php" method="post" enctype="multipart/form-data">
     <input placeholder="Тема сообщения" class="inputs-head" type="text" name="thema">
     <textarea name="text" id="" cols="30" placeholder="Текст сообщения"  rows="10"></textarea>
    Кому :<select name="to" id=""> 
        <option value="Администратор">Администратор</option>
     <?php 
     $pr = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='prepod'");
     $pr = mysqli_fetch_all($pr);
          foreach ($pr as $pr) {?>
              <option value="<?=$pr[1]?>">
             <?=$pr[1]?>
              </option>
          
  <br>
              <?php }?>
  
     </select>
      <input type="submit" class="input-but-modal" value="Задать">
      </form>
  
  
  </div>
  
  <!--  
     <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
     <p class="modal__title">Заголовок окна 2</p>
  </div> -->
  
  <div class="overlay js-overlay-modal"></div>
  
  
  
  
  </body>
  
  
  </html>
  <script>
  
  
  !function(e){"function"!=typeof e.matches&&(e.matches=e.msMatchesSelector||e.mozMatchesSelector||e.webkitMatchesSelector||function(e){for(var t=this,o=(t.document||t.ownerDocument).querySelectorAll(e),n=0;o[n]&&o[n]!==t;)++n;return Boolean(o[n])}),"function"!=typeof e.closest&&(e.closest=function(e){for(var t=this;t&&1===t.nodeType;){if(t.matches(e))return t;t=t.parentNode}return null})}(window.Element.prototype);
  
  
  document.addEventListener('DOMContentLoaded', function() {
     var modalButtons = document.querySelectorAll('.js-open-modal'),
         overlay      = document.querySelector('.js-overlay-modal'),
         closeButtons = document.querySelectorAll('.js-modal-close');
  
  
     modalButtons.forEach(function(item){
        item.addEventListener('click', function(e) {
           e.preventDefault();
           var modalId = this.getAttribute('data-modal'),
               modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');
           modalElem.classList.add('active');
           overlay.classList.add('active');
        }); // end click
  
     }); // end foreach
  
  
     closeButtons.forEach(function(item){
  
        item.addEventListener('click', function(e) {
           var parentModal = this.closest('.modal');
  
           parentModal.classList.remove('active');
           overlay.classList.remove('active');
        });
  
     }); // end foreach
  
  
      document.body.addEventListener('keyup', function (e) {
          var key = e.keyCode;
  
          if (key == 27) {
  
              document.querySelector('.modal.active').classList.remove('active');
              document.querySelector('.overlay').classList.remove('active');
          };
      }, false);
  
  
      overlay.addEventListener('click', function() {
          document.querySelector('.modal.active').classList.remove('active');
          this.classList.remove('active');
      });
  
  
  
  
  }); // end ready
  </script>
</body>
</html> 