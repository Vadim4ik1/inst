<?php
session_start();
require_once '../../connect/connect.php';
$id_user=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php $term = mysqli_query($connect, "SELECT * FROM `User` WHERE `id_user`='$id_user' ");
		$term = mysqli_fetch_all($term);
		foreach ($term as $term) {
            ?>
            Перевести из группы:
                      <a><?=$term[13]?></a>
                      в группу
                      <form action="update_group.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id_user" value="<?=$id_user?>" >
                      <select name="group" id="">
                      <?php 
                      $gr = mysqli_query($connect, "SELECT DISTINCT `groupp` FROM `User` ");
                        $gr = mysqli_fetch_all($gr);
                        foreach ($gr as $gr) {
                            ?>
                        <option value="<?=$gr[0]?>"><?=$gr[0]?></option>
                        <?php } ?>

                    </select>
                            <input type="submit">
            <?php }?>
            <br>    
            <br>    <a href="../../admin_page.php">Админка</a>

</body>
</html>

