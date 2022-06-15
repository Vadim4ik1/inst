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
К какой лекции крепить
<select name="lesson" id="">
       <?php $les = mysqli_query($connect, " SELECT * FROM `lesson` ");
        $les = mysqli_fetch_all($les);
        foreach ($les as $les) {
           
      if($lesson_true==$les[1]){ ?>
        <option selected value="<?= $les[1]?>"><?=$les[1]?></option>
    <?php  }else{?>
        <option  value="<?= $les[1]?>"><?=$les[1]?></option>
     
    
 <?php  } }?>
</select>

<input type="submit" value="Добавить">
</form>
  </video>

</body>
</html>

