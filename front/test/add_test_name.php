
<?php
session_start();
require_once '../../connect/connect.php';
$id=$_GET['id'];
$id_lesson=$_POST['id_lesson'];

// $id_kurs=$_POST['id_kurs'];
?>

<form action="../../inc/test/add_test_name.php" method="post" enctype="multipart/form-data">
<p>Название теста <input type="text" name="test_name"></p>
<!-- <input type="hidden" name="id_kurs" value="<?=$id_kurs ?>"> -->
<input type="hidden" name="id_lesson" value="<?=$id_lesson?>">
<input type="hidden" name="id_kurs" value="<?=$id?>">

<p>Тест добавляется к  
    <select name="id_lesson" id="">

<?php             
            $kurs = mysqli_query($connect, "SELECT * FROM `lesson` WHERE `id_kurs`='$id' ");
		    $kurs = mysqli_fetch_all($kurs);
		    foreach ($kurs as $kurs) {?>
                        <option value="<?=$kurs[0] ?>">
                        <?=$kurs[1] ?>
                        </option>
                   <?php }
                    ?>
     
                   
 
</p>
</select>


<button type="submit">Создать</button>
</form>
