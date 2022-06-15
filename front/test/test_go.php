<?php
session_start();
require_once '../../connect/connect.php';
$id_test=$_POST['id_test'];
$number_question=1;
$user_id=$_SESSION['user']['fio'];
// echo($user_id);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/normalize.css">
    <link rel="stylesheet" href="../../style/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>

    <div class="main">
    <div class="vopros">
                <?php

                $numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`=$id_test");
                $numb_q = mysqli_fetch_all($numb_q);
                foreach ($numb_q as $numb_q) {
                    ?>
                      <form action="test_a_.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                            <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                            <input type="hidden" name="number_question" value="<?= $number_question ?>">
                            <input type="hidden" name="id_test" value="<?= $id_test ?>">
                                
                        
                            <input type="submit" value="<?= $numb_q[11] ?>"  id="vopros_<?=$numb_q[11]?>">

                            <?php 
                            $test_h = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' ");
                            $test_h = mysqli_fetch_all($test_h);  
                            foreach ($test_h as $test_h) {
                                if($test_h[3]==$numb_q[0]){
                                    ?> 
                                
                                <script>
                                    var element = document.getElementById("vopros_<?=$numb_q[11]?>");
                                    element.classList.add("bg-green");
                                </script> 
                                    <?php
                                }
                                ?>
       
                             
                            <?php
                            }
                             ?>

                                </form>
                                <?php

                }   
                    ?>
</div>
        <form action="test.php" method="post" enctype="multipart/form-data">
            
                    <?php 

                                $numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `number_q`=$number_question AND `id_test`=$id_test");
                                $numb_q = mysqli_fetch_all($numb_q);
                                foreach ($numb_q as $numb_q) {
                                ?> 
                                <p>Вопрос : <?=$numb_q[1] ?></p>

                                 <?php if($numb_q[10]=="input"){?>
                                <input type="text" name="answer">
                               
                                 <?php  } ?>
                                 <?php if($numb_q[10]=="check"){?>
                                    <div class="group">
                                <p><?= $numb_q[2]?>
                                <input type="checkbox" name="answer" value="<?= $numb_q[2]?>"></p>
                                <p><?= $numb_q[5]?>
                                <input type="checkbox" name="answer_2" value="<?= $numb_q[5]?>"></p>
                                <p><?= $numb_q[3]?>
                                <input type="checkbox" name="answer_3" value="<?= $numb_q[3]?>"></p>
                                <p><?= $numb_q[6]?>
                                <input type="checkbox" name="answer_4" value="<?= $numb_q[6]?>"></p>
                                <p><?= $numb_q[7]?>
                                <input type="checkbox" name="answer_5" value="<?= $numb_q[7]?>"></p>
                                <p><?= $numb_q[4]?>
                                <input type="checkbox" name="answer_6" value="<?= $numb_q[4]?>"></p>
                                 <?php  } ?>
                                 </div>
                            <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                            <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                            <input type="hidden" name="number_question" value="<?= $number_question ?>">
                            <input type="hidden" name="id_test" value="<?= $id_test ?>">

                                     <?php }?> 
                                     <input type="submit" value="Сохранить" >
                                     <input type="submit" value="Завершить тест" >

        </form>
                </body>
                </html>

                <script>

	$(".group input").on("click", function() {

		if($(".group input:checked").length >= 3) { 
			
			$(".group input:not(:checked)").attr("disabled", true);
		
		} else {
			
			$(".group input:disabled").attr("disabled", false);
		
		}

	});
	
</script>