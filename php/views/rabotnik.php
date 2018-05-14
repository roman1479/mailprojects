<?php
session_start();
include_once '../core/config.php';
include_once 'header.php';
if($_SESSION['state_id'] == 2){
	if(isset($_POST['submitokno'])){
	// запрос на добавление окна с услугами
		$number= $_POST['number'];
		if (is_array($number)) {
			$okno = $_POST['okno'];
			$mysqli->query("INSERT INTO `window` (`id_okno`, `name`) VALUES (NULL, '$okno')");
		$sd = mysqli_insert_id($mysqli); // берем последний insert
		foreach ($number as $key => $value) {
			$mysqli->query("INSERT INTO `windowlink` (`id`, `id_okno`, `id_type`) VALUES (NULL, '$sd', '$value')");
		}
	}
}
?>
<!-- режим работник -->
<div id="cont">
	<div class="row" id='header'>
		<div class="col-md-12"><img src="../../images/logo-rp.png"><h1>Работник <a href="../models/exit.php">Выход</a></h1></div>
	</div>
	<div  class="grow">
		<div class="content">
			<div class="block1">
				<h3>Добавить типа очереди</h3>
				<?php
				// запрос на добавление типа очереди
				if(isset($_POST['submit'])){
					$typeochered = $_POST['typeochered'];
					$letter = $_POST['letter'];
					$sql = "SELECT * FROM `type` WHERE `letter` = '$letter'";
					$result = $mysqli->query($sql);
					$row = $result->num_rows;
					if($row != 0){
						?>
						<div class="typeoffice">Такая буква уже относится к типу очереди выберите другую</div>
						<?php
					}
					else{ 
						$mysqli->query("INSERT INTO `type` (`id_service`, `name`, `letter`) VALUES (NULL, '$typeochered', '$letter')");
					}
				}
				?>
				<form action="" method="POST">
					<input type="text" class="inputtext" name="typeochered" placeholder="Тип очереди" id="inputtype" onchange="typeocheredname()" required>
					<input type="text" class="inputtext" name="letter" placeholder="Префикс ( Буква(ы) )" id="inputlet" onchange="typeocheredletter()" required>
					<input type="submit" class="inputbuttom" name="submit" value="Добавить">
				</form>
				<h3>Типы очередей</h3>
				<?php
				// Вывод типов очереди
				$sql = "SELECT * FROM `type`";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_assoc($result)){
					$compid = $row['id_service'];
					echo "<ul class='type_ochered'>";
					echo "<li>".$row['name']."    <a href='../models/delete.php?id=".$compid."'>Удалить</a>   <a href='settings.php?id=".$compid."'>Редактировать</a></li>";
					echo "</ul>";
				}
				?>
			</div>
			<hr>
			<div class="block2">
				<h3>Добавить окно</h3>
				<form action="" method="POST">
					<input type="text" class="inputtext" name="okno" onchange="namewindow()" id="inputwin" placeholder="Название окна" required>
					<p>выберите тип к окну</p>
					<?php
					$sql = "SELECT * FROM `type`";
					$result = $mysqli->query($sql);
					while ($row = mysqli_fetch_assoc($result)){
						echo "<input type='checkbox' class='checkoknotype' checkoknotype' name='number[]' value=".$row['id_service'].">".$row['name']."<br>";
					}
					?>
					<p></p>
					<input type="submit" class="inputbuttom" name="submitokno" value="Добавить">
				</form>
				<!-- список окон -->
				<h4>Список окон</h4>
				<?php
				$sql = "SELECT * FROM `window`";
				$result = $mysqli->query($sql);
				while ($row = mysqli_fetch_assoc($result)){
					$compid = $row['id_okno'];
					echo "<ul>";
					echo "<li> название окна:  ".$row['name']." <a href='../models/deleteokno.php?id=".$compid."'>Удалить</a> <a href='editwindow.php?id=".$compid."'>Редактировать</a></li>";
					$sql1 = "SELECT * FROM `windowlink` INNER JOIN `type` ON (windowlink.id_type = type.id_service) WHERE `id_okno` = '$compid'";
					$result1 = $mysqli->query($sql1);
					while ($row1 = mysqli_fetch_assoc($result1)){
						echo "<span class='spanokno'>".$row1['name']."<span><br>";
					}
					echo "</ul>";
				}
				?>
			</div>
			<hr>
			<div class="block3">
				<!-- просмотр текущих клиентов -->
				<h3>просмотр текущих клиентов очереди</h3>
				
				<span class="oknasik">Окна:</span>
				<?php
					    // вывод ссылок на окна
				$sql = "SELECT * FROM `window`";
				$result2 = $mysqli->query($sql);
				while($row2 = mysqli_fetch_assoc($result2)){
					echo "<span class='ochered' onclick='insertochered(".$row2['id_okno'].")'>".$row2['name']."</span>";
				}
					// вывод окон и вывод клиентов с ссылками окон
				?>
				<div id="resultuser">
					<!-- вывод талончика -->
					<!-- название функции "seeusers"-->
				</div>
			</div>
		</div>
	</div>
</div>
<span id="music"></span>
<script src="../../js/validation.js"></script>
<?php
}
include_once 'footer.php';
?>
