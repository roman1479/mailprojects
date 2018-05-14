<?php
$mysqli = new mysqli('localhost', 'root', '', 'pochta');
$mysqli->set_charset("utf-8");
mb_internal_encoding("UTF-8");
$c = $_POST['type'];
if($c == "ochered"){
	$sql = "SELECT * FROM `talon` INNER JOIN `window` ON (talon.id_okno = window.id_okno) ORDER BY `id` desc LIMIT 0,8";
	$result = $mysqli->query($sql);
	$html = "";
	while($row = mysqli_fetch_assoc($result)){
		$html .= "<div class='col-md-6 row info'><span class='nomerklient'>".$row['letterbyk']."".$row['number']."</span><span class='okno'>№".$row['name']."</span></div>";
	} 
	echo $html;
}
if($c == "seeuser"){
	$sql = "SELECT * FROM `talon` INNER JOIN `type` ON (talon.id_service = type.id_service) ORDER BY `date` desc ";
	$result = $mysqli->query($sql);
	$html = "";
	$html .= "<table class='table_klient'>
	<tr>
	<td>Номер клиента</td>
	<td>Дата и время добавления клиента</td>
	<td>Тип</td>
	</tr>";
	while($row = mysqli_fetch_assoc($result)){
		$html .= "<tr><td>".$row['number']."</td><td>".$row['date']."</td><td>".$row['name']."</td></tr>";
		
	}
	$html .= "</table>";
	echo $html;
}
if($c == "type"){
	$sql = "SELECT * FROM `type`";
	$result = $mysqli->query($sql);
	$html = "";
	while ($row = mysqli_fetch_assoc($result)){
		$html .= "<div class='col-md-6 srit'><span onclick=nomerok('".$row['letter']."',".$row['id_service'].")>".$row['name']."</span></div>";
	}
	echo $html;
}
if($c == "nomerok"){
	$today = date("Y-m-d H:i:s");
	$idtype = $_POST['idtype'];
	$letter = $_POST['letter'];
	function echoit($string){
		$mysqli = new mysqli('localhost', 'root', '', 'pochta');
		$mysqli->set_charset("utf-8");
		$sql = "SELECT MAX(number) FROM `talon`";
		$result = $mysqli->query($sql);
		$row = mysqli_fetch_assoc($result);
		foreach ($row as $key => $value) {
			$vas = $value += 1;
		}
		return $vas;
	}
	$nomer = echoit($letter);
	$sql = "INSERT INTO `talon` (`id`, `id_service`, `number`, `id_okno`, `date`, `letterbyk`) VALUES (NULL, '$idtype', '$nomer',0, '$today', '$letter')";
	$mysqli->query($sql);

	$sql = "SELECT * FROM `talon` INNER JOIN `type` ON (talon.id_service = type.id_service) ORDER BY `id` desc";
	$result1 = $mysqli->query($sql);
	$html = "";
	$row1 = mysqli_fetch_assoc($result1);
	$bekva = $row1['letter'];
	$html .= "Ваша услуга: ".$row1['name']."<br><span class='concspan'>Ваш номер:  ".$row1['letter']."".$row1['number']."</span><br>";
                // вывод сколько в очереди талонов перед ним
	$sql = "SELECT * FROM `talon` WHERE `letterbyk` = '$bekva'";
	$result2 = $mysqli->query($sql);
	$row2 = ($result2->num_rows)-1;
	$html .=  "перед Вами:  ".$row2."  человек";
	echo $html;
}
if($c == "insertwin"){
	$idokno = $_POST['idwindow'];
	$mysqli->query("DELETE FROM `talon` WHERE id_okno = '$idokno'");
	$sql = "SELECT * FROM `talon` WHERE `id_service` IN (SELECT `id_type` FROM `windowlink` WHERE `id_okno` = '$idokno') AND `id_okno` = 0 ORDER BY `date` asc LIMIT 1";
	$result = $mysqli->query($sql);
	$html = "";
	$row = mysqli_fetch_assoc($result);
	$nomer = $row['id'];
	$html .= "<audio autoplay><source src='../../music/Uvedomlenie.mp3' type='audio/mpeg'></audio>";
	$mysqli->query("UPDATE `talon` SET `id_okno` = '$idokno' WHERE `id`='$nomer'");
	echo $html;
}