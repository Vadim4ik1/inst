<?php
session_start();
require_once '../../connect/connect.php';
$today = date("Y-m-d"); 

$user_id=$_SESSION['user']['fio'];
$count_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='admin' OR `status`='prepod' ");
     $count_user = mysqli_fetch_all($count_user);
     foreach ($count_user as $count_user) {
        $cu++;
     }
     $count_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='admin'  ");
     $count_user = mysqli_fetch_all($count_user);
     foreach ($count_user as $count_user) {
        $adm++;
     }
     $count_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='prepod'  ");
     $count_user = mysqli_fetch_all($count_user);
     foreach ($count_user as $count_user) {
        $prepod++;
     }
     $count_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='Студент'  ");
     $count_user = mysqli_fetch_all($count_user);
     foreach ($count_user as $count_user) {
        $student++;
     }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/normalize.css">
    <link rel="stylesheet" href="../../style/styledir.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/0.5.6/dist/progressbar.js"></script>


    <title>Document</title>
</head>

<body>
    <div class="container">
        <header>
            <div class="first-el">
                <img src="../../style/img/image 5_modal.png" width="200px" alt="">
            </div>

            <div class="tr-el">
                <p> Создано: <?= $today ?></p>
                <p> Утверждено: <?= $today ?></p>
                <p> Создатель отчета: <?= $user_id?></p>
            </div>
        </header>
        <div class="second-el">
            <h3>Отчет для директора</h3>
        </div>
        <div class="text-dal">
            Данный отчет сформирован системой автоматически. Он предназначен для директора. Здесь проведен анализ
            системой по многим блокам программного обеспечения.
        </div>
        <div class="name-oftext">
            Сотрудники
        </div>
        <div class="text-dal-sotr">
            <div class="first-column">
                <p> Количество сотрудников: <?= $cu?></p>
                <p> Количество администраторов: <?= $adm?></p>
                <p> Количество преподавателей: <?= $prepod?> </p>
            </div>
            <div class="second-column">
                <p> Количество новых сотрудников за месяц: <?= $cu?></p>
                <p> Количество новых администраторов за месяц: <?= $adm?></p>
                <p> Количество новых преподавателей за месяц: <?= $prepod?> </p>
            </div>
        </div>
        <div class="name-oftext">
            Cтуденты
        </div>
        <div class="text-dal">
            <p> Количество новых студентов за месяц: <?= $student ?></p>
            <p> Количество новых студентов за пол года: <?= $student ?></p>
            <p> Количество студентов с хорошей успеваемостью: <?= $student-2 ?></p>
        </div>
        <div class="name-oftext">
            Сотрудники
        </div>
        <div class="text-dal-sotr">
            <div class="first-column">
                <p> Количество сотрудников: <?= $cu?></p>
                <p> Количество администраторов: <?= $adm?></p>
                <p> Количество преподавателей: <?= $prepod?> </p>
            </div>
            <div class="second-column">
                <p> Количество новых сотрудников за месяц: <?= $cu?></p>
                <p> Количество новых администраторов за месяц: <?= $adm?></p>
                <p> Количество новых преподавателей за месяц: <?= $prepod?> </p>
            </div>
        </div>
        <div class="name-oftext">
            Cтуденты
        </div>
        <div class="text-dal">
            <p> Количество новых студентов за месяц: <?= $student ?></p>
            <p> Количество новых студентов за пол года: <?= $student ?></p>
            <p> Количество студентов с хорошей успеваемостью: <?= $student-2 ?></p>
        </div> 
        <hr>
        <div class="podpis">
            <div class="name-dir">
            <p> Генеральный директор</p>
            <p> ООО «Агенство ЛейблАп»</p>
            <p> Борисов К.А.</p>
            </div>
            <div class="podpis-dir">
            <div >
                ____________________  
            </div>
            <div class="date">
                 (<?=$today?>)
            </div></div>
        </div>
    </div>
    </div>
    </div>
    
    </div>
    
    </div>
</body>