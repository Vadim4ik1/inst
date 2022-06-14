<?php
session_start();
require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_test=$_POST['id_test'];
$number_question=$_POST['number_question'];
$id_question=$_POST['id_question'];
$type_question=$_POST['type_question'];
$user_id=$_SESSION['user']['fio'];
$answer=$_POST['answer'];
$answer_2=$_POST['answer_2'];
$answer_3=$_POST['answer_3'];
mysqli_query($connect,"INSERT INTO `test_history` (`id_test_history`, `id_user`, `id_test`, `id_question`, `answer`, `answer_2`, `answer_3`, `type_question`) VALUES (NULL,'$user_id','$id_test','$id_question','$answer','$answer_2','$answer_3','$type_question')");

$number_question+=1;
echo("номер вопроса".$number_question."-");
echo($id_test);
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
        <form action="test.php" method="post" enctype="multipart/form-data">
                вопрос:
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
                                     <input type="submit" value="Следующий вопрос" >
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