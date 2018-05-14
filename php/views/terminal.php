<?php
session_start();
include_once '../core/config.php';
include_once 'header.php';
if ($_SESSION['state_id'] == 3){
	?>
	<!-- Режим терминал -->
	<div id="cont">
		<div class="row" id='header'>
			<div class="col-md-12"><img src="../../images/logo-rp.png"><h1>Терминал <a href="../models/exit.php">Выход</a></h1></div>
		</div>
		<div class="row infoterminal" id="type">
			<!-- вывод типов -->
			<!-- название функции "typeochered"-->
		</div>
		<div class="" id="conclusiontalon">
			<!-- вывод талончика -->
			<!-- название функции "nomerok"-->
		</div>
		
	</div>
	<?php
}
include_once 'footer.php';
?>