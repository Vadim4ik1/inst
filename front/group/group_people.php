<?php
session_start();
require_once '../../connect/connect.php';
$group=$_GET['id'];
echo($group);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<br>
<?php $term = mysqli_query($connect, "SELECT * FROM `user` WHERE `groupp`='$group' ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {

            ?>
                      <a><?=$term[1]?></a>
                      <!-- <a href="change_group.php?id=<?=$term[0]?>">Перевести в другую группу</a> -->

<br>

            <?php }?>
            <br>    

</body>
</html>

