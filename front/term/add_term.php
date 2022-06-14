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
<form enctype="multipart/form-data" action="../../inc/term/add_term.php" method="POST">

<p>Термин<input type="text" name="name"></p>
<p>Объяснение<input type="text" name="text"></p>
<!-- <p>Видео лекции не работает<input type="file" name="video"></p> -->
<!-- <input type="hidden" value="<?= $number ?>" name="number"> -->

<input type="submit" value="Добавить">
</form>
  </video>

</body>
</html>

