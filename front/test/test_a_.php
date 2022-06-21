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

            <p>Вопрос : <br> <?=$numb_q[1] ?></p>
       
            <?php if($numb_q[10]=="input" && $button_update==0){?>
                <div class="input_test">
            <input type="text" name="answer">


            <?php }elseif($numb_q[10]=="input" && $button_update==1){
            $cttt = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' AND `id_user`='$user_id' ");
            $cttt = mysqli_fetch_all($cttt);
           
             foreach ($cttt as $cttt) {
             
             $answer_input=$cttt[4];
             }
                ?>
                 <div class="input_test">
            <input type="text" name="answer" value="<?=$answer_input?>">
            </div> 
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
                <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                <input type="hidden" name="number_question" value="<?= $number_question ?>">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
                <?php if(!empty($numb_q[2])){ ?>
                <p><?= $numb_q[2]?>
                    <input type="checkbox" class="custom-checkbox" name="answer" value="<?= $numb_q[2]?>"></p> 
                <?php  } ?>
                <?php if(!empty($numb_q[3])){ ?>
                <p><?= $numb_q[3]?>
                    <input type="checkbox" class="custom-checkbox" name="answer_2" value="<?= $numb_q[3]?>"></p>
                 <?php  } ?>
                 <?php if(!empty($numb_q[4])){ ?>
                <p><?= $numb_q[4]?>
                    <input type="checkbox" class="custom-checkbox" name="answer_3" value="<?= $numb_q[4]?>"></p>
                    <?php  } ?>
                    <?php if(!empty($numb_q[5])){ ?>
                <p><?= $numb_q[5]?>
                    <input type="checkbox" class="custom-checkbox" name="answer_4" value="<?= $numb_q[5]?>"></p>
                    <?php  } ?>
                    <?php if(!empty($numb_q[6])){ ?>
                <p><?= $numb_q[6]?>
                    <input type="checkbox" class="custom-checkbox" name="answer_5" value="<?= $numb_q[6]?>"></p>
                    <?php  } ?>
                    <?php if(!empty($numb_q[7])){ ?>
                <p><?= $numb_q[7]?>
                    <input type="checkbox" class="custom-checkbox" name="answer_6" value="<?= $numb_q[7]?>"></p>
                    <?php  } ?>
                <?php }
            else{
            foreach ($check_test_inpt as $cti) { 
      
                ?><?php if(!empty($numb_q[2])){ ?>
                 <p><?= $numb_q[2]?>

                    <?php if($numb_q[2] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                elseif($numb_q[2] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                elseif($numb_q[2] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer" checked value="<?= $numb_q[2]?>"></p>
                <?php  } 
                else{?>
                <input type="checkbox" class="custom-checkbox" name="answer" value="<?= $numb_q[2]?>"></p>
                <?php }} ?>
                <?php if(!empty($numb_q[3])){ ?><p><?= $numb_q[3]?>
                    <?php if($numb_q[3] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
              elseif($numb_q[3] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
                elseif($numb_q[3] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_2" checked value="<?= $numb_q[3]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" class="custom-checkbox" name="answer_2" value="<?= $numb_q[3]?>"></p>
                <?php }} ?>
                <?php if(!empty($numb_q[4])){ ?><p><?= $numb_q[4]?>
                    <?php if($numb_q[4] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
              elseif($numb_q[4] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
                elseif($numb_q[4] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_3" checked value="<?= $numb_q[4]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" class="custom-checkbox" name="answer_3" value="<?= $numb_q[4]?>"></p>
                <?php }} ?>
                <?php if(!empty($numb_q[5])){ ?><p><?= $numb_q[5]?>
                    <?php
                if($numb_q[5] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
              elseif($numb_q[5] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
                elseif($numb_q[5] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_4" checked value="<?= $numb_q[5]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" class="custom-checkbox" name="answer_4" value="<?= $numb_q[5]?>"></p>
                <?php }} ?>
                <?php if(!empty($numb_q[6])){ ?><p><?= $numb_q[6]?>
                    <?php if($numb_q[6] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
              elseif($numb_q[6] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
                elseif($numb_q[6] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_5" checked value="<?= $numb_q[6]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" class="custom-checkbox" name="answer_5" value="<?= $numb_q[6]?>"></p>
                <?php }} ?>
                <?php if(!empty($numb_q[7])){ ?><p><?= $numb_q[7]?>
                    <?php if($numb_q[7] == $cti[4]){?>
                    <input type="checkbox" class="custom-checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
              elseif($numb_q[7] == $cti[5]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
                elseif($numb_q[7] == $cti[6]){?>
                <input type="checkbox" class="custom-checkbox" name="answer_6" checked value="<?= $numb_q[7]?>"></p>
                <?php  } 
            else{?>
                <input type="checkbox" class="custom-checkbox" name="answer_6" value="<?= $numb_q[7]?>"></p>
                <?php } ?>


                <?php }}}?>



                <?php  } ?>
          
                <input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
                <input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
                <input type="hidden" name="number_question" value="<?= $number_question ?>">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
       
                <div class="buttons">
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
                              
        <input type="submit" value="Обновить ответ" class="but_insert_answer" id="but_update_answer">
        <?php
                            }
                            ?>
      </div>   </div>
            <form class="button_end_test" action="../../inc/test/test_end.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_test" value="<?= $id_test ?>">
                <input type="submit"  value="Завершить тест">
            </form>
            <input type="submit" value="Обновить ответ" class="but_insert_answer disp-false" id="but_update_answer">
         
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
                // alert($('#insert_answer_form').serialize());
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
                // alert($('#insert_answer_form').serialize());
                but_insert_answer.classList.add("disp-false");
                but_update_answer.classList.add("disp-true");
            }
        });

    }
</script>