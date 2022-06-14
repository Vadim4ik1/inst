

<form action="../../inc/kurs/add_kurs.php" method="post" enctype="multipart/form-data">
<p>Название курса</p><input type="text" name="name_kurs"><br>
<p>Пароль</p><input type="text" name="password"><br>
<p>Препод 1
<select name="prepod">
<option value="Студент">Студент</option>
<option value="Преподаватель">Преподаватель</option>
<option value="Админ">Админ</option>
</select>
</p>
<p>Препод 2
<select name="prepod_2">
<option value="Студент">Студент</option>
<option value="Преподаватель">Преподаватель</option>
<option value="Админ">Админ</option>
</select>
</p>
<p>Препод 3
<select name="prepod_3">
<option value="Студент">Студент</option>
<option value="Преподаватель">Преподаватель</option>
<option value="Админ">Админ</option>
</select>
</p>
<br>

</select><p></p><br>
<button type="submit">Поехали</button>
</form>
