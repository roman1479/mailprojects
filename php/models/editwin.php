<?php
session_start();
include_once '../core/config.php';
// запрос на изменение окна

$ger = $_POST['hid'];
if(isset($_POST['submit'])){
    // удалить все окна у которой тип услуги ...
    $mysqli->query("DELETE FROM `windowlink` WHERE id_okno = '$ger'");
    $mysqli->query("DELETE FROM `window` WHERE id_okno = '$ger'");
        // запрос на добавление окна с услугами
            $number= $_POST['number'];
            if (is_array($number)) {
                $okno = $_POST['okno'];
                $mysqli->query("INSERT INTO `window` (`id_okno`, `name`) VALUES (NULL, '$okno')");
            $sd = mysqli_insert_id($mysqli); // берем последний insert
            foreach ($number as $key => $value) {
                $mysqli->query("INSERT INTO `windowlink` (`id`, `id_okno`, `id_type`) VALUES (NULL, '$sd', '$value')");

            }
            echo "Вы изменили <a href='../views/rabotnik.php'>вернуться</a>";
        }
}
?>
<script type="text/javascript">
           location.href='../views/rabotnik.php';
</script>