<?php
session_start();

require_once 'connect/connect.php';
date_default_timezone_set('UTC');
// $id_test=$_POST['id_test'];
$id_test=1;
$user_id=$_SESSION['user']['fio'];
$type_test="ended";
$count_otvechennih=0;
$count_pravilnih=0;
$ball=0;
$vsegovoprosov=0;

// echo($id_test.$user_id);
$count_ques=0;
$ques = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`='$id_test'");
$ques = mysqli_fetch_all($ques);
foreach ($ques as $ques) {
   $count_ques++; 
}  
$people = mysqli_query($connect, "SELECT * FROM `test_history` WHERE `id_test`='$id_test' AND `id_user`='$user_id' ");
		$people = mysqli_fetch_all($people);
		foreach ($people as $people) {
            $count_otvechennih++;
            $ques = mysqli_query($connect, "SELECT * FROM `test` WHERE `id_test`='$id_test'");
            $ques = mysqli_fetch_all($ques);
            foreach ($ques as $ques) {
                    if($people[3]==$ques[0]){ 
                      
                       
                        if($ques[10]=="input"){
                            if($ques[2]==$people[4]){
                                $ball++;
                                $count_pravilnih++;
                               
                            }
                        }elseif($ques[10]=="check"){
                            if($ques[2]==$people[4] ){
                                $ball=$ball+0.333;
                                $count_pravilnih=$count_pravilnih+0.333;
                            }
                            if($ques[3]==$people[5]  ){
                                $ball=$ball+0.333;
                                $count_pravilnih=$count_pravilnih+0.333;
                            }
                            if($ques[4]==$people[6]){
                                $ball=$ball+0.333;
                                $count_pravilnih=$count_pravilnih+0.333;
                            }
                        }
                      
                    }
            }   
        }

        echo(gettype($count_pravilnih));
        // round($count_pravilnih);
        // $count_pravilnih= (int) $count_pravilnih;
        // $count_ques= (int) $count_ques;
         echo("Отвеченных правильнj".$count_pravilnih."");

        $procent=($count_pravilnih*100)/$count_ques;
        $drob=$count_pravilnih/$count_ques;
        $ocenka=($count_pravilnih*5)/$count_ques;
        $ocenka=ceil($ocenka);
        $count_nepravilnih=$count_ques-$count_pravilnih;
        ceil($count_nepravilnih);
        echo("vsego voprosov-".$count_ques);
        echo("ocenka".$ocenka);
        $procent=ceil($procent);
        echo("procent".$procent);
        $today = date("Y-m-d H:i:s"); 
        // echo($user_id);
        mysqli_query($connect,"INSERT INTO `ball` (`id`, `id_user`, `id_test`, `ball`, `date`, `procent`, `true_answer`, `false_answer`, `all_answer`, `drob`) VALUES (NULL, '$user_id', '$id_test', '$ocenka', ' $today', '$procent', '$count_pravilnih', '$count_nepravilnih', '$count_ques', '$drob')");

        // elseif($ques[10]=="check"){
        //     if($ques[2]==$people[4] && $ques[3]==$people[5] && $ques[4]==$people[6]){
        //         $ball++;
        //         $count_pravilnih++;
        //     }
        //     if($ques[2]==$people[4] && $ques[3]==$people[5] && $ques[4]!==$people[6] ){
        //         $ball=$ball+0.66;
        //         $count_pravilnih=$count_pravilnih+0.67;
        //     }
        //     if($ques[2]==$people[4] && $ques[3]!=$people[5] && $ques[4]==$people[6] ){
        //         $ball=$ball+0.66;
        //         $count_pravilnih=$count_pravilnih+0.67;
        //     }
        //     if($ques[2]!=$people[4] && $ques[3]==$people[5] && $ques[4]==$people[6] ){
        //         $ball=$ball+0.66;
        //         $count_pravilnih=$count_pravilnih+0.67;
        //     }
        //     if($ques[2]==$people[4] && $ques[3]!=$people[5] && $ques[4]!=$people[6] ){
        //         $ball=$ball+0.33;
        //         $count_pravilnih=$count_pravilnih+0.33;
        //     }
        //     if($ques[2]!=$people[4] && $ques[3]==$people[5] && $ques[4]!=$people[6] ){
        //         $ball=$ball+0.33;
        //         $count_pravilnih=$count_pravilnih+0.33;
        //     }
        //     if($ques[2]!=$people[4] && $ques[3]!=$people[5] && $ques[4]==$people[6] ){
        //         $ball=$ball+0.33;
        //         $count_pravilnih=$count_pravilnih+0.33;
        //     }

        // }