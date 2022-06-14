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
$answer_4=$_POST['answer_4'];
$answer_5=$_POST['answer_5'];
$answer_6=$_POST['answer_6'];

if($type_question=='check' &&(!empty($answer_1)) &&(empty($answer_2)) &&(empty($answer_3)) &&(empty($answer_4)) &&(empty($answer_5)) &&(empty($answer_6)) )
{
    mysqli_query($connect,"INSERT INTO `test_history` (`id_test_history`, `id_user`, `id_test`, `id_question`, `answer`, `type_question`, `type_test`) VALUES (NULL,'$user_id','$id_test','$id_question','$answer','$type_question', NULL)");
}


mysqli_query($connect,"INSERT INTO `test_history` (`id_test_history`, `id_user`, `id_test`, `id_question`, `answer`, `answer_2`, `answer_3`, `type_question`, `type_test`) VALUES (NULL,'$user_id','$id_test','$id_question','$answer','$answer_2','$answer_3','$type_question', NULL)");
                $proverka_zapis = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`=$id_test AND `id_question`='$id_question'");  
                $proverka_zapis = mysqli_fetch_all($proverka_zapis);
                foreach ($proverka_zapis as $p_z) {
                    if(!empty($p_z[1])){
                         
                    $button_update=1;
                    $input_answer=$p_z[4];
                     }
                     else{
                    $button_update=0; 
                     }
                }
echo($number_question);
$number_question+=1;


?>

<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <link rel="stylesheet" href="../../style/style.css">

                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                <body>


                


                
                <?php

                $numb_q = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`=$id_test");
                $numb_q = mysqli_fetch_all($numb_q);
                foreach ($numb_q as $numb_q) {?>
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
                                      <form  action="test.php"  method="post" enctype="multipart/form-data">

<p>Вопрос : <?=$numb_q[1] ?></p>
<?php if($numb_q[10]=="input" && $button_update==0){?>
    <input type="text" name="answer">
    

<?php }elseif($numb_q[10]=="input" && $button_update==1){?>
<input type="text" name="answer" value="<?=$input_answer?>">

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
<input type="checkbox" name="answer" value="<?= $numb_q[2]?> "></p>
<p><?= $numb_q[3]?>
<input type="checkbox" name="answer_2" value="<?= $numb_q[3]?> "></p>
<p><?= $numb_q[4]?>
<input type="checkbox" name="answer_3" value="<?= $numb_q[4]?> "></p>
<p><?= $numb_q[5]?>
<input type="checkbox" name="answer_4" value="<?= $numb_q[5]?> "></p>
<p><?= $numb_q[6]?>
<input type="checkbox" name="answer_5" value="<?= $numb_q[6]?> "></p>
<p><?= $numb_q[7]?>
<input type="checkbox" name="answer_6" value="<?= $numb_q[7]?> "></p>

<?php }
else{
foreach ($check_test_inpt as $cti) { 

?>    <p><?= $numb_q[2]?>
<?php if($numb_q[2]==$cti[4]){?>

<input type="checkbox" name="answer" checked value="<?= $numb_q[2]?> "></p>
<?php  } 
elseif($numb_q[2]==$cti[5]){?>
<input type="checkbox" name="answer" checked value="<?= $numb_q[2]?> "></p>
<?php  } 
elseif($numb_q[2]==$cti[6]){?>
<input type="checkbox" name="answer" checked value="<?= $numb_q[2]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer"  value="<?= $numb_q[2]?> "></p>
<?php } ?>
<p><?= $numb_q[3]?>
<?php if($numb_q[3]==$cti[4]){?>
<input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?> "></p>
<?php  } 
elseif($numb_q[3]==$cti[5]){?>
<input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?> "></p>
<?php  } 
elseif($numb_q[3]==$cti[6]){?>
<input type="checkbox" name="answer_2" checked value="<?= $numb_q[3]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer_2"  value="<?= $numb_q[3]?> "></p>
<?php } ?>

<p><?= $numb_q[4]?>
<?php if($numb_q[4]==$cti[4]){?>
<input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?> "></p>
<?php  } 
elseif($numb_q[4]==$cti[5]){?>
<input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?> "></p>
<?php  } 
elseif($numb_q[4]==$cti[6]){?>
<input type="checkbox" name="answer_3" checked value="<?= $numb_q[4]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer_3"  value="<?= $numb_q[4]?> "></p>
<?php } ?>
<p><?= $numb_q[5]?>
<?php if($numb_q[5]==$cti[4]){?>
<input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?> "></p>
<?php  } 
elseif($numb_q[5]==$cti[5]){?>
<input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?> "></p>
<?php  } 
elseif($numb_q[5]==$cti[6]){?>
<input type="checkbox" name="answer_4" checked value="<?= $numb_q[5]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer_4"  value="<?= $numb_q[5]?> "></p>
<?php } ?>
<p><?= $numb_q[6]?>
<?php if($numb_q[6]==$cti[4]){?>
<input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?> "></p>
<?php  } 
elseif($numb_q[6]==$cti[5]){?>
<input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?> "></p>
<?php  } 
elseif($numb_q[6]==$cti[6]){?>
<input type="checkbox" name="answer_5" checked value="<?= $numb_q[6]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer_5"  value="<?= $numb_q[6]?> "></p>
<?php } ?>
<p><?= $numb_q[7]?>
<?php if($numb_q[7]==$cti[4]){?>
<input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?> "></p>
<?php  } 
elseif($numb_q[7]==$cti[5]){?>
<input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?> "></p>
<?php  } 
elseif($numb_q[7]==$cti[6]){?>
<input type="checkbox" name="answer_6" checked value="<?= $numb_q[7]?> "></p>
<?php  } 
else{?>
<input type="checkbox" name="answer_6"  value="<?= $numb_q[7]?> "></p>
<?php } ?>


<?php }}?>



 <?php  } ?>
 </div>
<input type="hidden" name="type_question" value="<?= $numb_q[10]?>">
<input type="hidden" name="id_question" value="<?= $numb_q[0]?>">
<input type="hidden" name="number_question" value="<?= $number_question ?>">
<input type="hidden" name="id_test" value="<?= $id_test ?>">
<?php 
if($button_update==0){
?>
<input type="submit"  value="Сохранить" >
<?php
}
else{
?>
                                <input type="submit"  id="but_update_answer" value="123Обновить" >
<input type="submit" value="Обновить" >
<?php
}
?>

     <?php }   }?> 
  
</form>

<form action="../../inc/test/test_end.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_test" value="<?= $id_test ?>">
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
<script type="text/javascript" src="../../connect/jquery.min.js" >
$("#but_update_answer1").click(function(event){
alert("vse ok");
$.ajax({
type: "POST",
url: "../../inc/test/update_answer.php",
data: $('#update_answer_form').serialize(),

success: function(response) {
alert("vse ok");
}
});
});

$("but_update_answer").on("click", function(){
alert("Button clicked!");
});
</script>