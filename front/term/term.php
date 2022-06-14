<?php
session_start();
require_once '../../connect/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<a href="add_term.php">добавить термин</a>
<br>
<?php $term = mysqli_query($connect, "SELECT * FROM `term` ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {

            ?>
             <a href="page_term.php?id=<?=$term[0]?>"><?=$term[1]?></a>
           <?=$term[1]  ?>-
            <?=$term[2]  ?>

            <a href="edit_term.php?id=<?=$term[0]?>">Редактировать</a>
            <a href="edit_people_pass.php?id=<?=$people[0]?>">Удалить</a>
<br>    <a href="../../admin_page.php">Админка</a>
            <?php }?>

</body>
</html>

