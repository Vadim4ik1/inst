<?php 

require_once 'connect/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>

<body> 
    <img class="img-logo" src="style/img/image5.png" alt="">
    <hr>
    <div class="nadpis-h1">
        <h1>Обучающая платформа 
            компании LabelUp</h1>
    </div>
    <div class="nadpis-h2">
        <h2>
        Добро пожаловать!<br>
        Если вас еще нет в системе, вы можете зарегестрироваться!</h2>
    </div>
    <div class="buttons-head">
        <a class="js-open-modal" data-modal="1" class="white-button" href="">Войти</a>
        <a  class="white-button"  href="reg.php">Зарегистироваться</a>
    </div>



<!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->



<div class="modal" data-modal="1">
    <img src="style/img/image 5_modal.png" class="img-modal"  alt="">
   <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   <p class="modal__title">   </p>
   <form action="inc/singup/signup.php" method="post" enctype="multipart/form-data">
   <input placeholder="Логин" class="inputs-head" type="text" name="login">
    <input placeholder="Пароль" type="password"  class="inputs-head" name="password">
    <input type="submit" class="input-but-modal" value="Войти">
    </form>


</div>

<!--  
   <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   <p class="modal__title">Заголовок окна 2</p>
</div> -->

<div class="overlay js-overlay-modal"></div>




</body>

<footer class="footer-head">
    <hr>
    <p>Возникли вопросы? Вы можете связаться с нами и мы обязательно их решим!</p>
</footer>
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