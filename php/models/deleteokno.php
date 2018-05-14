<?php
session_start();
include_once '../core/config.php';
$ger = $_GET['id'];
$sql1 ="DELETE FROM `window` WHERE id_okno = '$ger'";
$sql ="DELETE FROM `windowlink` WHERE id_okno = '$ger'";
$result = $mysqli->query($sql);
$result = $mysqli->query($sql1);
?>
<script type="text/javascript">
           location.href='../views/rabotnik.php';
</script>
<!-- Удаление типов очередей -->


