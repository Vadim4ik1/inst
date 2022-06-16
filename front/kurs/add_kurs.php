

<?php
session_start();
require_once '../../connect/connect.php';
?>
<!DOCTYPE html>
<form action="../../inc/kurs/add_kurs.php" method="post" enctype="multipart/form-data">
<p>Название курса</p><input type="text" name="name_kurs"><br>
<p>Группа
<select name="group">
<?php $term = mysqli_query($connect, "SELECT * FROM `group`");
		$term = mysqli_fetch_all($term);
        echo($term);
		foreach ($term as $term) { 
            ?>
             <option value="<?=$term[1]?>"><?=$term[1]?></option>

        <?php } ?>

</select>

<input type="submit" value="Добавить">
</form>
