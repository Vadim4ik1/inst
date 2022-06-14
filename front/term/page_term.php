<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="../../inc/term/update_term.php" method="post" enctype="multipart/form-data">
<?php 
$term = mysqli_query($connect, " SELECT * FROM `term` WHERE `id_term` = '$id' ");
$term = mysqli_fetch_all($term);
foreach ($term as $term) { ?>
<input type="hidden" name="id_term" value="<?= $term[0] ?>">
<p>Термин
    <p><?= $term[1] ?></p></p>
    <p>Объяснение
    <p><?= $term[2] ?></p></p>

            <?php }?>

            </form>
            <br>    <a href="../../admin_page.php">Админка</a>

</body>
</html>

