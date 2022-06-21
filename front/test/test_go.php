<?php
session_start();
require_once '../../connect/connect.php';
$id_test=$_POST['id_test'];
$number_question=1;
$user_id=$_SESSION['user']['fio'];
$id_user=$_SESSION['user']['id_user'];
$user_id=$_SESSION['user']['fio'];
$user_gr=$_SESSION['user']['groupp'];
$users = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
$users = mysqli_fetch_all($users);
foreach ($users as $users) {
  $status = $users[4];
  $user_pic=$users[3];
}
?>
<!DOCTYPE html>
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

<body class="body-white">
<header class="header">
<div class="container-up">
<div>
<!-- <div class="podcont-up" style="display: flex;align-items:center;margin-left:10px; padding-right:5px;">  -->

<img style="border-radius:30px;" src="../../<?=$user_pic?>" width="50px" alt=""></div>
<div style="width: 10px;"></div>
<?php echo($_SESSION['user']['fio']);?>
</div>
<div>
<img src="../../style/img/image5.png" alt="">
</div>
</div>
</header>
<div class="sidenav">
<div class="hr">
<hr>
</div>


<a style="pointer-events: none;color:gray;" href="../../admin_page.php">ЛИЧНЫЙ КАБИНЕТ</a>
<div class="hr">
<hr>
</div>
<?php if($status=="admin"){ ?>
<a style="pointer-events: none;color:gray;" href="../people/allpeople.php">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</a>
<div class="hr">
<hr>
</div>
<?php } ?>
<a style="pointer-events: none;color:gray;" href="../kurs/kurses.php">РАЗДЕЛЫ</a>
<div class="hr">
<hr>
</div>
<?php if($status=="admin"){ ?>
<a style="pointer-events: none;color:gray;" style="color:red;" href="tests.php">ТЕСТЫ</a>
<?php } ?>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../otchet/otchet_fordir.php">ОТЧЕТЫ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../term/term.php">БАЗА ЗНАНИЙ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../group/group.php">ГРУППЫ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../signinup/admin_signin.php">ЗАРЕГИСТРИРОВАТЬ ЧЕЛОВЕКА</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../kurs/add_kurs.php">ДОБАВИТЬ РАЗДЕЛ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../help/help.php">ВОПРОСЫ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;" href="../group/select_group.php">УПРАВЛЕНИЕ ГРУППОЙ</a>
<div class="hr">
<hr>
</div>
<a style="pointer-events: none;color:gray;;color:gray;" href="../../inc/singup/logout.php">ВЫЙТИ</a>
</div>
<div class="main">
    <div class="vopros">
                <?php

                $numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`=$id_test");
                $numb_q = mysqli_fetch_all($numb_q);
                $number_question_test_a=2;
                foreach ($numb_q as $numb_q) {
                    ?>
                      <form action="test_a_.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                            <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                            <input type="hidden" name="number_question" value="<?= $number_question_test_a ?>">
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
        <form method="post" id="insert_answer_form" enctype="multipart/form-data">
            
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
                                     <!-- <input type="submit" value="Сохранить" > -->
                                     <input type="submit" value="Завершить тест" >
                             
        </form>
        <input type="submit" value="Обновить" class="but_insert_answer disp-false " id="but_update_answer" >
        <input type="submit" value="Сохранить ответ" class="but_insert_answer" id="but_insert_answer" >
                </body>
                </html>
                <script type="text/javascript" >
                var but_update_answer = document.getElementById("but_update_answer");
                var but_insert_answer = document.getElementById("but_insert_answer");

                document.querySelector("#but_insert_answer").onclick = function(){
                    $.ajax({
        type: "POST",
        url: "../../inc/test/test_first_q.php",
        data: $('#insert_answer_form').serialize(),
       
        success: function(response) {
            alert("Ответ записан");    
            but_insert_answer.classList.add("disp-false");
            but_update_answer.classList.add("disp-true");
         }
        });

}
</script>
                <script>

	$(".group input").on("click", function() {

		if($(".group input:checked").length >= 3) { 
			
			$(".group input:not(:checked)").attr("disabled", true);
		
		} else {
			
			$(".group input:disabled").attr("disabled", false);
		
		}

	});
	
</script>