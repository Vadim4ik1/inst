<?php
session_start();
require_once '../../connect/connect.php';
$id=$_POST['id_test'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php       
            $oik = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`='$id' ");
            $oik = mysqli_fetch_all($oik);
            foreach ($oik as $oik) {?>
          <p>Вопрос <?=$oik[1]?></p> 
          <p>Правильный ответ <?=$oik[2]?></p>

          <?php 
               
               if(!empty($oik[3])){ ?>  
                <p>Правильный ответ 2: <?=$oik[3]?></p>
        
                   

                <?php       }
             
            if(!empty($oik[4])){ ?>  
                <p>Правильный ответ 3: <?=$oik[4]?></p>
            
                <?php       } ?>
            
                <p>Неправильный ответ 1: <?=$oik[5]?></p>
                <p>Неправильный ответ 2: <?=$oik[6]?></p>
                <p>Неправильный ответ 3: <?=$oik[7]?></p>
            
            
            
            
           
                <a href="edit_q.php?id=<?=$oik[0]?>">Изменить вопрос</a> <hr>
            <?php  } ?>
</body>
</html>



