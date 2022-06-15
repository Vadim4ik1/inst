
<?php
session_start();

require_once '../../connect/connect.php';
date_default_timezone_set('UTC');?>
<form action="../../inc/register/register.php" method="post" enctype="multipart/form-data">
<p>fio</p><input type="text" name="fio"><br>
<p>date_born</p><input type="date" name="date_born"><br>
<p>status</p>
<select name="status">
<option value="Студент">student</option>
<option value="Преподаватель">prepod</option>
<option value="Админ">admin</option>
</select>

<br>
<p>city</p><input type="text" name="city"><br>
<p>phone</p><input type="text" name="phone"><br>
<p>email</p><input type="email" name="email"><br>
<p>login</p><input type="text" name="login"><br>
<p>password</p><input type="password" name="password"><br>
Группа
<select name="groupp" id="">
<?php $gr = mysqli_query($connect, "SELECT * FROM `group` ");
		$gr = mysqli_fetch_all($gr);
		foreach ($gr as $gr) { ?>
<option value="<?=$gr[1]?>"><?=$gr[1]?></option>
<?php }?></select>
<button type="submit">Поехали</button>
</form>
