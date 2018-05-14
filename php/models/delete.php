<?php
session_start();
include_once '../core/config.php';
$ger = $_GET['id'];
$sql ="DELETE FROM `type` WHERE id_service = '$ger'";
$result = $mysqli->query($sql);
?>
<script type="text/javascript">
           location.href='../views/rabotnik.php';
</script>
<!-- Удаление типов очередей -->


