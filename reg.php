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

        <input type="text" placeholder="Введите ФИО" name="fio" class="input-reg">
        <input type="date" placeholder="Дата рождения" name="date_born" class="input-reg">
        <input type="text" placeholder="Введите номер телефона" name="phone" class="input-reg">
        <input type="text" placeholder="Введите ваш город" name="city" class="input-reg">
        <input type="text" placeholder="Введите Email" name="email" class="input-reg">
        <input type="text" placeholder="Придумайте логин" name="login" class="input-reg">
        <input type="text" placeholder="Придумайте пароль" name="password" class="input-reg">

        <button class="white-button-reg" type="submit">Зарегистироваться</button>
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
