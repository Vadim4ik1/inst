<?php
session_start();
require_once '../../connect/connect.php';
require_once '../../connect/menu.php';
$cifra=1;


?>
<script> 
    group.classList.add('namecolor'); 
</script>
<!DOCTYPE html>
<html lang="en">


</head>

    <div class="main">
        <h1 class="name-of"> Управление группой
        </h1>
        <table class="tablica-user">
            <tr>
                <td>
                  №
                </td>
                <td> Название группы</td>
                <td>
                   Препод
                </td>
                <td>

                </td>
            </tr>
            <tr>
            <?php $gr = mysqli_query($connect, "SELECT * FROM `group`");
		$gr = mysqli_fetch_all($gr);
		foreach ($gr as $gr) {
            ?>
            <td>  <?=$cifra?></td>
        <td>
                <a href="group_people.php?id=<?=$gr[1]?>"><?=$gr[1]?></a>
                </td>
          
            <td> <?= $gr[2] ?></td>
            <td>
                <a href="change_group.php?id=<?=$gr[1]?>">Изменить группу</a></td>

            </tr>
            <?php
    $cifra++;
    }?>

        </table>
        <div class="buttons-head">
            <a class="js-open-modal" data-modal="1" class="white-button" href="">Добавить группу</a>


        </div>



        <!-- <a href="#" class="js-open-modal" data-modal="2">Открыть окно 2</a> -->



        <div class="modal" data-modal="1">
            <img src="../../style/img/image 5_modal.png" class="img-modal" alt="">
            <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z" />
            </svg>
            <p class="modal__title"> </p>
            <form action="../../inc/group/add.php" method="post" enctype="multipart/form-data">
                <input style="width:80%;" placeholder="Название группы" class="inputs-head" type="text" name="group">
                <p>Преподаватель</p><select name="prepod" style="width:60%;" id="">
                    <?php $pr = mysqli_query($connect, "SELECT * FROM `user` WHERE `status`='prepod'");
		$pr = mysqli_fetch_all($pr);
		foreach ($pr as $pr) {?>
                    <option value="<?=$pr[1]?>">
                        <?=$pr[1]?>
                    </option>

                    <br>

                    <?php }?>

                </select>
                <input type="submit" class="input-but-modal" value="Добавить">
            </form>


        </div>

        <!--  
   <svg class="modal__cross js-modal-close" xmlns="http://www.w3.org/2000/svg"               viewBox="0 0 24 24"><path d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
   <p class="modal__title">Заголовок окна 2</p>
</div> -->

        <div class="overlay js-overlay-modal"></div>




</body>


</html>
<script>
    ! function (e) {
        "function" != typeof e.matches && (e.matches = e.msMatchesSelector || e.mozMatchesSelector || e
            .webkitMatchesSelector || function (e) {
                for (var t = this, o = (t.document || t.ownerDocument).querySelectorAll(e), n = 0; o[n] && o[n] !==
                    t;) ++n;
                return Boolean(o[n])
            }), "function" != typeof e.closest && (e.closest = function (e) {
            for (var t = this; t && 1 === t.nodeType;) {
                if (t.matches(e)) return t;
                t = t.parentNode
            }
            return null
        })
    }(window.Element.prototype);


    document.addEventListener('DOMContentLoaded', function () {
        var modalButtons = document.querySelectorAll('.js-open-modal'),
            overlay = document.querySelector('.js-overlay-modal'),
            closeButtons = document.querySelectorAll('.js-modal-close');


        modalButtons.forEach(function (item) {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                var modalId = this.getAttribute('data-modal'),
                    modalElem = document.querySelector('.modal[data-modal="' + modalId + '"]');
                modalElem.classList.add('active');
                overlay.classList.add('active');
            }); // end click

        }); // end foreach


        closeButtons.forEach(function (item) {

            item.addEventListener('click', function (e) {
                var parentModal = this.closest('.modal');

                parentModal.classList.remove('active');
                overlay.classList.remove('active');
            });

        }); // end foreach


        document.body.addEventListener('keyup', function (e) {
            var key = e.keyCode;

            if (key == 27) {

                document.querySelector('.modal.active').classList.remove('active');
                document.querySelector('.overlay').classList.remove('active');
            };
        }, false);


        overlay.addEventListener('click', function () {
            document.querySelector('.modal.active').classList.remove('active');
            this.classList.remove('active');
        });




    }); // end ready
</script>

</body>

</html>