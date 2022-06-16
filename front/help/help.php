<?php 
session_start();
require_once '../../connect/connect.php';
// if(isset($user['status'])){
//     header('Location: index.php');
//     }
$id_user=$_SESSION['user']['fio'];

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
    <?php echo($_SESSION['user']['fio']);?>
        <img src="style/img/image5.png" alt="">
    </div>
    <div class="sidenav">
  <div class="hr"> <hr> </div>
  <a href="#about"><?= $_SESSION['user']['groupp']?></a>
  <div class="hr"> <hr> </div>
  <a style="color:red;" href="#services">ЛИЧНЫЙ КАБИНЕТ</a>
  <div class="hr"> <hr> </div>
  <a href="front/people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
  <div class="hr"> <hr> </div>
  <a href="front/kurs/kurses.php">РАЗДЕЛЫ</a>
  <div class="hr"> <hr> </div>
  <a href="#contact">ТЕСТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="#contact">ОТЧЕТЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/term/term.php">БАЗА ЗНАНИЙ</a>
  <div class="hr"> <hr> </div>
  <a  href="front/group/group.php">ГРУППЫ</a>
  <div class="hr"> <hr> </div>
  <a href="front/help/help.php">Вопросы</a>
<div class="hr"> <hr> </div>
  <a href="front/signinup/admin_signin.php">зарегать человека</a>
  <div class="hr"> <hr> </div>
<a href="front/kurs/add_kurs.php">Добавить курс</a>
<div class="hr"> <hr> </div>
<a href="front/signinup/signin.php">Удалить курс</a>
<div class="hr"> <hr> </div>
<a href="front/help/help.php">Вопросы</a>
<div class="hr"> <hr> </div>
<a href="inc/singup/logout.php">выйти</a>
</div>





<!-- <a href="front/signinup/signup.php">войти</a> -->


<div class="main">
 МОИ РЕШЕННЫЕ ВОПРОСЫ:
<?php $ms = mysqli_query($connect, "SELECT DISTINCT `thema` FROM `messages` WHERE `status`='resh' AND `author`='$id_user' ");
		$ms = mysqli_fetch_all($ms);
		foreach ($ms as $ms) { ?>
            <a href="full_help_resh.php?id=<?=$ms[0]?>"><?= $ms[0] ?></a>
      <?php  }?>
       МОИ Нерешенные ВОПРОСЫ:
<?php $ms = mysqli_query($connect, "SELECT DISTINCT `thema` FROM `messages` WHERE `status`='neresh' AND `author`='$id_user' ");
		$ms = mysqli_fetch_all($ms);
      
		foreach ($ms as $ms) {  ?>
        
            <a href="full_help.php?id=<?=$ms[0]?>"><?= $ms[0] ?></a>
      <?php  }?> 

      <a class="js-open-modal" data-modal="1" class="white-button" href="">Задать вопрос</a>
      

      </div>
  
  
  
  <!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->
  
  
  
  <div class="modal" data-modal="1">
      <img src="style/img/image 5_modal.png" class="img-modal"  alt="">
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