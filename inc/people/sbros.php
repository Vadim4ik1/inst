<?php
session_start();

require_once '../../connect/connect.php';

$id_test = $_POST['id_test'];
$id_user = $_POST['id_user'];
echo($id_test);
mysqli_query($connect,"DELETE FROM `test_history` WHERE `id_test` = '$id_test' AND `id_user` = '$id_user'");
$people = mysqli_query($connect, "SELECT * FROM `user` WHERE `id_user`='$id_user' ");
$people = mysqli_fetch_all($people);
foreach ($people as $people) { 
    $id_user=$people[0];
}
header('Location:../../front/people/allpeople.php?id='.$id_user);

?>
       
       