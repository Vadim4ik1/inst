<?php
session_start();
require_once '../../connect/connect.php';
date_default_timezone_set('UTC');
$id_test=$_POST['id_test'];
$number_question=$_POST['number_question'];
$id_question=$_POST['id_question'];
$type_question=$_POST['type_question'];
$user_id=$_SESSION['user']['fio'];

                $proverka_zapis = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`=$id_test AND `id_question`='$id_question'");  
                $proverka_zapis = mysqli_fetch_all($proverka_zapis);
                foreach ($proverka_zapis as $p_z) {
                    if(!empty($p_z[1])){
                         
                    $button_update=1;
                     }
                     else{
                    $button_update=0; 
                     }
                }
echo($number_question);
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

    <div class="main-test">
        <div class="vopros">
            <?php

$numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`=$id_test");
$numb_q = mysqli_fetch_all($numb_q);
foreach ($numb_q as $numb_q) {
    ?>
            <form action="test_a_.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                <input type="hidden" name="number_question" value="<?= $numb_q[11] ?>">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
                <input type="submit" value="<?= $numb_q[11] ?>" id="vopros_<?=$numb_q[11]?>">

                <?php 
            $test_h = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' AND `id_user`='$user_id' ");
            $test_h = mysqli_fetch_all($test_h);  
            foreach ($test_h as $test_h) {
                
                if($test_h[3] == $numb_q[0]){
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
    ?></div>
        <?php 
                                $numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `number_q`=$number_question AND `id_test`=$id_test");
                                $numb_q = mysqli_fetch_all($numb_q);
                                if(!empty($numb_q[1])){
                                   ?>
        <form action="test.php" method="post" enctype="multipart/form-data">
            <input type="hidden" value="id_test" value="<?= $id_test ?>">
            <input type="submit" value="Закончить тест">
        </form>
        <?php
                                }
                                else{

                            
                                foreach ($numb_q as $numb_q) {
                                   
                                ?>
        <form method="post" id="insert_answer_form" enctype="multipart/form-data">

            <p>Вопрос : <?=$numb_q[1] ?></p>
            <?php if($numb_q[10]=="input" && $button_update==0){?>
            <input type="text" name="answer">


            <?php }elseif($numb_q[10]=="input" && $button_update==1){
            $cttt = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' AND `id_user`='$user_id' ");
            $cttt = mysqli_fetch_all($cttt);
           
             foreach ($cttt as $cttt) {
             
             $answer_input=$cttt[4];
             }
                ?>
            <input type="text" name="answer" value="<?=$answer_input?>">

            <?php 
                                }
                                
                                ?>


            <?php if($numb_q[10]=="check"){?>
            <div class="group">

                <?php 
        $id_quest=$numb_q[0];              
        $check_test_inpt = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' AND `id_question`='$id_quest' ");
        $check_test_inpt = mysqli_fetch_all($check_test_inpt);
            if(empty($check_test_inpt)){?>
                <p><?= $numb_q[2]?>
                    <input type="checkbox" name="answer" value="<?= $numb_q[2]?>"></p>
                    
                <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                <input type="hidden" name="number_question" value="<?= $number_question ?>">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
                <p><?= $numb_q[3]?>
                    <input type="checkbox" name="answer_2" value="<?= $numb_q[3]?>"></p>
                <p><?= $numb_q[4]?>
                    <input type="checkbox" name="answer_3" value="<?= $numb_q[4]?>"></p>
                <p><?= $numb_q[5]?>
                    <input type="checkbox" name="answer_4" value="<?= $numb_q[5]?>"></p>
                <p><?= $numb_q[6]?>
                    <input type="checkbox" name="answer_5" value="<?= $numb_q[6]?>"></p>
                <p><?= $numb_q[7]?>
                    <input type="checkbox" name="answer_6" value="<?= $numb_q[7]?>"></p>

                <?php }
            else{
            foreach ($check_test_inpt as $cti) { 
      
                ?> <p><?= $numb_q[2]?>
                    <?php if($numb_q[2] == $cti[4]){?>
                    <input type="checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                elseif($numb_q[2] == $cti[5]){?>
                <input type="checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                elseif($numb_q[2] == $cti[6]){?>
                <input type="checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                else{?>
                <input type="checkbox" name="answer" value="<?= $numb_q[2]?>"></p>
                <?php } ?>
                <p><?= $numb_q[3]?>
                    <?php if($numb_q[3] == $cti[4]){?>
                    <input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
              elseif($numb_q[3] == $cti[5]){?>
                <input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
                elseif($numb_q[3] == $cti[6]){?>
                <input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" name="answer_2" value="<?= $numb_q[3]?>"></p>
                <?php } ?>
                <p><?= $numb_q[4]?>
                    <?php if($numb_q[4] == $cti[4]){?>
                    <input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
              elseif($numb_q[4] == $cti[5]){?>
                <input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
                elseif($numb_q[4] == $cti[6]){?>
                <input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" name="answer_3" value="<?= $numb_q[4]?>"></p>
                <?php } ?>
                <p><?= $numb_q[5]?>
                    <?php
                if($numb_q[5] == $cti[4]){?>
                    <input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
              elseif($numb_q[5] == $cti[5]){?>
                <input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
                elseif($numb_q[5] == $cti[6]){?>
                <input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" name="answer_4" value="<?= $numb_q[5]?>"></p>
                <?php } ?>
                <p><?= $numb_q[6]?>
                    <?php if($numb_q[6] == $cti[4]){?>
                    <input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
              elseif($numb_q[6] == $cti[5]){?>
                <input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
                elseif($numb_q[6] == $cti[6]){?>
                <input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" name="answer_5" value="<?= $numb_q[6]?>"></p>
                <?php } ?>
                <p><?= $numb_q[7]?>
                    <?php if($numb_q[7] == $cti[4]){?>
                    <input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
              elseif($numb_q[7] == $cti[5]){?>
                <input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
                elseif($numb_q[7] == $cti[6]){?>
                <input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" name="answer_6" value="<?= $numb_q[7]?>"></p>
                <?php } ?>


                <?php }}?>



                <?php  } ?>

                <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                <input type="hidden" name="number_question" value="<?= $number_question ?>">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
            </div>

            <?php }   }?>

        </form>
        <?php 
                            if($button_update==0){
                                ?>
        <input type="submit" value="Сохранить ответ" class="but_insert_answer" id="but_insert_answer">
        <?php
                            }
                            else{
                                ?>
        <input type="submit" value="Обновить" class="but_insert_answer" id="but_update_answer">
        <?php
                            }
                            ?>
        <form action="../../inc/test/test_end.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_test" value="<?= $id_test ?>">
            <input type="submit" value="Завершить тест">
        </form>
        <input type="submit" value="Обновить" class="but_insert_answer disp-false" id="but_update_answer">

    </div>

</body>

</html>


<script type="text/javascript">
    var but_update_answer = document.getElementById("but_update_answer");
    var but_insert_answer = document.getElementById("but_insert_answer");

    document.querySelector("#but_insert_answer").onclick = function () {
        $.ajax({
            type: "POST",
            url: "../../inc/test/test_first_q.php",
            data: $('#insert_answer_form').serialize(),

            success: function (response) {
                alert($('#insert_answer_form').serialize());
                but_insert_answer.classList.add("disp-false");
                but_update_answer.classList.add("disp-true");
            }
        });
    }
</script>
<script type="text/javascript">
    document.querySelector("#but_update_answer").onclick = function () {
        $.ajax({
            type: "POST",
            url: "../../inc/test/update_answer.php",
            data: $('#insert_answer_form').serialize(),

            success: function (response) {
                alert($('#insert_answer_form').serialize());
                but_insert_answer.classList.add("disp-false");
                but_update_answer.classList.add("disp-true");
            }
        });

    }
</script>