<?php
session_start();
include_once '../core/config.php';
include_once 'header.php';
?>
<!-- страница редактирования типов -->
<div id="cont">
  <div class="row" id='header'>
     <div class="col-md-12"><img src="../../images/logo-rp.png"><h1>Работник <a href="../models/exit.php">Выход</a></h1></div>
 </div>
 <div class="grow">
    <div class="block3">
      <h3>Редактировать</h3>
      <?php
      $ger = $_GET['id'];
      if(isset($_POST['submit'])){
       $kon = $_POST['kon'];
       $letter = $_POST['letter'];
       $mysqli->query("UPDATE `type` SET `name` = '$kon', `letter` = '$letter' WHERE id_service='$ger'");
       echo "Вы изменили <a href='rabotnik.php'>вернуться</a>";
   }
   $sql = "SELECT * FROM type WHERE id_service='$ger'";
   $result = $mysqli->query($sql);
   $row = mysqli_fetch_assoc($result);
   ?>
   <form method="post">        
     <p>
        <label>Тип</label>
        <textarea rows="4" cols="95" name="kon" placeholder="" class="message"><?php echo $row['name']; ?></textarea>
        <textarea rows="4" cols="95" name="letter" placeholder="" class="message"><?php echo $row['letter']; ?></textarea>
        <input type="submit" class="inputbuttom" name="submit"  value="изменить" class="">
        <a href='rabotnik.php'>вернуться</a>
    </p>
</form>
</div>
</div>
</div>
<?php
include_once 'footer.php';
?>