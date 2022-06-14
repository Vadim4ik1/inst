<form action="../../inc/singup/signup.php" method="post" enctype="multipart/form-data">
<p>Логин: <input type="text" name="login"></p> <br>
<p>Пароль: <input type="password" name="password"></p> <br>
<button>go</button>

<p><?= $_SESSION['message'] ?></p>
</form>