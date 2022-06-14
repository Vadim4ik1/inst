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
    sadsad
<br>
<?php $term = mysqli_query($connect, "SELECT DISTINCT `groupp` FROM `User` ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {

            ?>
                      <a href="group_people.php?id=<?=$term[0]?>"><?=$term[0]?></a>
<br>

            <?php }?>
            <br>    <a href="../../admin_page.php">Админка</a>

</body>
</html>

