<?php
session_start();
require_once '../../connect/connect.php';
$group=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<form action="../../inc/group/update.php" method="post" enctype="multipart/form-data">
<?php $term = mysqli_query($connect, "SELECT * FROM `group` WHERE `name`='$group' ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {
            ?>
            <input type="hidden" name="id" value="<?=$term[0]?>">
            Название <input type="text" name="group" value="<?=$term[1]?>">
            Препод 
                      <select name="prepod" id="">
                      <?php 
                      $pr = mysqli_query($connect, "SELECT * FROM `user` where `status`='prepod' ");
                        $pr = mysqli_fetch_all($pr);
                        foreach ($pr as $pr) {
                            ?>
                        <option value="<?=$pr[1]?>"><?=$pr[1]?></option>
                        <?php } ?>

                    </select>
                            <input type="submit">
                            <a href="../../inc/group/delete.php?id=<?=$term[0]?>">Удалить к хренам группу</a>

            <?php }?>
            <br>    

</body>
</html>

