<?php
session_start();

require_once '../../connect/connect.php';

$id_lesson = $_GET['id'];
 $lesson = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_lesson`=$id_lesson");
		$lesson = mysqli_fetch_all($lesson);
		foreach ($lesson as $lesson) {
        $id_kurs=$lesson[4];
        }


mysqli_query($connect,"DELETE FROM `lesson` WHERE `id_lesson` = $id_lesson ");
header('Location:../../front/kurs/kurs.php?id='.$id_kurs);
?>