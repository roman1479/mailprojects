<?php
session_start();
include_once '../core/config.php';
include_once 'header.php';
// запрос на изменение окна
$ger = $_GET['id'];
// вывод оконо с текущей улсугой(ми)
            $sql = "SELECT * FROM `windowlink` INNER JOIN `window` ON (windowlink.id_okno = window.id_okno) WHERE windowlink.id_okno='$ger'";
            $result = $mysqli->query($sql);
            $row = mysqli_fetch_assoc($result);

            ?>
            <!-- страница редактирования окон -->
            <div id="cont">
              <div class="row" id='header'>
                 <div class="col-md-12"><img src="/images/logo-rp.png"><h1>Работник <a href="exit.php">Выход</a></h1></div>
             </div>
             <div  class="grow">
                <div class="block3">
                  <h3>Редактировать окно</h3>
                  <form action="../models/editwin.php" method="post">        
                    <?php
                    $sql = "SELECT * FROM `window` WHERE `id_okno` = '$ger'";
                    $result = $mysqli->query($sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <label>Название окна ( цифра )</label><br>
                    <?php echo "<input type='hidden' name='hid' value=".$ger."><br>"; ?>
                    <textarea rows="4" cols="95" name="okno" placeholder="" class="message"><?php echo $row['name']; ?></textarea><br>
                    <span>Услуги к этому окну</span><br>
                    <?php
                    $sql = "SELECT * FROM `type`";
                    $result2 = $mysqli->query($sql);
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $idtype = $row2['id_service'];
                        $sql = "SELECT * FROM `windowlink` WHERE `id_okno` = '$ger' AND `id_type` = '$idtype'";
                        $result4 = $mysqli->query($sql);
                        $row4 = $result4->num_rows;
                        if($row4 == 0){
                            echo "<input type='checkbox' name='number[]' value=".$row2['id_service'].">".$row2['name']."<br>";
                        }
                        else{
                            echo "<input type='checkbox' checked name='number[]' value=".$row2['id_service'].">".$row2['name']."<br>";
                        }
                    }
                    ?>
                    <p></p>
                    <input type="submit" class="inputbuttom" name="submit"  value="изменить">
                    <a href='rabotnik.php'>вернуться</a>
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>