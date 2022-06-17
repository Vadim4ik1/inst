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
    <img class="img-logo" src="style/img/image 5.png" alt="">
    <hr>
    <div class="nadpis-h1">
        <h1>Регистрация</h1>
    </div>
    <div class="input-reg-page"> 
      <form action="inc/register/register.php" class="reg-form" method="post" enctype="multipart/form-data"> 

        <input type="text" placeholder="Введите ФИО" name="fio" class="input-reg" onkeyup="checkParams()" id="fio">
        <input type="date" placeholder="Дата рождения" name="date_born" class="input-reg" onkeyup="checkParams()" id="date_born">
        <input type="text" placeholder="Введите номер телефона" name="phone" class="input-reg" onkeyup="checkParams()" id="phone">
        <input type="text" placeholder="Введите ваш город" name="city" class="input-reg" onkeyup="checkParams()"  id="city">
        <input type="text" placeholder="Введите Email" name="email" class="input-reg" onkeyup="checkParams()" id="email" >
        <input type="text" placeholder="Придумайте логин" name="login" class="input-reg" onkeyup="checkParams()" id="login">
        <input type="text" placeholder="Придумайте пароль" name="password" class="input-reg" onkeyup="checkParams()" id="password">

        <button class="white-button-reg disabled" disabled type="submit" id="submit" >Зарегистироваться</button>
            <!-- <select name="groupp" id="">
            <option value="Студент">Студент</option>
            <option value="Преподаватель">Преподаватель</option>
            <option value="Админ">Админ</option> 
            </select><p></p><br> -->
            </form>
            
    </div>

</body>

<footer class="footer-head">
    <hr>
    <p>Возникли вопросы? Вы можете связаться с нами и мы обязательно их решим!</p>
</footer>
</html>
<script>
function checkParams() {
            var fio = $('#fio').val();
            var date_born = $('#date_born').val();
            var phone = $('#phone').val();
            var city = $('#city').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var password = $('#password').val();

            if (fio.length != 0 && date_born.length != 0 && phone.length != 0 && city.length != 0 && email.length != 0 && login.length != 0 && password.length != 0){  
                 $('#submit').removeAttr('disabled');
                 $('#submit').removeClass('disabled');

            } else {
                $('#submit').attr('disabled', 'disabled');
                $('#submit').addClass('disabled');
            }
        }
</script>

